<?php

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