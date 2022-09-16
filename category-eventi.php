<!-- Include header.php -->
<?php get_header(); ?>

<section class="category__container">
    <div class="category__container-categories">
        <div class="category__container-category category__container-category--red">
            <h2 class="category__category-title h2">Eventi</h2>
            <p class="category__category-description body-2">Gli Eventi di <em>ViaggIn</em>: musei, sagre, feste, esposizioni e curiosità da ogni parte del mondo</p>
        </div>
    </div>
</section>
<section class="home__container-articles">
    <div class="home__container-title">
        <h2 class="h2">Gli eventi di ViaggIn: tutti gli articoli</h2>
    </div>
    <?php
    $categoryEventiArgs = [
        'posts_per_page'    => 10,
        'category_name'     => 'eventi'
    ];

    $categoryEventiQuery = new WP_Query($categoryEventiArgs);

    if ($categoryEventiQuery->have_posts()) {
        while ($categoryEventiQuery->have_posts()) {
            $categoryEventiQuery->the_post();

            $eventiPostUrl = get_permalink();
            $eventiPostTitle = get_the_title();
            $eventiPostDate = get_the_date();
            $eventiPostAuthor = get_the_author();
            $eventiPostImageUrl = get_the_post_thumbnail_url();
            $eventiPostImageAlt = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);
            $eventiPostCommentsNumb = get_comments(['count' => true]);
            $eventiPostContent = get_the_content();
    ?>
    <div class="article-card">
        <a href="<?= $eventiPostUrl; ?>" class="article-card__link link-no-style">
            <div class="article-card__container-title">
                <h2 class="h3"><?= $eventiPostTitle; ?></h2>
            </div>
            <div class="article-card__container-data">
                <span class="article-card__data body-6">Pubblicato il <?= $eventiPostDate; ?> - <?= $eventiPostAuthor; ?> - <?= $eventiPostCommentsNumb == 1 ? $eventiPostCommentsNumb . ' commento' : $eventiPostCommentsNumb . ' commenti'; ?></span>
            </div>
            <div class="article-card__container-content">
                <div class="article-card__paragraph body-2">
                    <img class="article-card__img" src="<?= $eventiPostImageUrl; ?>" alt="<?= $eventiPostImageAlt; ?>">
                    <?php
                    $eventiPostExcerpt = substr($eventiPostContent, 0, 400);
                    echo $eventiPostExcerpt;
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