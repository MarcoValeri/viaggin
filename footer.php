            </main> <!-- Open on header.php -->
            <!-- Include sidebar.php -->
            <?php get_sidebar(); ?>
        </div> <!-- Open on hedaer.php with class "content" -->
        <footer class="footer">
            <div class="footer__container-content">
                <p class="body-3">Made with <span class="footer__heart">&hearts;</span> in London by Marco Valeri - &copy; 1984 - All rights reserved</p>
                <p class="body-3"><a class="link-no-style link-no-style--white" href="/privacy/">Privacy Policy</a> - <a class="link-no-style link-no-style--white" href="/privacy/">Cookie Policy</a></p>
            </div>
        </footer>
        <!-- Iubenda Privacy and Cookie Policy -->
        <a href="https://www.iubenda.com/privacy-policy/36030468" class="iubenda-white no-brand iubenda-embed" title="Privacy Policy ">Privacy Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
        <?php wp_footer(); ?>
    </body>
</html>