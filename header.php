<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cloudsdale_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/lightslider.js"></script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'cloudsdale-master' ); ?></a>



        <header id="masthead" class="site-header" style="position: fixed;top: 0;">
            <div class="fixed-navbar"></div>
            <div id="off-canvas-menu " class="off-canvas-menu">
                <div id="open-menu" class="menu-button container-checkbox">
                    <input type="checkbox" id="checkbox1" class="checkbox1 visuallyHidden">
                    <label for="checkbox1">
                        <div class="d-none hamburger hamburger1">
                            <span class="bar bar1"></span>
                            <span class="bar bar2"></span>
                            <span class="bar bar3"></span>
                            <span class="bar bar4"></span>
                        </div>
                    </label>
                </div>
                <div class="menu-content">
                    <!-- Add your navigation menu items here -->
                    <?php /* wp_nav_menu(array('theme_location' => 'primary-menu')); */ ?>
                    <!-- Dummy menu Start -->



                    <div class="off-canvas-container">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img id="navImg" src="<?php echo get_template_directory_uri(); ?>/assets/img/white-logo.svg"
                                alt="Starsky Logo">
                        </a>



                        <?php
										wp_nav_menu(
											array(
												'theme_location' => 'menu-1',
												'menu_id'        => 'primary-menu',
												'container'      => false,
												'menu_class'     => 'navbar-nav',
										
											)
										);
										
										?>
                    </div>


                </div>

            </div>
            <div id="soIcons" class="social-icons">
                <a class="instagram-icon " target="_blank" href="https://www.instagram.com/starskyandhatch/?hl=en"></a>
                <a class="facebook-icon " target="_blank" href="https://www.facebook.com/starskyandhatchhastings/"></a>
            </div>
            <a id="navBrand" class="navbar-brand " href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img id="navImg" src="<?php echo get_template_directory_uri(); ?>/assets/img/white-wide.svg"
                    alt="Vanguard Logo" style>
            </a>
        </header><!-- #masthead -->