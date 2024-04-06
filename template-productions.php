<?php /* Template Name: Productions */ get_header(); ?>

<main>
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
            <?php if ( has_post_thumbnail() ) : ?>
            <div class="feature-image">
                <?php the_post_thumbnail('full'); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endwhile; endif; ?>
    </section>

    <section class="now-showing">
        <?php
// First, get the 'now-showing' posts
$args_now_showing = array(
    'category_name' => 'now-showing', // Use your category slug
    'posts_per_page' => -1, // Retrieve all posts
);

$now_showing_query = new WP_Query($args_now_showing);

if ($now_showing_query->have_posts()) : 
    while ($now_showing_query->have_posts()) : $now_showing_query->the_post(); ?>
        <div class="scrolling-container">
            <div class="scrolling-text">
                <h2>NOW SHOWING&nbsp;&nbsp;&nbsp;NOW SHOWING&nbsp;&nbsp;&nbsp;NOW SHOWING&nbsp;&nbsp;&nbsp;NOW
                    SHOWING&nbsp;&nbsp;&nbsp;NOW SHOWING&nbsp;&nbsp;&nbsp;NOW SHOWING&nbsp;&nbsp;&nbsp;NOW
                    SHOWING&nbsp;&nbsp;&nbsp;NOW SHOWING&nbsp;&nbsp;&nbsp;NOW SHOWING&nbsp;&nbsp;&nbsp;NOW
                    SHOWING&nbsp;&nbsp;&nbsp;</h2>
            </div>
            <div class="scrolling-text">
                <h2>NOW SHOWING&nbsp;&nbsp;&nbsp;NOW SHOWING&nbsp;&nbsp;&nbsp;NOW SHOWING&nbsp;&nbsp;&nbsp;NOW
                    SHOWING&nbsp;&nbsp;&nbsp;NOW SHOWING&nbsp;&nbsp;&nbsp;NOW SHOWING&nbsp;&nbsp;&nbsp;NOW
                    SHOWING&nbsp;&nbsp;&nbsp;NOW SHOWING&nbsp;&nbsp;&nbsp;NOW SHOWING&nbsp;&nbsp;&nbsp;NOW
                    SHOWING&nbsp;&nbsp;&nbsp;</h2>
            </div>
        </div>


        <div class="post-item now-showing">
            <?php if ( has_post_thumbnail() ) : ?>
            <div class="custom-background inner-shadow-div"
                style="background-image: url('<?php the_post_thumbnail_url('full'); ?>');">

            </div>
            <?php endif; ?>

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
        </div>

        <?php endwhile; 
endif; 

// Reset post data to prevent conflicts
wp_reset_postdata(); 
?>
    </section>
    <div class="scrolling-container-reverse">
        <div class="scrolling-text-reverse">
            <h2>PAST PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST
                PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST
                PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST
                PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST PRODUCTIONS&nbsp;&nbsp;&nbsp;</h2>
        </div>
        <div class="scrolling-text-reverse">
            <h2>PAST PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST
                PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST
                PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST
                PRODUCTIONS&nbsp;&nbsp;&nbsp;PAST PRODUCTIONS&nbsp;&nbsp;&nbsp;</h2>
        </div>
    </div>


    <section class="theatre">
        <?php
// Next, get all 'theatre' category posts not in 'now-showing'
$args_theatre = array(
    'posts_per_page' => -1, // Retrieve all posts
    'tax_query' => array(
        'relation' => 'AND', // Use AND to ensure all conditions must be met
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => 'theatre', // Include 'theatre' posts
        ),
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => 'now-showing',
            'operator' => 'NOT IN', // Exclude 'now-showing' posts
        ),
    ),
);

$theatre_query = new WP_Query($args_theatre);
if ($theatre_query->have_posts()) : 
    while ($theatre_query->have_posts()) : $theatre_query->the_post(); ?>

        <div class="post-item past-production">
            <?php if ( has_post_thumbnail() ) : ?>
            <div class="square-background" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>');">
                <?php endif; ?>

            </div>


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
        </div>
        <?php endwhile; 
endif; 

// Reset post data to ensure it doesn't affect other queries
wp_reset_postdata(); 
?>
    </section>
</main>


<?php get_footer(); ?>