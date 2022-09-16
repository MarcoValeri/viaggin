<!-- Include header.php -->
<?php get_header(); ?>

<section class="tag">
    <div class="tag__container-title">
        <h1 class="h1">Tag <?= single_tag_title(); ?>: tutti gli articoli</h1>
    </div>
    <?php
    if (have_posts()) {

        while (have_posts()) {
            the_post();

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
                            <?php
                            $lastPostExcerpt = substr($lastPostContent, 0, 400);
                            $lastPostExcerptNoHtml = strip_tags($lastPostExcerpt);
                            echo $lastPostExcerptNoHtml;
                            ?>
                        </div>
                    </div>
                </a>
            </div>
    <?php
        }
    }
    ?>
</section>

<!-- Include footer.php -->
<?php get_footer(); ?>