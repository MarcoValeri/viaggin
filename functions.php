<?php

// Add theme support
add_theme_support('post-thumbnails', ['post', 'page']);

// Load main CSS file
function viaggin_enqueque_style() {
    wp_enqueue_style('style-css', get_stylesheet_directory_uri() . '/style.css', [], time(), 'all');
    wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/assets/css/main.css', ['style-css'], time(), 'all');
}

add_action('wp_enqueue_scripts', 'viaggin_enqueque_style');

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
    
    $authorImage = 'http://localhost/viaggin/wp-content/uploads/viaggin-logo.png';

    switch ($authorEmail) {
        case 'info@marcovaleri.net':
            $authorImage = 'http://localhost/viaggin/wp-content/uploads/marco-valeri.jpeg';
            break;
        
        case 'marcovaleri@hotmail.it':
            $authorImage = 'http://localhost/viaggin/wp-content/uploads/marco-valeri.jpeg';
            break;

        case 'emanuelciuro@viaggin.com':
            $authorImage = 'http://localhost/viaggin/wp-content/uploads/emanuelciuro.jpg';
            break;

        case 'caterinagiordo@viaggin.com':
            $authorImage = 'http://localhost/viaggin/wp-content/uploads/caterinagiordo.png';
            break;

        case 'ariannacapogrossi@viaggin.com':
            $authorImage = 'http://localhost/viaggin/wp-content/uploads/ariannacapogrossi.jpg';
            break;

        case 'alessandracaputo@viaggin.com':
            $authorImage = 'http://localhost/viaggin/wp-content/uploads/alessandracaputo.jpeg';
            break;

        default:
            $authorImage = 'http://localhost/viaggin/wp-content/uploads/viaggin-logo.png';
            break;
    }

    return $authorImage;

}

/**
 * Create a function that determines the breadcrmbs
 */
function showBreadcrumbs(): string {

    $getPostCategory = get_the_category();
    $breadcrumb = '';

    if (isThisUrl('http://localhost/viaggin')) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin">Home</a>';
    } else if (isThisUrl('http://localhost/viaggin/category/viaggi')) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin/category/viaggi/">Categoria Viaggi</a>';
    } else if (isThisUrl('http://localhost/viaggin/category/eventi')) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin/category/eventi/">Categoria Eventi</a>';
    } else if (isThisUrl('http://localhost/viaggin/category/documenti')) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin/category/documenti/">Categoria Documenti</a>';
    } else if (isThisUrl('http://localhost/viaggin/category/vivere-estero')) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin/category/vivere-estero/">Categoria Vivere all\'Estero</a>';
    } else if (isThisUrl('http://localhost/viaggin/chi-siamo')) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin/chi-siamo">Chi Siamo</a>';
    } else if (isThisUrl('http://localhost/viaggin/contatti')) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin/contatti">Contatti</a>';
    } else if (is_single()) {
        $breadcrumb = '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin">Home</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin/category/' .  $getPostCategory[0]->slug . '">' . $getPostCategory[0]->name . '</a>';
        $breadcrumb .= '<span class="breadcrumbs__item-span"> / </span>';
        $breadcrumb .= '<a class="breadcrumbs__item link-no-style body-4" href="/viaggin/category/' .  get_post_permalink() . '">' . get_the_title() . '</a>';
    }

    return $breadcrumb;
}