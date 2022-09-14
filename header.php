<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ViaggIn</title>

        <!-- Include wp_head() -->
        <?php wp_head(); ?>
    </head>
    <body>
        <header class="header">
            <?= getPath(); ?>
            <nav class="nav">
                <label class="nav__label" for="open">
                    <span class="nav__toggle"></span>
                    <span class="nav__toggle"></span>
                    <span class="nav__toggle"></span>
                </label>
                <input class="nav__input" name="open" id="open" type="checkbox">
                <ul class="nav__menu">
                    <li class="nav__item"><a class="link-effect-load <?= isThisUrl('http://localhost/viaggin') ? 'link-mark' : ''; ?>" href="/viaggin">Home</li>
                    <li class="nav__item"><a class="link-effect-load <?= isThisUrl('http://localhost/viaggin/category/viaggi') ? 'link-mark' : ''; ?>" href="http://localhost/viaggin/category/viaggi/">Viaggi</a></li>
                    <li class="nav__item"><a class="link-effect-load <?= isThisUrl('http://localhost/viaggin/category/eventi') ? 'link-mark' : ''; ?>" href="http://localhost/viaggin/category/eventi/">Eventi</a></li>
                    <li class="nav__item"><a class="link-effect-load <?= isThisUrl('http://localhost/viaggin/category/documenti') ? 'link-mark' : ''; ?>" href="http://localhost/viaggin/category/documenti/">Documenti</a></li>
                    <li class="nav__item"><a class="link-effect-load <?= isThisUrl('http://localhost/viaggin/category/vivere-estero') ? 'link-mark' : ''; ?>" href="http://localhost/viaggin/category/vivere-estero/">Vivere all'estero</a></li>
                    <li class="nav__item"><a class="link-effect-load <?= isThisUrl('http://localhost/viaggin/chi-siamo') ? 'link-mark' : ''; ?>" href="http://localhost/viaggin/chi-siamo/">Chi siamo</a></li>
                    <li class="nav__item"><a class="link-effect-load <?= isThisUrl('http://localhost/viaggin/contatti') ? 'link-mark' : ''; ?>" href="http://localhost/viaggin/contatti/">Contatti</a></li>
                </ul>
            </nav>
            <div class="header__container">
                <div class="header__logo">
                    <img class="header__logo" src="<?= get_template_directory_uri(); ?>/images/viaggin-logo.png" alt="Viaggin Logo">
                </div>
                <div class="breadcrumbs">
                    <div class="breadcrumbs__container"><a class="breadcrumbs__item link-no-style body-4" href="/">Home</a></div>
                </div>
            </div>
        </header>
        <div class="content">
            <main class="content__main">