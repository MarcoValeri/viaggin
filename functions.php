<?php

// Load main CSS file
function viaggin_enqueque_style() {
    wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/style.css', [], time(), 'all');
}

add_action('wp_enqueue_scripts', 'viaggin_enqueque_style');