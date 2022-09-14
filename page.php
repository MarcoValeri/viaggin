<!-- Include header.php -->
<?php get_header(); ?>

<?php 
if (have_posts()) {
    while (have_posts()) {
        the_post();

        $postID = get_the_ID();
        $postTitle = get_the_title();
        $postAuthor = get_the_author();
        $postAuthorName = get_the_author_meta('first_name');
        $postAuthroSurname = get_the_author_meta('last_name');
        $postAuthroUrl = get_author_posts_url($postID);
        $postAuthorEmail = get_the_author_meta('user_email');
        $postDate = get_the_date('d-m-Y');
        $postUpdateDate = get_the_modified_date('d-m-Y');
        $postCommentsNum = get_comments_number();
        $postContent = get_the_content();
        $postCategoryName = get_cat_name($postID);
        $postCategoryUrl = get_category_link($postID);
        $postTags = get_the_tags();
?>
        <article class="article">
            <h1 class="article__title h1"><?= $postTitle; ?></h1>
            <ul class="article__data">
                <li class="article__data-item body-3">Pubblicato il: <?= $postDate; ?></li>
                <li class="article__data-item body-3">Ultima modifica: <?= $postUpdateDate; ?></li>
            </ul>
            <?= $postContent; ?>
        </article>
<?php
    }
}
?>

<!-- Include footer.php -->
<?php get_footer(); ?>