<!-- Include header.php -->
<?php get_header(); ?>

<section class="category__container">
    <div class="category__container-categories">
        <div class="category__container-category">
            <h2 class="category__category-title h2">Viaggi</h2>
            <p class="category__category-description body-2">I Viaggi di <em>ViaggIn</em>: itinerari, destinazioni e curiosità da ogni parte del mondo</p>
        </div>
    </div>
</section>
<section class="home__container-articles">
    <div class="home__container-title">
        <h2 class="h2">I viaggi di ViaggIn: tutti gli articoli</h2>
    </div>
    <?php
    $categoryViaggiArgs = [
        'posts_per_page'    => 10,
        'category_name'     => 'viaggi'
    ];

    $categoryViaggiQuery = new WP_Query($categoryViaggiArgs);

    if ($categoryViaggiQuery->have_posts()) {
        while ($categoryViaggiQuery->have_posts()) {
            $categoryViaggiQuery->the_post();

            $viaggiPostUrl = get_permalink();
            $viaggiPostTitle = get_the_title();
            $viaggiPostDate = get_the_date();
            $viaggiPostAuthor = get_the_author();
            $viaggiPostImageUrl = get_the_post_thumbnail_url();
            $viaggiPostImageAlt = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);
            $viaggiPostCommentsNumb = get_comments(['count' => true]);
            $viaggiPostContent = get_the_content();
    ?>
    <div class="article-card">
        <a href="<?= $viaggiPostUrl; ?>" class="article-card__link link-no-style">
            <div class="article-card__container-title">
                <h2 class="h3"><?= $viaggiPostTitle; ?></h2>
            </div>
            <div class="article-card__container-data">
                <span class="article-card__data body-6">Pubblicato il <?= $viaggiPostDate; ?> - <?= $viaggiPostAuthor; ?> - <?= $viaggiPostCommentsNumb == 1 ? $viaggiPostCommentsNumb . ' commento' : $viaggiPostCommentsNumb . ' commenti'; ?></span>
            </div>
            <div class="article-card__container-content">
                <div class="article-card__paragraph body-2">
                    <img class="article-card__img" src="<?= $viaggiPostImageUrl; ?>" alt="<?= $viaggiPostImageAlt; ?>">
                    <?php
                    $viaggiPostExcerpt = substr($viaggiPostContent, 0, 400);
                    $viaggiPostExcerptNoHtml = strip_tags($viaggiPostExcerpt);
                    echo $viaggiPostExcerptNoHtml;
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