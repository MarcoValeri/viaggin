<!-- Include header.php -->
<?php get_header(); ?>

<?php 
if (have_posts()) {
    while (have_posts()) {
        the_post();

        $postID = get_the_ID();
        $authorID = get_the_author_meta('ID');
        $postTitle = get_the_title();
        $postAuthor = get_the_author();
        $postAuthorName = get_the_author_meta('first_name');
        $postAuthroSurname = get_the_author_meta('last_name');
        $postAuthroUrl = get_author_posts_url($authorID);
        $postAuthorEmail = get_the_author_meta('user_email');
        $postDate = get_the_date('d-m-Y');
        $postUpdateDate = get_the_modified_date('d-m-Y');
        $postCommentsNum = get_comments_number();
        $postContent = get_the_content();
        $postCategoryName = isset(get_the_category($postID)[0]->name) ? get_the_category($postID)[0]->name : '';
        $postCategoryUrl = isset(get_the_category($postID)[0]->slug) ? get_the_category($postID)[0]->slug : '';
        $postTags = get_the_tags();
?>
        <article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">
            <h1 class="article__title h1"><?= $postTitle; ?></h1>
            <ul class="article__data">
                <li class="article__data-item body-3">Autore: <?= $postAuthorName . ' ' . $postAuthroSurname; ?></li>
                <li class="article__data-item body-3">Pubblicato il: <?= $postDate; ?></li>
                <li class="article__data-item body-3">Ultima modifica: <?= $postUpdateDate; ?></li>
                <li class="article__data-item body-3">
                    <a class="list-no-style__inherit-color" href="#article-container-comments">Commenti: <?= $postCommentsNum; ?></a>
                </li>
            </ul>
            <?= $postContent; ?>
            <div class="article__container-taxonomi">
                <ul class="list-no-style">
                    <li class="list-no-style__item">
                        <span class="body-4">Categoria:</span> <a href="<?= createLink('/category/' . $postCategoryUrl); ?>" class="link body-4"><?= $postCategoryName; ?></a>
                    </li>
                    <li class="list-no-style__item">
                        <?php 
                        if ($postTags) {
                            echo count($postTags) === 1 ? '<span class="body-4">Tag:</span>' : '<span class="body-4">Tags:</span>';
                        ?>
                        <?php
                            foreach ($postTags as $key => $postTag) {
                        ?>
                                <a class="link body-4" href="<?= createLink('/tag/' . $postTag->slug) ?>"><?= $postTag->name; ?></a><?= count($postTags) === ($key + 1) ? '' : ','; ?>
                        <?php
                            }
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </article>
        <section class="article__container-author">
            <h2 class="article__container-author-title h2">Articolo scritto da</h2>
            <div class="author-card">
                <a href="<?= $postAuthroUrl; ?>" class="author-card__link link-no-style">
                    <div class="author-card__container-title">
                        <h2 class="h3"><?= $postAuthorName . ' ' . $postAuthroSurname; ?></h2>
                    </div>
                    <div class="author-card__container-content">
                        <p class="author-card__paragraph body-2">
                            <img class="author-card__img" src="<?= getAuthorImage($postAuthorEmail); ?>" alt="Immagine dell'autorə <?= $postAuthorName . ' ' . $postAuthroSurname; ?>" >
                            <?= get_the_author_meta('description', $authorID); ?>
                        </p>
                    </div>
                </a>
            </div>
        </section>
        <?php
        // Show comments form and comments if they are available
        if (comments_open()) {
            comments_template();
        }
        ?>
<?php
    }
}
?>

<!-- Include footer.php -->
<?php get_footer(); ?>