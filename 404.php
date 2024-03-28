<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package  cloudsdale-theme
 */

get_header();
?>

<main id="primary" class="site-main ">

    <div class="full-height-column">
        <div class="hero-img round-br shadow"
            style="background-image:  url(<?php echo get_template_directory_uri(); ?>/assets/img/404.png); background-repeat: no-repeat; background-position: center; background-size: cover;">
        </div>
        <div class="container appear2">
            <h1 class="">Oops, page not found</h1>
        </div>
    </div>






    <section class="container">
        <h2>What page were you looking for? </h2>
        <a href="<?php get_home_url() ?>">
            <h3>Home</h3>
        </a>

        <a href="<?php get_home_url() ?>/our-menu/">
            <h3>Menus</h3>
        </a>

        <a href="<?php get_home_url() ?>/our-story/">
            <h3>About us</h3>
        </a>






    </section>



</main><!-- #main -->

<?php
get_footer();