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
function isThisUr(string $url): bool {
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