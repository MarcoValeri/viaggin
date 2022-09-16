<!-- Include header.php -->
<?php get_header(); ?>

<div class="error404__container-404">
    <h1 class="h1">Errore 404</h1>
    <p class="error404__404-description body-2">Sembra che la pagina o l'articolo che stai cercando non esista.</p>
    <div class="error404__404-container-action">
    <h3 class="h3">Cosa vuoi fare?</h3>
    <div class="error404__404-action-flex">
        <div class="error404__404-action-flex-single">
            <a href="<?= createLink(''); ?>" class="button button--yellow">Home</a>
        </div>
        <div class="error404__404-action-flex-single">
            <a href="<?= createLink('/category/viaggi/'); ?>" class="button button--yellow">Viaggi</a>
        </div>
        <div class="error404__404-action-flex-single">
            <a href="<?= createLink('/category/eventi/'); ?>" class="button button--yellow">Eventi</a>
        </div>
        <div class="error404__404-action-flex-single">
            <a href="<?= createLink('/category/documenti/'); ?>" class="button button--yellow">Documenti</a>
        </div>
        <div class="error404__404-action-flex-single">
            <a href="<?= createLink('/category/vivere-estero'); ?>" class="button button--yellow">Vivere all'estero</a>
        </div>
    </div>
</div>

<!-- Include footer.php -->
<?php get_footer(); ?>