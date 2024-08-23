<?php
$site_logo = get_theme_mod('custom_logo');
?>
<footer class="footer">
    <hr>
    <div class="footer__wrapper">
        <div class="footer__wrapper-left">
            <?php if ($site_logo) { ?>
                <a href="/" class="header__wrapper-logo">
                    <img src="<?php echo esc_url(wp_get_attachment_image_src($site_logo, 'full')[0]); ?>"
                        alt="<?php echo esc_attr($site_name); ?>" class="header__wrapper-logo-img">
                </a>
            <?php } ?>

            <p class="footer__wrapper-left-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Maecenas quis eros sed risus sollicitudin fringilla dictum in metus. Sed ultrices mauris a facilisis
                varius. </p>


            <div class="footer__wrapper-left-socials">

                <a href="#">
                    <img class="footer__wrapper-left-socials-media"
                        src="<?php echo get_template_directory_uri() . '/assets/images/facebook.png' ?>"
                        alt="Facebook logo" />
                </a>
                <a href="#">
                    <img class="footer__wrapper-left-socials-media"
                        src="<?php echo get_template_directory_uri() . '/assets/images/twitter.png' ?>"
                        alt="Twitter logo" />
                </a>
                <a href="#">
                    <img class="footer__wrapper-left-socials-media"
                        src="<?php echo get_template_directory_uri() . '/assets/images/instagram.png' ?>"
                        alt="Instagram logo" />
                </a>

            </div>
        </div>

        <div class="footer__wrapper-right">
            <div class="footer__wrapper-right-list">
                <h3 class="footer__wrapper-right-list-title">About me</h3>


                <div class="footer__wrapper-right-list-wrapper">
                    <ul>
                        <li><a href="#">My Team</a></li>
                        <li><a href="#">History</a></li>
                        <li><a href="#">My Products</a></li>
                        <li><a href="#">Bloggin</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer__wrapper-right-list">
                <h3 class="footer__wrapper-right-list-title">Resources</h3>


                <div class="footer__wrapper-right-list-wrapper">
                    <ul>
                        <li><a href="#">Webinars</a></li>
                        <li><a href="#">Courses</a></li>
                        <li><a href="#">Books</a></li>
                        <li><a href="#">Marketing</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer__wrapper-right-list">
                <h3 class="footer__wrapper-right-list-title">Contact</h3>


                <div class="footer__wrapper-right-list-wrapper">
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of use</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <span class="footer__copyright">Blog Rock © 2020 All Right Reserved</span>
</footer>

<?php wp_footer(); ?>

</body>

</html>