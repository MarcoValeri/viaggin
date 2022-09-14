<!-- Include header.php -->
<?php get_header(); ?>

<section class="category__container">
    <div class="category__container-categories">
        <div class="category__container-category category__container-category--red">
            <h2 class="category__category-title h2">Documenti di Viaggio</h2>
            <p class="category__category-description body-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, exercitationem esse? Repudiandae similique, dignissimos consectetur maxime explicabo exercitationem ipsam mollitia! Quae necessitatibus ratione iure minus quam dolorum non amet praesentium!</p>
        </div>
    </div>
</section>
<section class="home__container-articles">
    <div class="home__container-title">
        <h2 class="h2">Documenti di viaggio: tutte le guide di ViaggIn</h2>
    </div>
    <?php
    $categoryDocumentiArgs = [
        'posts_per_page'    => 10,
        'category_name'     => 'documenti'
    ];

    $categoryDocumentiQuery = new WP_Query($categoryDocumentiArgs);

    if ($categoryDocumentiQuery->have_posts()) {
        while ($categoryDocumentiQuery->have_posts()) {
            $categoryDocumentiQuery->the_post();

            $documentiPostUrl = get_permalink();
            $documentiPostTitle = get_the_title();
            $documentiPostDate = get_the_date();
            $documentiPostAuthor = get_the_author();
            $documentiPostImageUrl = get_the_post_thumbnail_url();
            $documentiPostImageAlt = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);
            $documentiPostCommentsNumb = get_comments(['count' => true]);
            $documentiPostContent = get_the_content();
    ?>
    <div class="article-card">
        <a href="<?= $documentiPostUrl; ?>" class="article-card__link link-no-style">
            <div class="article-card__container-title">
                <h2 class="h3"><?= $documentiPostTitle; ?></h2>
            </div>
            <div class="article-card__container-data">
                <span class="article-card__data body-6">Pubblicato il <?= $documentiPostDate; ?> - <?= $documentiPostAuthor; ?> - <?= $documentiPostCommentsNumb == 1 ? $documentiPostCommentsNumb . ' commento' : $documentiPostCommentsNumb . ' commenti'; ?></span>
            </div>
            <div class="article-card__container-content">
                <div class="article-card__paragraph body-2">
                    <img class="article-card__img" src="<?= $documentiPostImageUrl; ?>" alt="<?= $documentiPostImageAlt; ?>">
                    <?php
                    $documentiPostExcerpt = substr($documentiPostContent, 0, 400);
                    echo $documentiPostExcerpt;
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
    <div class="category__container-load">
        <a href="#" class="button button--yellow">Tutte le categorie</a>
    </div>
</section>
<!-- Include footer.php -->
<?php get_footer(); ?>