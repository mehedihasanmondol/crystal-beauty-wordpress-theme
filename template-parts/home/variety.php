<?php
// Exit if WooCommerce is not active
if (!class_exists('WooCommerce')) {
  return;
}

$atts = get_query_var('service_atts', array());

?>

<section class="clearfix varietySection" style="overflow:hidden">
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
        <div class="tabbable tabTop">
          <?php
          // Usage example: Get categories for 'service' product type
          $currency_symbol = get_woocommerce_currency_symbol();
          $product_type = 'service';
          $categories = get_categories_by_product_type($product_type);

          ?>
          <ul class="nav nav-tabs">
            <?php
            foreach ($categories as $i => $category) {
            ?>
              <li><a href="#cat_<?php echo esc_html($category->term_id) ?>" data-toggle="tab" class="<?php if ($i == 0) {
                                                                                                        echo 'active';
                                                                                                      } ?>"><span><?php echo esc_html($category->name) ?></span></a></li>
            <?php } ?>
          </ul>

          <div class="tab-content">
            <?php
            foreach ($categories as $j => $category) {
            ?>
              <div class="tab-pane <?php if ($j == 0) {
                                      echo 'active';
                                    } ?>" id="cat_<?php echo esc_html($category->term_id) ?>">
                <div class="tabbable tabs-left">
                  <div class="row">
                    <?php

                    $products = get_products_by_category_id($category->term_id, $product_type);

                    ?>
                    <div class="col-md-5 col-lg-4">
                      <ul class="nav nav-tabs">
                        <?php
                        foreach ($products as $k => $product) {
                        ?>
                          <li><a href="#product_<?php echo esc_html($product->get_id()) ?>" data-toggle="tab" class="<?php if ($k == 0) {
                                                                                                                        echo 'active';
                                                                                                                      } ?>">
                              <?php echo esc_html($product->get_name()) ?>
                              <span>
                                <?php
                                $price = $product->get_price();
                                if (!empty($price)) {
                                  echo wc_price($price);
                                }
                                ?>
                              </span>
                            </a>
                          </li>
                        <?php } ?>
                      </ul>
                    </div>

                    <div class="col-md-7 col-lg-8">
                      <div class="tab-content">
                        <?php
                        foreach ($products as $l => $product) {
                          // Get product image URL
                          $image_id  = $product->get_image_id(); // Get main image ID
                          $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : wc_placeholder_img_src();

                        ?>

                          <div class="tab-pane <?php if ($l == 0) {
                                                  echo 'active';
                                                } ?>" id="product_<?php echo esc_html($product->get_id()) ?>">
                            <div class="varietyContent">
                              <img src="<?php echo $image_url ?>" data-src="<?php echo $image_url ?>" alt="<?php echo esc_attr($product->get_name()); ?>" class="img-responsive lazyestload">
                              <h3><?php echo esc_html($product->get_name()) ?></h3>
                              <h4>
                                <?php
                                $price = $product->get_price();
                                if (!empty($price)) {
                                  echo wc_price($price);
                                }
                                ?>
                              </h4>
                              <p>
                                <?php echo $product->get_short_description() ?>
                              </p>

                              <?php
                              if (get_theme_mod('service_section_apointment_button', 1)) {
                              ?>
                                <a href="javascript:void(0)" class="btn btn-primary first-btn" data-toggle="modal" data-target="#<?php echo get_appointment_modal_id($product->get_id()) ?>">make An Appoinment</a>
                              <?php } else { ?>
                                <!-- Product Details Button -->
                                <a href="<?php echo esc_url($product->get_permalink()); ?>" class="btn btn-primary first-btn">Book now</a>

                              <?php } ?>


                              <?php generate_appointment_modal($product->get_id(), $product->get_name()) ?>


                            </div>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>