<!-- Include header.php -->
<?php get_header(); ?>

<section class="home__main">
    <div class="home__container-categories">
        <div class="home__container-category home__container-viaggi">
            <h2 class="home__category-title h2">Viaggi</h2>
            <p class="home__category-description body-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, exercitationem esse? Repudiandae similique, dignissimos consectetur maxime explicabo exercitationem ipsam mollitia! Quae necessitatibus ratione iure minus quam dolorum non amet praesentium!</p>
            <a class="button button--black" href="">Scopri di più</a>
        </div>
        <div class="home__container-category home__container-eventi">
            <h2 class="home__category-title h2">Eventi</h2>
            <p class="home__category-description body-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, exercitationem esse? Repudiandae similique, dignissimos consectetur maxime explicabo exercitationem ipsam mollitia! Quae necessitatibus ratione iure minus quam dolorum non amet praesentium!</p>
            <a class="button button--black" href="">Scopri di più</a>
        </div>
        <div class="home__container-category home__container-documenti">
            <h2 class="home__category-title h2">Documenti</h2>
            <p class="home__category-description body-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, exercitationem esse? Repudiandae similique, dignissimos consectetur maxime explicabo exercitationem ipsam mollitia! Quae necessitatibus ratione iure minus quam dolorum non amet praesentium!</p>
            <a class="button button--black" href="">Scopri di più</a>
        </div>
        <div class="home__container-category home__container-estero">
            <h2 class="home__category-title h2">Vivere all'estero</h2>
            <p class="home__category-description body-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, exercitationem esse? Repudiandae similique, dignissimos consectetur maxime explicabo exercitationem ipsam mollitia! Quae necessitatibus ratione iure minus quam dolorum non amet praesentium!</p>
            <a class="button button--black" href="">Scopri di più</a>
        </div>
    </div>
</section>
<section class="home__container-articles">
    <div class="home__container-title">
        <h2 class="h2">Ultimi Articoli</h2>
    </div>
    <?php
    $args = [
        'post_type'             => 'post',
        'posts_per_page'        => 10,
        'order'                 => 'DESC',
        'post_status'           => 'publish'
    ];

    $lastPostsQuery = new WP_Query($args);

    if ($lastPostsQuery->have_posts()) {
        while ($lastPostsQuery->have_posts()) {
            $lastPostsQuery->the_post();
            
            $lastPostUrl = get_permalink();
            $lastPostTitle = get_the_title();
            $lastPostDate = get_the_date();
            $lastPostAuthor = get_the_author();
            $lastPostImageUrl = get_the_post_thumbnail_url();
            $lastPostImageAlt = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);
            $lastPostCommentsNumb = get_comments(['count' => true]);
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
                        <img class="article-card__img" src="<?= $lastPostImageUrl; ?>" alt="<?= $lastPostImageAlt; ?>">
                        <?= $lastPostContent; ?>
                    </div>
                </div>
            </a>
        </div>
    <?php
        }
        wp_reset_postdata();
    }
    ?>
    <div class="home__container-all-article">
        <a href="{{ path('app_article_list') }}" class="button button--yellow">Scopri tutti gli articoli</a>
    </div>
</section>

<!-- Include footer.php -->
<?php get_footer(); ?>