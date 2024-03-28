<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cloudsdale_Theme
 */

get_header();
?>

<main id="primary" class="archive">


    <div class="text-center section-heading">
        <h1 class="display-3">WHAT'S ON AT THE HATCH</h1>
    </div>


    <?php if ( have_posts() ) : ?>

    <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				?>



    <?php
			echo '  <div class="whats-on"> ';
			$featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Change 'full' to the desired image size
			if ($featured_image_url) {
				echo '    <div class="sml-img shadow appear2"
				style="background-image:  url(';
				echo esc_url($featured_image_url);
				echo '); background-repeat: no-repeat; background-position: center; background-size: cover;">

				</div>';
			}
			echo '  <div class="blog-intro">';
						
			// Echo the post title
						echo '<h3>' . get_the_title() . '</h3>';
				
						// Echo the post content
						echo '<div class="pt-1">' . wp_trim_words(get_the_content(), 40) . '</div>';		
						echo '<a class="btn btn-sunrise shadow" href="' . esc_url(get_permalink($page_id)) . '" >Read More</a>';

						echo '</div>';		
						// Echo the featured image URL

			echo '</div>';

						
					endwhile;
				else :
					// If no posts are found
					echo 'No posts found.';
				endif;
		?>

</main><!-- #main -->

<?php

get_footer();