<?php

function fyrre_assets() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style/main.css', microtime());
    wp_enqueue_style('main-style', get_template_directory_uri() . '/script/script.js', microtime());
}

add_action('wp_enqueue_scripts', 'fyrre_assets');

