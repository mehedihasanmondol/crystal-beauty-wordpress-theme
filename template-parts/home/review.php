<!-- REVIEW SECTION -->
<section class="clearfix reviewSection patternbg">
  <div class="container">
    <div class="secotionTitle">
      <h2>
        <span>
          <?php echo get_theme_mod('testimonial_main_title', 'Testimonials'); ?>
        </span>
        <?php echo get_theme_mod('testimonial_subtitle', 'Customer reviews'); ?>
      </h2>
    </div>

    <div class="row">
      <?php
      $reviews = new WP_Query(array(
        'post_type' => 'testimonial',
        'posts_per_page' => -1,
        'order'          => 'ASC',
      ));
      if ($reviews->have_posts()) :
        while ($reviews->have_posts()) : $reviews->the_post();
          $slide_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
      ?>

          <div class="col-md-6">
            <div class="reviewImage">
              <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" data-src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" alt="Image review" class="img-responsive lazyestload">
            </div>

            <div class="reviewInfo mb-md-0">
              <i class="fa fa-quote-left" aria-hidden="true"></i>
              <?php the_content(); ?>
              <h3><?php the_title(); ?></h3>
              <h4><?php echo get_the_excerpt() ?></h4>
            </div>
          </div>

      <?php
        endwhile;
        wp_reset_postdata();
      else :
        echo '<p>No Testimonials found. Please add Testimonials in the Testimonials section.</p>';
      endif;
      ?>


    </div>
  </div>
</section>