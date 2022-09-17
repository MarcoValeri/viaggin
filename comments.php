<?php
/**
 * This files is styled on comments.php
 */

$commentsNum = get_comments_number();
$postID = get_post()->ID;
?>

<section id="article-container-comments" class="article__container-comments-form">
    <h3 class="article__comments-sub-title h3">Lascia un commento</h3>
    <?php
    /**
     * Show successfull message if the comment has been sent
     */
    if (count($_GET) > 0) {
        if ($_GET['unapproved']) {
            echo '<div class="article__container-comments-success"><p class="article__comments-success body-2">Commento inviato ed in fase di approvazione</p></div>';
        } 
    }
    
    ?>
    <?php
    /**
     * Set up comments form
     * and print it out
     */
    $userEmailLogged = wp_get_current_user()->user_email;
    $argsComment = [
        'fields' => [
            'author'    => '<div class="article__form-comments-name article__input"><input type="text" id="author" name="author" placeholder="Nome *" /></div>',
            'email'     => '<div class="article__form-comments-email article__input"><input type="email" id="email" name="email" placeholder="Email *" /></div>',
            'cookies'   => '<div class="article__form-comments-privacy article__input"><input type="checkbox" id="Privacy" name="Privacy" required="required" value="1"><label class="contact__privacy-label body-3 required" for="Privacy">Accetto la privacy policy</label></div><div class="article__form-comments-submit article__input"><p class="body-3">Per maggiori informazioni consulta la <a href="/privacy/">Privacy Policy di ViaggIn</a></p></div>'
        ],
        'submit_button'             => '<div class="article__form-comments-button"><input class="button button--black" type="submit" name="submit" value="Invia" /></div>',
        'title_reply'               => __('*** La tua email non verrà pubblicata ***'),
        'title_reply_to'            => __('Rispondi'),
        'comment_field'             => '<div class="article__form-comments-comment article__input"><textarea id="comment" name="comment" placeholder="Commento *"></textarea></div>',
        'logged_in_as'              => '<div class="article__form-comments-user article__input"><p class="body-2">Sei registrato come ' . $userEmailLogged . '</p></div>',
        'comment_notes_before'      => __(''),
        'comment_notes_after'       => '',
        'id_submit'                 => __('comment-submit'),
        'class_form'                => 'article__form-comments-grid',
    ];
    ?>
    <?php comment_form($argsComment); ?>
</section>
<section class="article__container-comments">
    <h2 class="article__comments-title h2">
        <?= $commentsNum; ?><?= $commentsNum === 1 ? ' commento' : ' commenti'; ?>
    </h2>
    <?php
    /**
     * Show approved comments
     */
    $argsSingleComment = [
        'status'    => 'approve',
        'post_id' => $postID,
    ];
    
    $commentsQuery = new WP_Comment_Query();
    $getAllComments = $commentsQuery->query($argsSingleComment);

    if ($getAllComments) {
        foreach ($getAllComments as $comment) {
    ?>
            <div class="comment-card">
                <div class="comment-card__container-title">
                    <h2 class="h3"><?= $comment->comment_author; ?></h2>
                </div>
                <div class="comment-card__container-data">
                    <span class="comment-card__data body-6">Pubblicato in data <?= get_comment_date('d-m-Y G:i:s'); ?> da <?= $comment->comment_author; ?></span>
                </div>
                <div class="comment-card__container-content">
                    <p class="comment-card__paragraph body-2">
                        <?= $comment->comment_content; ?>
                    </p>
                </div>
            </div>
    <?php
        }
    }
    ?>
</section>