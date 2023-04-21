<div class="searchform">
    <form class="searchform__form" action="<?= esc_url( home_url( '/' ) ); ?>" method="GET">
        <input class="searchform__input searchform__input-search" type="text" aria-label="Search" name="s" id="search" value="<?php the_search_query(); ?>" />
        <input class="searchform__input button button--white" type="submit" value="Cerca">
    </form>
</div>