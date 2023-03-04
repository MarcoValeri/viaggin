<!-- Include header.php -->
<?php get_header(); ?>

<section class="home__container-articles">
    <?php
    $getSearchQuery = get_search_query();
    
    $argsQuery = [
        'post_type'     => 'post',
        's'             => $getSearchQuery
    ];

    $searchQuery = new WP_Query($argsQuery);

    if ($searchQuery->have_posts()) {
        ?>
        <div class="home__container-title">
            <h2 class="h2">Risultati di ricerca per <?= get_search_query(); ?></h2>
        </div>
        <?php
        while ($searchQuery->have_posts()) {
            $searchQuery->the_post();
            
            $searchPostUrl = get_permalink();
            $searchPostTitle = get_the_title();
            $searchPostDate = get_the_date();
            $searchPostAuthor = get_the_author();
            $searchPostImageUrl = get_the_post_thumbnail_url();
            $searchPostImageAlt = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);
            $searchPostCommentsNumb = get_comments(['post_id' => $post->ID, 'count' => true]);
            $searchPostContent = get_the_content();
    ?>
        <div class="article-card">
            <a href="<?= $searchPostUrl; ?>" class="article-card__link link-no-style">
                <div class="article-card__container-title">
                    <h2 class="h3"><?= $searchPostTitle; ?></h2>
                </div>
                <div class="article-card__container-data">
                    <span class="article-card__data body-6">Pubblicato il <?= $searchPostDate; ?> - <?= $searchPostAuthor; ?> - <?= $searchPostCommentsNumb == 1 ? $searchPostCommentsNumb . ' commento' : $searchPostCommentsNumb . ' commenti'; ?></span>
                </div>
                <div class="article-card__container-content">
                    <div class="article-card__paragraph body-2">
                        <img class="article-card__img" src="<?= $searchPostImageUrl; ?>" alt="<?= $searchPostImageAlt; ?>" width="" height="">
                        <?php
                        $searchPostExcerpt = substr($searchPostContent, 0, 400);
                        $searchPostExcerptNoHtml = strip_tags($searchPostExcerpt);
                        echo $searchPostExcerptNoHtml . '...[continua a leggere]';
                        ?>
                    </div>
                </div>
            </a>
        </div>
    <?php
        }
        wp_reset_postdata();
    } else {
        ?>
        <div class="error404__container-404">
            <h1 class="h1">Nessun risultato trovato</h1>
            <p class="error404__404-description body-2">Sembra che la pagina o l'articolo che stai cercando non esista.</p>
            <div class="error404__404-container-action">
            <h3 class="h3">Cosa vuoi fare?</h3>
            <div class="error404__404-action-flex">
                <div class="error404__404-action-flex-single">
                    <a href="<?= createLink('/'); ?>" class="button button--yellow">Home</a>
                </div>
                <div class="error404__404-action-flex-single">
                    <a href="<?= createLink('/category/viaggi/'); ?>" class="button button--yellow">Viaggi</a>
                </div>
                <div class="error404__404-action-flex-single">
                    <a href="<?= createLink('/category/eventi/'); ?>" class="button button--yellow">Eventi</a>
                </div>
                <div class="error404__404-action-flex-single">
                    <a href="<?= createLink('/category/documenti/'); ?>" class="button button--yellow">Documenti</a>
                </div>
                <div class="error404__404-action-flex-single">
                    <a href="<?= createLink('/category/vivere-estero'); ?>" class="button button--yellow">Vivere all'estero</a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</section>

<!-- Include footer.php -->
<?php get_footer(); ?>