<?php /* Template Name: Immersive */ get_header(); ?>

<main>

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





    <section class="bars">
        <?php
// Next, get all 'theatre' category posts not in 'now-showing'
$args_theatre = array(
    'posts_per_page' => -1, // Retrieve all posts
    'tax_query' => array(
        'relation' => 'AND', // Use AND to ensure all conditions must be met
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => array('immersive'), // Include 'theatre' and 'another-category' posts            'operator' => 'IN', // Specify the operator to include these terms
        ),
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => 'now-showing', // Exclude 'now-showing' posts
            'operator' => 'NOT IN', // Exclude these terms
        ),
    ),
);

$theatre_query = new WP_Query($args_theatre);
if ($theatre_query->have_posts()) : 
    while ($theatre_query->have_posts()) : $theatre_query->the_post(); ?>

        <a target="_blank" href="<?php
    $custom_url = get_post_meta(get_the_ID(), '_custom_url', true);
    if (!empty($custom_url)) {
        echo esc_url($custom_url);
    }
?>" class="post-item past-production"> <?php if (has_post_thumbnail()) : ?>
            <div class="animate-container">
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="Revealed Image">
                <div class="animate-overlay"></div>
            </div>
            <?php endif; ?>

            <div class="text-content color-box">
                <div class="text-content-inner">
                    <h2><?php the_title(); ?></h2>
                    <h3>/
                        <?php 
$categories = get_the_category();
if ( ! empty( $categories ) ) {
    // Initialize a variable to check if it's the first category
    $first = true;
    foreach ( $categories as $category ) {
        if ( $category->slug != 'now-showing' ) { // Check the slug
            if ( $first ) {
                $first = false;
            } else {
                echo ' / ';
            }
            echo esc_html( $category->name );
        }
    }
}
?>
                    </h3>
                    <?php the_content(); ?>

                    <div class="button">Visit Website</div>

                </div>
            </div>
        </a>
        <?php endwhile; 
endif; 

// Reset post data to ensure it doesn't affect other queries
wp_reset_postdata(); 
?>
    </section>
</main>


<?php get_footer(); ?>