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


<main class="page-full-height">
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
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="feature-image">
            <div class="feature-logo">
                <?php 
                $post_logo = get_post_meta(get_the_ID(), '_wpb_post_logo', true);
                if (!empty($post_logo)) : ?>
                <img src="<?php echo esc_url($post_logo); ?>" alt="Post Logo">
                <?php endif; ?>
            </div>
            <?php the_post_thumbnail('full'); ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endwhile; endif; ?>
    <div class="section venue-stats">
        <?php
// Check if we're inside a single post of the 'post' type.
if (is_single() && get_post_type() == 'post') {
    // Retrieve post meta values
    $location = get_post_meta(get_the_ID(), '_custom_venues_location', true);
    $standing_capacity = get_post_meta(get_the_ID(), '_custom_venues_standing_capacity', true);
    $seated_capacity = get_post_meta(get_the_ID(), '_custom_venues_seated_capacity', true);
    $size = get_post_meta(get_the_ID(), '_custom_venues_size', true);
    $key_features = get_post_meta(get_the_ID(), '_custom_venues_key_features', true);

    // Only proceed if at least one of the meta values is not empty
    if ($location || $standing_capacity || $seated_capacity || $size || $key_features) {
        echo '<h2>Venue Information</h2>';
        echo '<ul>';

        if ($location) {
            echo '<li><strong>Location:</strong> ' . esc_html($location) . '</li>';
        }
        if ($standing_capacity) {
            echo '<li><strong>Standing Capacity:</strong> ' . esc_html($standing_capacity) . '</li>';
        }
        if ($seated_capacity) {
            echo '<li><strong>Seated Capacity:</strong> ' . esc_html($seated_capacity) . '</li>';
        }
        if ($size) {
            echo '<li><strong>Size (sqft):</strong> ' . esc_html($size) . '</li>';
        }
        if ($key_features) {
            // Assuming $key_features is saved as plain text. If it's saved in a different format (e.g., JSON), you'll need to process it accordingly.
            echo '<li><strong>Key Features:</strong> ' . nl2br(esc_html($key_features)) . '</li>';
        }

        echo '</ul>';
    }
}
?>

    </div>
</main>

<?php
get_footer();
?>