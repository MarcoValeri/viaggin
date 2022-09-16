<aside class="content__sidebar">
    <div class="content__sidebar-content">
        <div class="content__sidebar-container-title">
            <h3 class="content__sidebar-title h4">Seguici su:</h3>
        </div>
        <ul class="content__sidebar-menu">
            <li class="content__sidebar-menu-item">
                <a class="link-no-style" href="https://www.facebook.com/viaggin/" target="_blank">
                    <img class="content__sidebar-social-icon" src="<?= get_template_directory_uri(); ?>/images/facebook-logo.png" alt="Facebook Icon">
                </a>
            </li>
            <li class="content__sidebar-menu-item">
                <a class="link-no-style" href="https://www.instagram.com/viaggin_official/" target="_blank">
                    <img class="content__sidebar-social-icon" src="<?= get_template_directory_uri(); ?>/images/instagram-logo.png" alt="Instagram Icon">
                </a>
            </li>
        </ul>
    </div>
    <div class="content__sidebar-content">
        <div class="content__sidebar-container-title">
            <h3 class="content__sidebar-title h4">Categorie</h3>
        </div>
        <ul class="content__sidebar-menu-list">
            <li class="content__sidebar-menu-item-list">
                <a class="link body-2" href="<?= createLink('/category/viaggi/'); ?>">
                    Viaggi
                </a>
            </li>
            <li class="content__sidebar-menu-item-list">
                <a class="link body-2" href="<?= createLink('/category/eventi/'); ?>">
                    Eventi
                </a>
            </li>
            <li class="content__sidebar-menu-item-list">
                <a class="link body-2" href="<?= createLink('/category/documenti/"'); ?>">
                    Documenti di viaggio
                </a>
            </li>
            <li class="content__sidebar-menu-item-list">
                <a class="link body-2" href="<?= createLink('/category/vivere-estero/'); ?>">
                    Vivere all'estero
                </a>
            </li>
        </ul>
    </div>
</aside>