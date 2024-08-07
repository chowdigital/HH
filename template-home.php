<?php /* Template Name: Home */ get_header(); ?>

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


    <div id="currentProductions" class="section-heading">
        <h2>Current Productions</h2>
    </div>


    <section class="bars">
        <?php
// Next, get all 'theatre' category posts not in 'now-showing'
$args_theatre = array(
    'category_name' => 'now-showing', // Use your category slug
    'posts_per_page' => -1, // Retrieve all posts
);

$theatre_query = new WP_Query($args_theatre);
if ($theatre_query->have_posts()) : 
    while ($theatre_query->have_posts()) : $theatre_query->the_post(); ?>

        <a target="_blank" href="<?php
    $custom_url = get_post_meta(get_the_ID(), '_custom_url', true);
    if (!empty($custom_url)) {
        echo esc_url($custom_url);
    }
?>" class="post-item past-production">
            <?php if (has_post_thumbnail()) : ?>

            <div class="animate-container">
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="Revealed Image">
                <div class="animate-overlay"></div>

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