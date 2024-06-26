<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= wp_title(); ?></title>
        <link rel="icon" type="image/x-icon" href="<?= get_template_directory_uri(); ?>/images/viaggin-logo.png">

        <?php // Google Analytics 4 ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-FSTXVCFJP7"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-FSTXVCFJP7');
        </script>

        <?php // Google AdSense ?>
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9306947071363993" crossorigin="anonymous"></script>

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <?php
		wp_body_open();
		?>
        
        <header class="header">
            <nav class="nav">
                <label class="nav__label" for="open">
                    <span class="nav__toggle"></span>
                    <span class="nav__toggle"></span>
                    <span class="nav__toggle"></span>
                </label>
                <input class="nav__input" name="open" id="open" type="checkbox">
                <ul class="nav__menu">
                    <li class="nav__item"><a class="link-effect-load <?= isThisUrl(createLink('')) ? 'link-mark' : ''; ?>" href="<?= createLink('/') ?>" aria-label="Homepage">Home</li>
                    <li class="nav__item"><a class="link-effect-load <?= isThisUrl(createLink('/category/viaggi')) ? 'link-mark' : ''; ?>" href="<?= createLink('/category/viaggi/'); ?>">Viaggi</a></li>
                    <li class="nav__item"><a class="link-effect-load <?= isThisUrl(createLink('/category/documenti')) ? 'link-mark' : ''; ?>" href="<?= createLink('/category/documenti/'); ?>">Documenti</a></li>
                    <li class="nav__item"><a class="link-effect-load <?= isThisUrl(createLink('/category/vivere-estero')) ? 'link-mark' : ''; ?>" href="<?= createLink('/category/vivere-estero/'); ?>">Vivere all'estero</a></li>
                    <li class="nav__item"><a class="link-effect-load <?= isThisUrl(createLink('/chi-siamo')) ? 'link-mark' : ''; ?>" href="<?= createLink('/chi-siamo/'); ?>">Chi siamo</a></li>
                    <li class="nav__item"><a class="link-effect-load <?= isThisUrl(createLink('/contatti')) ? 'link-mark' : ''; ?>" href="<?= createLink('/contatti/'); ?>">Contatti</a></li>
                </ul>
            </nav>
            <div class="header__container">
                <div class="header__logo">
                    <a href="<?= createLink(''); ?>" aria-label="Link to Homepage">
                        <img class="header__logo" src="<?= get_template_directory_uri(); ?>/images/viaggin-logo.png" alt="Viaggin Logo" width="150" height="120">
                    </a>
                </div>
                <div class="breadcrumbs">
                    <div class="breadcrumbs__container">
                        <?= showBreadcrumbs(); ?>
                    </div>
                </div>
            </div>
        </header>
        <div class="content">
            <main class="content__main">