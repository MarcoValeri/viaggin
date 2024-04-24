
		</main> <!-- Open on header.php -->
            <!-- Include sidebar.php -->
            <?php get_sidebar(); ?>
        </div> <!-- Open on hedaer.php with class "content" -->
        <footer class="footer">
            <div class="footer__container-content">
                <p class="body-3">Made with <span class="footer__heart">&hearts;</span> in London by Marco Valeri - &copy; <?= date('Y'); ?> - All rights reserved</p>
                <p class="body-3"><a class="link-no-style link-no-style--white" href="javascript:Cookiebot.show()">Privacy Policy</a> - <a class="link-no-style link-no-style--white" href="/privacy/">Cookie Policy</a></p>
            </div>
        </footer>
        <div id="cookie-ban-banner" class="cookie-ban">
            <div class="cookie-ban__wrapper">
                <div class="cookie-ban__container-content">
                <img class="cookie-ban__logo" src="<?= get_template_directory_uri(); ?>/images/viaggin-logo.png" alt="Viaggin Logo" width="150" height="120">
                    <h2 class="cookie-ban__title h2">Hai scelto di negare il consenso ai cookies</h2>
                    <p class="body-2">Tuttavia, la pubblicità mirata è un modo per supportare il lavoro che viene svolto dagli autori di <em>ViaggIn</em>, che ogni giorno creano contenuti ed informazioni di qualità.</p>
                    <p class="body-2">Accettando i cookies potrai accedere liberamente ai contenuti di <em>ViaggIn</em></p>
                    <!-- <p class="body-2">Se proprio non vuoi accettare i cookies, puoi ricevere l'articolo in PDF al costo di euro 2</p> -->
                </div>
                <div class="cookie-ban__container-buttons">
                    <button id="cookie-ban-accept" class="button button--black">Accetta i cookies</button>
                    <p class="body-2"><em>oppure</em></p>
                    <button id="cookie-ban-subscription" class="button button--white">Scarica l'articolo in PDF per euro 2</button>
                    <p id="cookie-ban-no-available" class="cookie-ban__no-available body-3"><em>Opzione ancora non disponibile per questo contenuto</em></p>
                </div>
                <div class="cookie-ban__container-thank">
                    <p class="body-2">Grazie per il supporto</p>
                    <p class="cookie-ban__thank body-2">La redazione di <em>ViaggIn</em></p>
                    <img src="<?= get_template_directory_uri(); ?>/images/viaggin-logo.png" alt="Viaggin Logo" width="150" height="120">
                </div>
            </div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>