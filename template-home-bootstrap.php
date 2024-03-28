<?php /* Template Name: Home */ get_header(); ?>

<main class="home">
    <div class="row">
        <div class="hero-img round-br lg-img shadow"
            style="background-image:  url(<?php the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
        </div>
        <div class="offset-4 col-7 offset-md-0 col-md-4 col-lg-3 logo-landing appear2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sunset.svg" alt="">
        </div>
    </div>

    <div class="row">

        <div class="col-10 offset-1 offset-md-1 col-md-3 col-lg-2 offset-lg-1 home-intro pt-5 pb-5">
            <h3>give them Starsky & Hatch this christmas</h3>
            <p>Taxidermy williamsburg fixie, neutral milk hotel church-key kickstarter kombucha pinterest Brooklyn chia
                vice jawn. Letterpress yr jean shorts VHS green juice banjo, vinyl slow-carb meditation same neutral
                milk hotel cray XOXO. Woke flexitarian typewriter ennui marxism.</p>
            <a class="btn btn-sunset shadow">Shop Now</a>
        </div>
        <div class="d-none d-md-block offset-1 col-md-7 col-lg-8 offset-lg-1 round-l lg-img shadow"
            style="background-image:  url( https://starskyandhatch.co.uk/wp-content/uploads/2023/12/2980F102-020D-42FE-AC4F-89FF098F28A7-scaled.jpg); background-repeat: no-repeat; background-position: center; background-size: cover;">

        </div>
    </div>

    <div class="wrapper">
        <div class="marquee">
            <h1 class="display-3">BEACH VIBES &nbsp 🏖️ &nbsp BEACH VIBES &nbsp 🏖️ &nbsp BEACH VIBES &nbsp 🏖️ &nbsp
                BEACH VIBES &nbsp 🏖️ &nbsp BEACH VIBES &nbsp 🏖️ &nbsp</h1>

            <h1 class="display-3">BEACH VIBES &nbsp 🏖️ &nbsp BEACH VIBES &nbsp 🏖️ &nbsp BEACH VIBES &nbsp 🏖️ &nbsp
                BEACH VIBES &nbsp 🏖️ &nbsp BEACH VIBES &nbsp 🏖️ &nbsp</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-10 round-r sml-img shadow appear2"
            style="background-image:  url(https://starskyandhatch.co.uk/wp-content/uploads/2023/12/IMG_7789-scaled.jpeg); background-repeat: no-repeat; background-position: center; background-size: cover;">
        </div>

        <div class="wrapper">
            <div class="scroll-reverse">
                <h1 class="display-3">Specialty coffee &nbsp ☕ &nbsp Specialty coffee &nbsp ☕ &nbsp Specialty coffee
                    &nbsp ☕ &nbsp Specialty coffee &nbsp ☕ &nbsp </h1>

                <h1 class="display-3">Specialty coffee &nbsp ☕ &nbsp Specialty coffee &nbsp ☕ &nbsp Specialty coffee
                    &nbsp ☕ &nbsp Specialty coffee &nbsp ☕ &nbsp </h1>
            </div>
        </div>
        <div class="col-10 offset-2 round-l sml-img shadow appear2"
            style="background-image:  url(https://starskyandhatch.co.uk/wp-content/uploads/2023/12/C4A1CA56-790C-4CF6-9FB5-10F5F8D84404-1-scaled.jpg); background-repeat: no-repeat; background-position: center; background-size: cover;">
        </div>

        <div class="wrapper">
            <div class="marquee">
                <h1 class="display-3">FRESH PLATES &nbsp 🥗 &nbsp FRESH PLATES &nbsp 🥗 &nbsp FRESH PLATES &nbsp 🥗
                    &nbsp FRESH PLATES &nbsp 🥗 &nbsp FRESH PLATES &nbsp 🥗 &nbsp </h1>

                <h1 class="display-3">FRESH PLATES &nbsp 🥗 &nbsp FRESH PLATES &nbsp 🥗 &nbsp FRESH PLATES &nbsp 🥗
                    &nbsp FRESH PLATES &nbsp 🥗 &nbsp FRESH PLATES &nbsp 🥗 &nbsp </h1>
            </div>
        </div>
    </div>

    <section class="our-story row">
        <?php
        $page_id = 13; // Replace 13 with the ID of the page you want to display

        // Get the post object
        $page = get_post($page_id);

        if ($page) {
            $featured_image_url = get_the_post_thumbnail_url($page_id, 'full'); // Change 'full' to the desired image size

            // Display the featured image URL
            if ($featured_image_url) {
                echo '  <div class="col-10 col-md-7 col-lg-8 round-r lg-img shadow appear2"
                style="background-image:  url(';
                echo esc_url($featured_image_url);
                echo '); background-repeat: no-repeat; background-position: left; background-size: cover;">
                </div>';
            }
            echo '<div class="col-10 offset-1 offset-md-1 col-md-3 col-lg-2 offset-lg-1 home-intro pt-5 pb-5">
            ';

            echo '<h3>' . esc_html($page->post_title) . '</h3>';
            $excerpt = wp_trim_words($page->post_content, 50);
            echo apply_filters('the_content', $excerpt);
            echo '<a class="btn btn-sunrise shadow" href="' . esc_url(get_permalink($page_id)) . '" >Read More</a>';
            echo '</div>';

        }
    ?>


    </section>
    <div class="row">
        <div class="col-12 text-center section-heading">
            <h2 class="display-3">HAPPENING AT THE HATCH</h2>
        </div>
    </div>
    <div class="all-posts col-md-10 offset-md-1">
        <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 3, // Number of posts to display
                'order'          => 'DESC',
            );

            $recent_posts = new WP_Query($args);

            if ($recent_posts->have_posts()) :
                while ($recent_posts->have_posts()) : $recent_posts->the_post();
                    ?>
        <div class="recent-post">
            <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <?php            
                 $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
                echo '  <div class="square-img shadow appear2"
                style="background-image:  url(';
                echo esc_url($thumbnail_url);
                echo '); background-repeat: no-repeat; background-position: left; background-size: cover;">
                </div>';
            ?>
            </div>
            <?php endif; ?>

            <div class="post-content">
                <h3 class="post-title pt-3"><?php the_title(); ?></h3>
                <p class="post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-sunrise shadow">Read More</a>
            </div>
        </div>
        <?php
                endwhile;
                wp_reset_postdata(); // Reset post data to restore the main loop's context
            else :
                echo 'No recent posts found.';
            endif;
            ?>
    </div>
</main>


<?php get_footer(); ?>