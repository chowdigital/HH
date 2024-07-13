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

    <section class="page-full-height">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="content-wrapper">
            <!-- Left Side: Title and Content -->
            <div class="text-content">
                <div class="text-content-inner">
                    <h1><?php the_title(); ?></h1>

                    <?php the_content(); ?>
                </div>
            </div>

            <!-- Right Side: Feature Image -->
            <?php if (has_post_thumbnail()) : ?>
            <div class="animate-container feature-image">
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="Revealed Image">
                <div class="animate-overlay"></div>
            </div>
            <?php endif; ?>
        </div>
        <?php endwhile; endif; ?>
    </section>
</main><!-- #main -->

<?php
get_footer();