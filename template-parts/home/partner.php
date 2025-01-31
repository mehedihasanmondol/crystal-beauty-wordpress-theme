<!-- PARTNER LOGO SECTION -->
<section class="clearfix brandArea patternbg">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="owl-carousel partnersLogoSlider">
          <?php
          $reviews = new WP_Query(array(
            'post_type' => 'partners',
            'posts_per_page' => -1,
            'order'          => 'ASC',
          ));
          if ($reviews->have_posts()) :
            while ($reviews->have_posts()) : $reviews->the_post();
              $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
          ?>
              <div class="slide">
                <div class="partnersLogo clearfix">
                  <img class="lazyestload" data-src="<?php echo $image_url ?>" src="<?php echo $image_url ?>" alt="Image Partner">
                </div>
              </div>
          <?php
            endwhile;
            wp_reset_postdata();
          else :
            echo '<p>No Partners found. Please add Partners in the Partners section.</p>';
          endif;
          ?>

        </div>
      </div>
    </div>
  </div>
</section>