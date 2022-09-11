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
                        <span class="body-4">Categoria:</span> <a href="<?= $postCategoryUrl; ?>" class="link body-4"><?= $postCategoryName; ?></a>
                    </li>
                    <li class="list-no-style__item">
                        <?= count($postTags) === 1 ? '<span class="body-4">Tag:</span>' : '<span class="body-4">Tags:</span>'; ?>
                        <?php
                        foreach ($postTags as $key => $postTag) {
                        ?>
                            <a class="link body-4" href="<?= $postTag->slug; ?>"><?= $postTag->name; ?></a><?= count($postTags) === ($key + 1) ? '' : ','; ?>
                        <?php
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
                            <img class="author-card__img" src="<?= getAuthorImage($postAuthorEmail); ?>" alt="Immagine dell'autorə <?= $postAuthorName . ' ' . $postAuthroSurname; ?>">
                            Mi chiamo Marco Valeri, sono nato a Roma e attualmente vivo a Londra, città che mi ha cambiato la vita.
                            Laureato in Computer Science alla Birkbeck University of London, divoro libri, amo scrivere e non mi stanco mai di conoscere cose nuove, soprattutto legate alla comunicazione, alla crescita personale e allo sviluppo del web.
                            Ho fatto praticamente ogni tipo di lavoro per mantenermi e questo mi ha permesso di capire che l’età non è mai un limite per essere ciò che vuoi essere.
                            “La disciplina è libertà” è quel concetto che provo a mettere in pratica ogni giorno.
                            Oggi lavoro a Londra come Software Engineer
                        </p>
                    </div>
                </a>
            </div>
        </section>
        <section id="article-container-comments" class="article__container-comments-form">
            <h3 class="article__comments-sub-title h3">Lascia un commento</h3>
            <?php
            $argsComment = [
                'fields' => [
                    'author'    => '<div class="article__form-comments-name article__input"><input id="author" name="author" placeholder="Nome *" /></div>',
                    'email'     => '<div class="article__form-comments-email article__input"><input id="email" name="email" placeholder="Email *" /></div>',
                    'cookies'   => '<div class="article__form-comments-privacy article__input"><input type="checkbox" id="Privacy" name="Privacy" required="required" value="1"><label class="contact__privacy-label required" for="comment_form_privacy">Accetto la privacy policy</label></div><div class="article__form-comments-submit article__input"><p class="body-3">Per maggiori informazioni consulta la <a href="#">Privacy Policy di ViaggIn</a></p></div>'
                ],
                'label_submit'              => __('Invia'),
                'title_reply'               => __('La tua email non verrà pubblicata'),
                'title_reply_to'            => __('Rispondi'),
                'comment_field'             => '<div class="article__form-comments-comment article__input"><textarea id="comment" name="comment" placeholder="Commento *"></textarea></div>',
                'comment_notes_before'      => __('Hello PHP'),
                'comment_notes_after'       => '',
                'id_submit'                 => __('comment-submit'),
            ];
            ?>
            <div class="article__form-comments-grid">
                <?php comment_form($argsComment); ?>
            </div>
        </section>
<?php
    }
}
?>

<!-- Include footer.php -->
<?php get_footer(); ?>