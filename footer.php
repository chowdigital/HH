<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cloudsdale_Theme
 */

?>
<footer id="colophon" class="site-footer">
    <div class="footer-logo">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hh-logo-white.svg"
                alt="Hartshorn-Hook Logo">
        </a>
    </div>

    <nav class="footer-menu">
        <?php
            // Example of using wp_nav_menu with a different theme location or menu class
            wp_nav_menu(
                array(
                    'theme_location' => 'footer-menu',
                    'menu_class'     => 'footer-nav',
                    'container'      => false,
                )
            );
        ?>
    </nav>




    <div class="footer-contact">
        <!-- Contact Information Placeholder -->
        <p>Email: <a href="mailto:admin@hartshornhook.com">admin@hartshornhook.com</a></p>
        <p>Address: <a
                href="https://www.google.com/maps/place/Kingswood+Arts/@51.430451,-0.0815556,15z/data=!4m2!3m1!1s0x0:0xc578df259b102b53?sa=X&ved=1t:2428&ictx=111">Kingswood
                Arts, Seeley Drive, London, SE21 8QN

                Facebook</a></p>

    </div>
    <div class="footer-socials">
        <!-- Social Media Links -->
        <ul>
            <li><a href="https://www.facebook.com/hartshornhook1"><img
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/facebook.svg"
                        alt="Facebook"></a></li>
            <li><a href="https://x.com/hartshornhook"><img
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/twitter.svg"
                        alt="Twitter"></a></li>
            <li><a href="https://www.instagram.com/hartshornhook/"><img
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/instagram.svg"
                        alt="Instagram"></a></li>
        </ul>
    </div>
</footer>

<?php wp_footer(); ?>
</div>
</body>

</html>