<!-- Include header.php -->
<?php get_header(); ?>

<section class="home__main">
    <div class="home__container-categories">
        <div class="home__container-category home__container-viaggi">
            <h2 class="home__category-title h2">Viaggi</h2>
            <p class="home__category-description body-2">I Viaggi di <em>ViaggIn</em>: itinerari, destinazioni e curiosità da ogni parte del mondo</p>
            <a class="button button--black" href="<?= createLink('/category/viaggi/'); ?>">Scopri di più</a>
        </div>
        <div class="home__container-category home__container-documenti">
            <h2 class="home__category-title h2">Documenti</h2>
            <p class="home__category-description body-2">Documenti di viaggio di <em>ViaggIn</em>: guide per viaggiare informati</p>
            <a class="button button--black" href="<?= createLink('/category/documenti/"'); ?>">Scopri di più</a>
        </div>
        <div class="home__container-category home__container-estero">
            <h2 class="home__category-title h2">Vivere all'estero</h2>
            <p class="home__category-description body-2">Vivere all'estero: guide pratiche, accurate e aggiornate per trasferisi a vivere all'estero</p>
            <a class="button button--black" href="<?= createLink('/category/vivere-estero/'); ?>">Scopri di più</a>
        </div>
    </div>
</section>
<section class="home__container-search">
    <h2 class="h2">Cerca su Viaggi</h2>
    <?php get_search_form(); ?>
</section>
<section class="home__container-articles">
    <div class="home__container-title">
        <h2 class="h2">Ultimi Articoli</h2>
    </div>
    <?php
    $argsPost = [
        'post_type'             => 'post',
        'posts_per_page'        => 10,
        'order'                 => 'DESC',
        'post_status'           => 'publish'
    ];

    $lastPostsQuery = new WP_Query($argsPost);

    if ($lastPostsQuery->have_posts()) {
        while ($lastPostsQuery->have_posts()) {
            $lastPostsQuery->the_post();
            
            $lastPostUrl = get_permalink();
            $lastPostTitle = get_the_title();
            $lastPostDate = get_the_date();
            $lastPostAuthor = get_the_author();
            $lastPostImageUrl = get_the_post_thumbnail_url();
            $lastPostImageAlt = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);
            $lastPostCommentsNumb = get_comments(['post_id' => $post->ID, 'count' => true]);
            $lastPostContent = get_the_content();
    ?>
        <div class="article-card">
            <a href="<?= $lastPostUrl; ?>" class="article-card__link link-no-style">
                <div class="article-card__container-title">
                    <h2 class="h3"><?= $lastPostTitle; ?></h2>
                </div>
                <div class="article-card__container-data">
                    <span class="article-card__data body-6">Pubblicato il <?= $lastPostDate; ?> - <?= $lastPostAuthor; ?> - <?= $lastPostCommentsNumb == 1 ? $lastPostCommentsNumb . ' commento' : $lastPostCommentsNumb . ' commenti'; ?></span>
                </div>
                <div class="article-card__container-content">
                    <div class="article-card__paragraph body-2">
                        <img class="article-card__img" src="<?= $lastPostImageUrl; ?>" alt="<?= $lastPostImageAlt; ?>" width="150" height="100">
                        <?php
                        $lastPostExcerpt = substr($lastPostContent, 0, 400);
                        $lastPostExcerptNoHtml = strip_tags($lastPostExcerpt);
                        echo $lastPostExcerptNoHtml . '...[continua a leggere]';
                        ?>
                    </div>
                </div>
            </a>
        </div>
    <?php
        }
        wp_reset_postdata();
    }
    ?>
</section>

<!-- Include footer.php -->
<?php get_footer(); ?>