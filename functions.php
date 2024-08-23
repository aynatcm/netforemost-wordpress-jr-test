<?php

require_once 'includes/base/scripts-styles.php';
require_once 'includes/base/menu.php';
require_once 'includes/base/custom_post_type.php';

// upload svg files to the theme
function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'allow_svg_upload');

// upload a custom logo for the site
function theme_prefix_setup()
{
    add_theme_support(
        'custom-logo',
        array(
            'height' => 100,
            'width' => 300,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'theme_prefix_setup');

// Disable gutenberg editor
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_widgets_block_editor', '__return_false');


//Enable features images support
function theme_setup()
{
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'theme_setup');


function netforemost_enqueue_styles()
{
    wp_enqueue_style('theme-styles', get_template_directory_uri() . '/dist/styles.css');


    wp_enqueue_script('javascript_theme', get_stylesheet_directory_uri() . "/dist/styles.js", ["jquery"], true);
}

add_action('wp_enqueue_scripts', 'netforemost_enqueue_styles', 15);