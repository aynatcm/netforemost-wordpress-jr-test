<?php
$site_name = get_bloginfo('name');
$site_logo = get_theme_mod('custom_logo');
?>

<header class="header">
    <div class="header__wrapper">
        <?php if ($site_logo) { ?>
            <a href="/" class="header__wrapper-logo">
                <img src="<?php echo esc_url(wp_get_attachment_image_src($site_logo, 'full')[0]); ?>"
                    alt="<?php echo esc_attr($site_name); ?>" class="header__wrapper-logo-img">
            </a>
        <?php } ?>


        <button id="menu-toggle" class="header__wrapper-button" aria-controls="primary-menu" aria-expanded="false">
            <span class="menu-toggle-icon">
                <img src="wp-content/themes/theme-aynat/assets/icons/menu.svg" alt="menu-icon">
            </span>
        </button>

        <?php
        if (has_nav_menu('primary-menu')) {
            wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'menu_id' => 'primary-menu',
                'menu_class' => 'menu-list',
                'container' => 'nav',
                'container_class' => 'menu',
            ));
        }
        ?>

    </div>
    </div>
</header>