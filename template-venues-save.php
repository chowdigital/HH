<?php /* Template Name: Venues */ get_header(); ?>

<main>
    <section class="page-full-height">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
            <div class="feature-image">
                <?php the_post_thumbnail('full'); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endwhile; else: ?>
        <p>Sorry, no posts matched your criteria.</p>
        <?php endif; ?>
    </section>

    <section class="venues">
        <?php
    // Arguments to get all 'venues' category posts not in 'now-showing'
    $args_venues = array(
        'posts_per_page' => -1, // Retrieve all posts
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => 'venues', // Include 'venues' posts
            ),
        ),
    );

    $venues_query = new WP_Query($args_venues);
    if ($venues_query->have_posts()) : while ($venues_query->have_posts()) : $venues_query->the_post(); ?>
        <div class="post-item now-showing">
            <?php if (has_post_thumbnail()) : ?>
            <div class="appear-pic" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>');">
            </div>
            <?php endif; ?>
            <div class="wrapper-venues">
                <div class="text-content color-box">
                    <div class="text-content-inner">
                        <h2><?php the_title(); ?></h2>
                        <h3>/ <?php 
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            // Loop through each category and display its name, excluding 'now-showing'
                            foreach ( $categories as $category ) {
                                if ( $category->slug != 'now-showing' ) { // Check the slug
                                    echo esc_html( $category->name ) . ' ';
                                }
                            }
                        }
                        ?></h3>

                        <?php the_content(); ?>
                        <?php
                        $custom_url = get_post_meta(get_the_ID(), '_custom_url', true);
                        if (!empty($custom_url)) {
                            echo '<a href="' . esc_url($custom_url) . '" target="_blank" class="button">Visit Website</a>';
                        }
                    ?>
                    </div>
                </div>
                <div class="text-content color-box-white">
                    <div class="text-content-inner">

                        <!-- Venue Stats -->
                        <!-- Venue Stats -->
                        <?php
                            // Retrieve venue information stored in custom meta-boxes using the updated meta keys
                            $location = get_post_meta(get_the_ID(), '_venue_location', true);
                            $standing_capacity = get_post_meta(get_the_ID(), '_venue_standing_capacity', true);
                            $seated_capacity = get_post_meta(get_the_ID(), '_venue_seated_capacity', true);
                            $size = get_post_meta(get_the_ID(), '_venue_size', true);
                            $key_features = get_post_meta(get_the_ID(), '_venue_key_features', true);

                            if ($location || $standing_capacity || $seated_capacity || $size || $key_features) {
                                echo '<ul>';

                                if ($location) {
                                    echo '<li><h3><strong>Location:</strong> ' . esc_html($location) . '</h3></li>';
                                }
                                if ($standing_capacity) {
                                    echo '<li><h3><strong>Standing Capacity:</strong> ' . esc_html($standing_capacity) . '</h3></li>';
                                }
                                if ($seated_capacity) {
                                    echo '<li><h3><strong>Seated Capacity:</strong> ' . esc_html($seated_capacity) . '</h3></li>';
                                }
                                if ($size) {
                                    echo '<li><h3><strong>Size (sqft):</strong> ' . esc_html($size) . '</h3></li>';
                                }
                                if ($key_features) {
                                    echo '<li><h3><strong>Key Features:</strong> ' . nl2br(esc_html($key_features)) . '</h3></li>';
                                }

                                echo '</ul>';
                            }
                            ?>

                        <!-- Venue Stats -->

                        <!-- Venue Stats -->
                    </div>
                </div>
            </div>
        </div>

        <?php endwhile; 
    endif; 

    // Reset post data to ensure it doesn't affect other queries
    wp_reset_postdata(); ?>
    </section>

</main>

<?php get_footer(); ?>
<!-- Venue Stats -->