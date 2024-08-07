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

<main id="main" class="site-main" role="main">
    <section class="content-wrapper">
        <div class="sticky-text-content">
            <div class="text-content-inner">

                <?php
            // Loop through posts (there should only be one in a standard page query)
            if ( have_posts() ) : while ( have_posts() ) : the_post();
            echo '<h1>'; // Start h1 tag
            the_title();
            echo '</h1>'; // Close h1 tag
            the_content();
            endwhile; endif;
            ?>
            </div>
        </div>
        <div class="image-content">
            <?php if (has_post_thumbnail()) : ?>
            <div class="animate-container feature-image">
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="Revealed Image">
                <div class="animate-overlay"></div>
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php
get_footer();