<!-- Include header.php -->
<?php get_header(); ?>

<section class="category__container">
    <div class="category__container-categories">
        <div class="category__container-category">
            <h2 class="category__category-title h2">Vivere all'estero</h2>
            <p class="category__category-description body-2">Vivere all'estero: guide pratiche, accurate e aggiornate per trasferisi a vivere all'estero</p>
        </div>
    </div>
</section>
<section class="home__container-articles">
    <div class="home__container-title">
        <h2 class="h2">Vivere all'estero: tutte le guida di ViaggIn</h2>
    </div>
    <?php
    $categoryEsteroArgs = [
        'posts_per_page'    => 10,
        'category_name'     => 'vivere-estero'
    ];

    $categoryEsteroQuery = new WP_Query($categoryEsteroArgs);

    if ($categoryEsteroQuery->have_posts()) {
        while ($categoryEsteroQuery->have_posts()) {
            $categoryEsteroQuery->the_post();

            $esteroPostUrl = get_permalink();
            $esteroPostTitle = get_the_title();
            $esteroPostDate = get_the_date();
            $esteroPostAuthor = get_the_author();
            $esteroPostImageUrl = get_the_post_thumbnail_url();
            $esteroPostImageAlt = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);
            $esteroPostCommentsNumb = get_comments(['post_id' => $post->ID, 'count' => true]);
            $esteroPostContent = get_the_content();
    ?>
    <div class="article-card">
        <a href="<?= $esteroPostUrl; ?>" class="article-card__link link-no-style">
            <div class="article-card__container-title">
                <h2 class="h3"><?= $esteroPostTitle; ?></h2>
            </div>
            <div class="article-card__container-data">
                <span class="article-card__data body-6">Pubblicato il <?= $esteroPostDate; ?> - <?= $esteroPostAuthor; ?> - <?= $esteroPostCommentsNumb == 1 ? $esteroPostCommentsNumb . ' commento' : $esteroPostCommentsNumb . ' commenti'; ?></span>
            </div>
            <div class="article-card__container-content">
                <div class="article-card__paragraph body-2">
                    <img class="article-card__img" src="<?= $esteroPostImageUrl; ?>" alt="<?= $esteroPostImageAlt; ?>">
                    <?php
                    $esteroPostExcerpt = substr($esteroPostContent, 0, 400);
                    $esteroPostExcerptNoHtml = strip_tags($esteroPostExcerpt);
                    echo $esteroPostExcerptNoHtml . '...[continua a leggere]';
                    ?>
                </div>
            </div>
        </a>
    </div>
    <?php
        }
    }
    wp_reset_postdata();
    ?>
</section>
<!-- Include footer.php -->
<?php get_footer(); ?>