<?php
$atts = get_query_var('experts_atts', array());


?>

<!-- PARTNER LOGO SECTION -->
<section class="clearfix expertSection">
  <div class="container">

    <?php if ($atts['heading-visibility']) { ?>
      <div class="secotionTitle">
        <h2>
          <span>
            <?php echo $atts['main-heading']; ?>
          </span>
          <?php echo $atts['sub-heading']; ?>
        </h2>
      </div>
    <?php } ?>

    <div class="row">
      <div class="col-12">
        <div class="owl-carousel expartSlider">
          <?php
          $reviews = new WP_Query(array(
            'post_type' => 'expert',
            'posts_per_page' => -1,
            'order'          => 'ASC',
          ));
          if ($reviews->have_posts()) :
            while ($reviews->have_posts()) : $reviews->the_post();
              $facebook  = get_post_meta(get_the_ID(), 'expert_facebook', true);
              $twitter   = get_post_meta(get_the_ID(), 'expert_twitter', true);
              $linkedin  = get_post_meta(get_the_ID(), 'expert_linkedin', true);
              $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
          ?>

              <div class="slide">
                <div class="expertBox">
                  <div class="expertImage">
                    <img class="lazyestload" data-src="<?php echo $image_url ?>" src="<?php echo $image_url ?>" alt="Image expert">
                    <div class="expertMask">
                      <div class="socialArea">
                        <ul class="list-inline">

                          <?php if ($facebook) : ?>
                            <li><a href="<?php echo $facebook ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                          <?php endif; ?>

                          <?php if ($twitter) : ?>

                            <li><a href="<?php echo $twitter ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>

                          <?php endif; ?>

                          <?php if ($linkedin) : ?>
                            <li><a href="<?php echo $linkedin ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                          <?php endif; ?>

                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="expertCaption ">
                    <h2>
                      <a href="<?php echo esc_url(get_permalink()); ?>">
                        <?php the_title(); ?>
                      </a>
                    </h2>

                    <p><?php echo get_the_excerpt() ?></p>
                  </div>
                </div>
              </div>
          <?php
            endwhile;
            wp_reset_postdata();
          else :
            echo '<p>No Experts found. Please add Experts in the Experts section.</p>';
          endif;
          ?>


        </div>
      </div>
    </div>
  </div>
</section>