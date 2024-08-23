<?php
// Custom Post Type Article
function create_article_post_type() {

    $labels = array(
        'name'                  => _x('Articles', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Article', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Articles', 'text_domain'),
        'all_items'             => __('All Articles', 'text_domain'),
        'add_new_item'          => __('Add New Article', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
    );
    
    $args = array(
        'label'                 => __('Article', 'text_domain'),
        'description'           => __('Post type for articles', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'taxonomies'            => array('category'),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'publicly_queryable'    => true,
        'has_archive'           => true,
        'capability_type'       => 'page',
    );

    register_post_type('article', $args);
}

add_action('init', 'create_article_post_type', 0);
