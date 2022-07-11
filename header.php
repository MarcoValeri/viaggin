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
            <nav class="nav">
                <label class="nav__label" for="open">
                    <span class="nav__toggle"></span>
                    <span class="nav__toggle"></span>
                    <span class="nav__toggle"></span>
                </label>
                <input class="nav__input" name="open" id="open" type="checkbox">
                <ul class="nav__menu">
                    <li class="nav__item">Home</li>
                    <li class="nav__item">Viaggi</li>
                    <li class="nav__item">Eventi</li>
                    <li class="nav__item">Documenti</li>
                    <li class="nav__item">Vivere all'estero</li>
                    <li class="nav__item">Chi siamo</li>
                    <li class="nav__item">Contatti</li>
                </ul>
            </nav>
            <div class="header__container">
                <div class="header__logo">
                    <img class="header__logo" src="<?= get_template_directory_uri(); ?>/images/viaggin-logo.png" alt="Viaggin Logo">
                </div>
            </div>
        </header>