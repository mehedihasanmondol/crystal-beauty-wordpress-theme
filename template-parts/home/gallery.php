<?php
$atts = get_query_var('gallery_atts', array());


?>

<!-- HOME GALLERY SECTION -->
<section>
  <div class="clearfix homeGalleryTitle">
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
    </div>
  </div>

  <?php
  $gallery_categories = get_gallery_categories();
  ?>
  <div class="container-fluid clearfix homeGallery">
    <div class="row">
      <div class="col-xs-12">
        <div class="filter-container isotopeFilters">
          <ul class="list-inline filter">

            <li class="active"><a href="#" data-filter="*">all item</a></li>

            <?php
            foreach ($gallery_categories as $category) {
            ?>
              <li>
                <a href="#" data-filter=".category_<?php echo esc_html($category->term_id) ?>">
                  <?php echo esc_html($category->name) ?>
                </a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>

    <div class="row isotopeContainer" id="container">
      <?php
      $args = array(
        'post_type'      => 'gallery',
        'posts_per_page' => -1,
        'order'          => 'DESC',
      );

      $gallery_query = new WP_Query($args);
      if ($gallery_query->have_posts()) :
        while ($gallery_query->have_posts()) : $gallery_query->the_post();
          $terms = get_the_terms(get_the_ID(), 'gallery_category'); // Get gallery categories
          $first_category_id = '';

          if (!empty($terms) && !is_wp_error($terms)) {
            $first_category_id = 'category_' . $terms[0]->term_id; // Get first category ID only
          }
          $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
      ?>
          <div class="col-sm-3 isotopeSelector <?php echo $first_category_id ?>">
            <div class="card">
              <div class="card-img">
                <img class="img-full lazyestload" data-src="<?php echo $thumbnail_url ?>" src="<?php echo $thumbnail_url ?>" alt="Image">
                <div class="overlay-content">
                  <a href="<?php echo $thumbnail_url ?>" data-fancybox="images">
                    <h5>
                      <i class="fa fa-plus" aria-hidden="true"></i> <br>
                      <?php the_title(); ?>
                    </h5>
                  </a>
                </div>
              </div>
            </div>
          </div>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
        echo '<p>No Gallery found. Please add Gallery in the Gallery section.</p>';
      endif;
      ?>

    </div>
  </div>
</section>