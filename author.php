<!-- Include header.php -->
<?php get_header(); ?>

<?php
// Get author data
$authorID = get_the_author_meta('ID');
$authorName = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
$authorEmail = get_the_author_meta('user_email');
$authorDescription = get_the_author_meta('description');

?>

<section class="author">
    <div class="author-card">
        <a href="<?= getPath(); ?>" class="author-card__link link-no-style">
            <div class="author-card__container-title">
                <h2 class="h3"><?= $authorName; ?></h2>
            </div>
            <div class="author-card__container-content">
                <div class="author-card__paragraph body-2">
                    <img class="author-card__img" src="<?= getAuthorImage($authorEmail) ?>" alt="Immagine dell'autore {{ authorName }}">
                    <?= $authorDescription; ?>
                </div>
            </div>
        </a>
    </div>
    <div class="author__container-articles">
        <div class="author__container-title">
            <h2 class="h2">Tutti gli articoli di <?= $authorName; ?></h2>
        </div>
        <?php
        $authorPostArgs = [
            'author'        => $authorID,
            'post_per_page' => 10,
            'order'         => 'DESC'
        ];

        $authorPostQuery = new WP_Query($authorPostArgs);

        if ($authorPostQuery->have_posts()) {
            while ($authorPostQuery->have_posts()) {
                $authorPostQuery->the_post();
            
                $authorPosUrl = get_permalink();
                $authorPosTitle = get_the_title();
                $authorPosDate = get_the_date();
                $authorPosAuthor = get_the_author();
                $authorPosImageUrl = get_the_post_thumbnail_url();
                $authorPosImageAlt = get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);
                $authorPosCommentsNumb = get_comments_number();
                $authorPosContent = get_the_content();
        ?>
            <div class="article-card">
                <a href="<?= $authorPosUrl; ?>" class="article-card__link link-no-style">
                    <div class="article-card__container-title">
                        <h2 class="h3"><?= $authorPosTitle; ?></h2>
                    </div>
                    <div class="article-card__container-data">
                        <span class="article-card__data body-6">Pubblicato il <?= $authorPosDate; ?> - <?= $authorPosAuthor; ?> - <?= $authorPosCommentsNumb == 1 ? $authorPosCommentsNumb . ' commento' : $authorPosCommentsNumb . ' commenti'; ?></span>
                    </div>
                    <div class="article-card__container-content">
                        <div class="article-card__paragraph body-2">
                            <img class="article-card__img" src="<?= $authorPosImageUrl; ?>" alt="<?= $authorPosImageAlt; ?>">
                            <?php
                            $authorPosExcerpt = substr($authorPosContent, 0, 400);
                            $authorPosExcerptNoHtml = strip_tags($authorPosExcerpt);
                            echo $authorPosExcerptNoHtml;
                            ?>
                        </div>
                    </div>
                </a>
            </div>
        <?php
            }
        }
        ?>
    </div>
</section>

<!-- Include footer.php -->
<?php get_footer(); ?>