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
        <p>Phone: <a href="tel:+442037454450">020 3745 4450</a></p>
        <p>Email: <a href="mailto:admin@hartshornhook.com">admin@hartshornhook.com</a></p>
        <p>Address: <a href="">52-56 Davies Street London Mayfair W1K 5JF</a></p>

    </div>
    <div class="footer-socials">
        <!-- Social Media Links -->
        <ul>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/facebook.svg"
                        alt="Facebook"></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/twitter.svg"
                        alt="Twitter"></a></li>
            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/instagram.svg"
                        alt="Instagram"></a></li>
        </ul>
    </div>
</footer>

<?php wp_footer(); ?>
</div>
</body>

</html>