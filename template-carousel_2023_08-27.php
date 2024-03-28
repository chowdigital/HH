<?php /* Template Name: Carosel */ get_header(); ?>
<style>
  <style>
  #loopCarousel {
  margin: 100px 0 100px 0;
}
@media (max-width: 767px) {
  .carousel-inner .carousel-item > div {
    display: none;
  }
  .carousel-inner .carousel-item > div:first-child {
    display: block;
  }
}

.carousel-inner .carousel-item.active,
.carousel-inner .carousel-item-next,
.carousel-inner .carousel-item-prev {
  display: flex;
}

/* medium and up screens */
@media (min-width: 768px) {
  .carousel-inner .carousel-item-end.active,
  .carousel-inner .carousel-item-next {
    transform: translateX(33.33%);
  }

  .carousel-inner .carousel-item-start.active,
  .carousel-inner .carousel-item-prev {
    transform: translateX(-33.33%);
  }
}

.carousel-inner .carousel-item-end,
.carousel-inner .carousel-item-start {
  transform: translateX(0);
}

/* Custom CSS for the carousel indicators */
.carousel-indicators {
  bottom: -50px; /* Adjust the spacing from the carousel */
  list-style: none;
  text-align: center;
}

.carousel-indicators li {
  display: inline-block;
  width: 10px; /* Set the width of the circle */
  height: 10px; /* Set the height of the circle */
  margin: 0 5px; /* Adjust the spacing between the circles */
  border-radius: 50%; /* Make the circles round */
  cursor: pointer;
}

.carousel-indicators .active {
  background-color: $highlight; /* Change this to your desired color for active indicators */
}

.carousel-indicators [data-bs-target] {
  width: 10px;
  height: 10px;
}
.carousel-control-next {
  width: 15px;
}
.carousel-control-prev {
  width: 15px;
  left: 0px;
}
@media (min-width: $lg) {
  .carousel-control-next {
    width: 30px;
    right: 0px;
  }
  .carousel-control-prev {
    width: 30px;
    left: -30px;
  }
}
.item-body {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
  padding: 0 30px 0 30px;
  background-color: $primary;
}
.item-content {
  color: $white;
  h5 {
    margin-top: 1em;
  }
}
.item-text {
}

  </style>
<!-- Full Page Intro -->

<div class="view full-page-intro z-depth-3">

<div class="view full-page-intro" style="background-image:  url(<?php the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
 
		 </div>
<!-- Mask & flexbox options-->

<div class="mask d-flex justify-content-center align-items-center">

  <!-- Content -->
  <div class="container">



  </div>
  <!-- Content -->

  

</div>
<!-- Mask & flexbox options-->

</div>
<!-- Full Page Intro --> 



<section class="container">
  
<div id="loopCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner row">

    <?php
    // Custom WordPress Loop to retrieve posts
    $args = array(
      'post_type' => 'post', // Change to your post type if necessary
      'posts_per_page' => 6, // Number of posts to display in the carousel
    );

    $query = new WP_Query($args);
    $item_count = 0;

    while ($query->have_posts()) {
      $query->the_post();
      $item_count++;

      // Output the carousel item markup
      if ($item_count === 1) {
        echo '<div class="carousel-item active">';
      } else {
        echo '<div class="carousel-item">';
      }
    ?>

      <div class="col-12 col-lg-6 col-xl-4">
        <div class="item-body">
          <div class="item-content">
        <div class="square-box" style="background-image:  url(<?php the_post_thumbnail_url(); ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
         
        </div>

              <h5 ><?php the_title(); ?></h5>
              <p ><?php the_excerpt(); ?></p>
            </div>
            <div class="item-button"> 
              <a href="#"><button type="button" class="btn btn-white">Find out more</button></a>
            </div>
        </div>
      </div>

    </div><!-- end of carousel-item -->

    <?php
    }

    wp_reset_postdata();
    ?>

  </div><!-- end of carousel-inner -->
<!-- Carousel navigation indicators -->
<ol class="carousel-indicators">
    <?php
    // Reset the counter to generate indicators
    $item_count = 0;
    while ($query->have_posts()) {
      $query->the_post();
      $item_count++;
    ?>
      <li data-bs-target="#loopCarousel" data-bs-slide-to="<?php echo $item_count - 1; ?>" <?php echo $item_count === 1 ? 'class="active"' : ''; ?>></li>
    <?php
    }
    ?>
  </ol>

  <button class="carousel-control-prev" type="button" data-bs-target="#loopCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#loopCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div><!-- end of myCarousel -->

</section>


<?php get_footer(); ?>

