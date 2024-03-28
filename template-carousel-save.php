<?php /* Template Name: Carosel */ get_header(); ?>

<!-- Full Page Intro -->

<div class="view full-page-intro z-depth-3">

    <div class="view full-page-intro"
        style="background-image:  url(<?php the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">

        <div class="center-home text-center container">

            <div class="">
                <div class="homepage-box p-1 mb-3">
                    <h1>The Vanguard, Camden</h1>
                </div>
                <a <?php if( get_field('new_tab') ): ?> target="blank" <?php endif; ?>
                    href="<?php the_field('button_link'); ?>"><button type="button"
                        class="btn btn-white"><?php the_field('button_text'); ?>
                    </button></a>
            </div>

        </div>



    </div>
    <!-- Mask & flexbox options-->

    <div class="mask d-flex justify-content-center align-items-center">



    </div>
    <!-- Mask & flexbox options-->

</div>
<!-- Full Page Intro -->


<script>
$(document).ready(function() {
    $('#responsive').lightSlider({
        item: 3,
        loop: true,
        slideMove: 1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed: 1000,
        auto: true,
        enableTouch: true,
        pauseOnHover: true,
        responsive: [{
                breakpoint: 992,
                settings: {
                    item: 2,
                    slideMove: 1,
                    slideMargin: 6,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    item: 1,
                    slideMove: 1
                }
            }
        ]
    });
});
</script>

<section class="container">

    <div class="item carosel-section">
        <ul id="responsive" class="content-slider">
            <?php $the_query = new WP_Query( 'cat=1&posts_per_page=3' );
                      if ( $the_query->have_posts() ) {
                      while ( $the_query->have_posts() ) { $the_query->the_post();  $category = get_the_category();  ?>
            <li class="item-body">
                <div class="item-content">
                    <div class="div">
                        <a href="<?php echo get_permalink() ?>">
                            <div class="square-box"
                                style="background-image:  url(<?php the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
                            </div>
                        </a>
                        <h3 class="pt-4"> <?php the_title(); ?>
                        </h3>
                        <div class="pt-4"> <?php the_excerpt(); ?>
                        </div>
                    </div>

                    <div class="item-btn">
                        <a href="<?php echo get_permalink() ?>">
                            <button type="button" class="btn btn-white">Find out more</button>
                        </a>
                    </div>
                </div>
            </li>
            <?php $counter++; } /* end while*/ } /* end if */ wp_reset_postdata(); ?>

        </ul>
    </div>

</section>


<?php get_footer(); ?>