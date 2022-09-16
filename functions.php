<?php

// Add theme support
add_theme_support('post-thumbnails', ['post', 'page']);

// Load JavaScript and css files
function viaggin_enqueue_script() {

    wp_enqueue_style('style-css', get_stylesheet_directory_uri() . '/style.css', [], time(), 'all');
    wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/assets/css/main.css', ['style-css'], time(), 'all');
}

add_action('wp_enqueue_scripts', 'viaggin_enqueue_script');

/**
 * Create a function that get
 * @param string $path
 * and
 * @return string $url
 * as a proper link
 */
function createLink(string $path): string {
    return get_site_url() . $path;
}

/**
 * Create a function that
 * @return string current url
 * e.g. www.viaggin.com/
 */
function getPath(): string {
    global $wp;
    return home_url($wp->request);
}

/**
 * Create a function that gets
 * @param string $url
 * and
 * @return bool true if
 * the current url === to $url
 * false otherwise
 */
function isThisUrl(string $url): bool {
    return getPath() === $url ? true : false;
}

/**
 * Register sidebar
 */
function viaggin_widgets_init() {

    register_sidebar([
        'name'              => esc_html__('Primary Sidebar', 'viaggin'),
        'id'                => 'main-sidebar',
        'description'       => esc_html__('Add widgets for main sidebar here', 'viaggin'),
        'before_widget'     => '<div class="sidebar__container-widget">',
        'after_widget'      => '</div>'
    ]);

}

add_action('widgets_init', 'viaggin_widgets_init');

/**
 * Create a function that gets
 * @param string $authorEmail
 * and
 * @return string url authr image
 */
function getAuthorImage($authorEmail): string {
    
    $authorImage = createLink('/wp-content/uploads/viaggin-logo.png');

    switch ($authorEmail) {
        case 'info@marcovaleri.net':
            $authorImage = createLink('/wp-content/uploads/marco-valeri.jpg');
            break;
        
        case 'marcovaleri@hotmail.it':
            $authorImage = createLink('/wp-content/uploads/marco-valeri.jpg');
            break;

        case 'emanuelciuro@viaggin.com':
            $authorImage = createLink('/wp-content/uploads/emanuelciuro.jpg');
            break;

        case 'caterinagiordo@viaggin.com':
            $authorImage = createLink('/wp-content/uploads/caterinagiordo.png');
            break;

        case 'ariannacapogrossi@viaggin.com':
            $authorImage = createLink('/wp-content/uploads/ariannacapogrossi.jpg');
            break;

        case 'alessandracaputo@viaggin.com':
            $authorImage = createLink('/wp-content/uploads/alessandracaputo.jpeg');
            break;

        default:
            $authorImage = createLink('/wp-content/uploads/viaggin-logo.png');
            break;
    }

    return $authorImage;

}

/**
 * Create a function that determines the breadcrmbs
 */
function showBreadcrumbs(): string {

    $getPostCategory = get_the_category();
    $getAuthorUrl = get_the_author_meta('user_url');
    $getAuthorName = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
    $getQueriedObject = get_queried_object();
    // echo $getQueriedObject->name;
    $breadcrumb = '';

    if (isThisUrl(createLink(''))) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('') . '">Home</a>';
    } else if (isThisUrl(createLink('/category/viaggi'))) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('') . '">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="'. createLink('/category/viaggi/') .'">Categoria Viaggi</a>';
    } else if (isThisUrl(createLink('/category/eventi'))) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('') . '">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('/category/eventi/') . '">Categoria Eventi</a>';
    } else if (isThisUrl(createLink('/category/documenti'))) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('') . '">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('/category/documenti/') . '">Categoria Documenti</a>';
    } else if (isThisUrl(createLink('/category/vivere-estero'))) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('') . '">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('/category/vivere-estero/') . '">Categoria Vivere all\'Estero</a>';
    } else if (isThisUrl(createLink('/chi-siamo'))) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('') . '">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('/chi-siamo/') . '">Chi Siamo</a>';
    } else if (isThisUrl(createLink('/contatti'))) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('') . '">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('/contatti/') . '">Contatti</a>';
    } else if (is_single() && get_post_type() == 'post') {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('') . '">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('/viaggin/category/' . $getPostCategory[0]->slug) . '">' . $getPostCategory[0]->name . '</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="' .  get_post_permalink() . '">' . get_the_title() . '</a>';
    } else if (is_author()) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('') . '">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="' . $getAuthorUrl . '">Autore ' . $getAuthorName . '</a>';
    } else if (is_tag()) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('') . '">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="' . createLink('/tag/' . $getQueriedObject->slug) . '">Tag: ' . $getQueriedObject->name . '</a>';
    }

    return $breadcrumb;
}