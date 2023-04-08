<?php

get_header(); 

?>

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

<?php

$validForm = false;
$formErrors = [];
$formName = '';
$formEmail = '';
$formMessage = '';

if (isset($_POST['contact-submit'])) {
    // Name validation
    if (isset($_POST['contact-name'])) {
        $getName = $_POST['contact-name'];
        $getName = htmlentities($getName);
        $getName = trim($getName);
        // Check if the name contains only characters
        if (ctype_alpha($getName)) {
            /**
             * Check if the name is longher than 2 characters
             * and
             * shorter than 35 charaters
             */
            if (strlen($getName) >= 2 && strlen($getName) <= 35) {
                $formName = $getName;
                $validForm = true;
            } else {
                $formErrors['Nome'] = "dovrebbe essere di almeno due caratterti ma non più lungo di 35";
                $validForm = false;
            }
        } else {
            $formErrors['Nome'] = "dovrebbe contenere solo lettere, numeri e caratteri speciali non sono consentiti";
            $validForm = false;
        }
    }

    // Email validation
    if (isset($_POST['contact-email'])) {
        $getEmail = $_POST['contact-email'];
        $getEmail = htmlentities($getEmail);
        $getEmail = trim($getEmail);
        // Check if the email is valid
        if (filter_var($getEmail, FILTER_VALIDATE_EMAIL)) {
            $formEmail = $getEmail;
            $validForm = true;
        } else {
            $formErrors['Email'] = "inserire un indirizzo di posta elettronica valido";
            $validForm = false;
        }
    }

    // Message validation
    if (isset($_POST['contact-message'])) {
        $getMessage = $_POST['contact-message'];
        $getMessage = htmlentities($getMessage);
        $getMessage = trim($getMessage);
        // Check the length
        if (strlen($getMessage) >= 10 && strlen($getMessage) <= 1000) {
            $formMessage = $getMessage;
            $validForm = true;
        } else {
            $formErrors['Messaggio'] = "dovrebbe essere di almeno 10 caratteri ma non superiore ai mille";
            $validForm = false;
        }
    }

    // Privacy validation
    if (isset($_POST['contact-privacy'])) {
        $validForm = true;
    } else {
        $formErrors['Privacy'] = "si prega di accettare la Privacy Policy";
        $validForm = false;
    }

    // Send the email
    if ($validForm && count($formErrors) === 0) {
        $formMessage = wordwrap($formMessage, 100);
        mail("info@marcovaleri.net", "ViaggIn Contact Form", $formMessage);
    }
}

?>

<div class="contact">
    <form class="contact__form" action="" method="POST">
        <div class="contact__grid-form">
            <div class="contact__container-header">
                <h4 class="h4">Contatta la redazione di <em>ViaggIn</em> compilando il seguende form</p>
            </div>
            <div class="contact__container-name">
                <input class="contact__input-text input-text" id="name" name="contact-name" type="text" value="<?= $formName; ?>" placeholder="Nome*" required />
            </div>
            <div class="contact__container-email">
                <input class="contact__input-text input-text" id="email" name="contact-email" type="email" value="<?= $formEmail; ?>" placeholder="Email*" required />
            </div>
            <div class="contact__container-message">
                <textarea class="contact__input-textarea input-textarea" id="message" name="contact-message" placeholder="Messaggio*" required><?php if (strlen($formMessage) > 0) echo $formMessage; ?></textarea>
            </div>
            <div class="contact__container-privacy">
                <label class="input-checkbox-label" for="contact-privacy">Accetto la <a href="<?= createLink('/privacy/'); ?>">Privacy Policy</a> *
                    <input id="contact-privacy" name="contact-privacy" type="checkbox" required />
                    <span class="input-checkbox-checkmark"></span>
                </label>
            </div>
            <div class="contact__container-errors">
                <ul class="contact__error-list">
                    <?php
                    foreach ($formErrors as $key => $value) {
                        echo "<li class='contact__error'>" . $key . ": " . $value . "</li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="contact__container-button">
                <input class="button button--black" name="contact-submit" type="submit" />
            </div>
        </div>
    </form>
</div>

<!-- Include footer.php -->
<?php get_footer(); ?>