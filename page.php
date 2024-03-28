<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>

<main id="page-main">
    <div class="full-height-column">
        <div class="hero-img round-br shadow"
            style="background-image:  url(<?php the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
        </div>
        <div class="logo-landing appear2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sunset.svg" alt="">
        </div>
    </div>
    <section class="container">


        <?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

    </section>

</main><!-- #main -->

<?php
get_footer();