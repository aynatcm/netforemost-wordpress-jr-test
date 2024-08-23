<?php
// Register menu location
function theme_prefix_register_menus()
{
    register_nav_menus(
        array(
            'primary-menu' => esc_html__('Primary Menu', 'theme-prefix'),
        )
    );
}
add_action('after_setup_theme', 'theme_prefix_register_menus');
