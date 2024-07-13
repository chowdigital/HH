<?php /* Template Name: Bars */ get_header(); ?>

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
        // Arguments to get all 'bars' category posts not in 'now-showing'
        $args_bars = array(
            'posts_per_page' => -1, // Retrieve all posts
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => 'restaurants-bars', // Include 'bars' posts
                ),
            ),
        );

        $bars_query = new WP_Query($args_bars);
        if ($bars_query->have_posts()) : while ($bars_query->have_posts()) : $bars_query->the_post(); ?>
        <div class="post-item past-production">
            <?php if (has_post_thumbnail()) : ?>
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
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                if ($category->slug != 'now-showing') {
                                    echo esc_html($category->name) . ' ';
                                }
                            }
                        }
                        ?>
                    </h3>
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
        wp_reset_postdata(); ?>
    </section>
</main>

<?php get_footer(); ?>