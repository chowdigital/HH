<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cloudsdale_Theme
 */

get_header();
?>

<main id="blog-main" class="">
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

				get_template_part( 'template-parts/content', get_post_type() );

				

				

			endwhile; // End of the loop.
			?>




    </section>

</main><!-- #main -->

<?php
get_footer();