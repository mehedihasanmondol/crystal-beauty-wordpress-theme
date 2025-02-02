<?php
// Exit if WooCommerce is not active
if (!class_exists('WooCommerce')) {
  return;
}

$atts = get_query_var('simple_products_atts', array());

?>

<!-- PRODUCT SECTION -->
<!-- PARTNER LOGO SECTION -->

<section class="clearfix productSection">
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
        <div class="owl-carousel productSlider">
          <?php

          $currency_symbol = get_woocommerce_currency_symbol();
          $products = get_products('simple');

          foreach ($products as $product) {
            // Get product image URL
            $image_id  = $product->get_image_id(); // Get main image ID
            $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : wc_placeholder_img_src();

          ?>
            <div class="slide">
              <div class="row">
                <div class="col-md-6 order">
                  <div class="productImage">
                    <img src="<?php echo $image_url ?>" data-src="<?php echo $image_url ?>" alt="<?php echo esc_html($product->get_name()) ?>" class="img-responsive lazyestload">
                    <!-- <a href="cart.html"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a> -->
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="productInfo">
                    <h3><?php echo esc_html($product->get_name()) ?></h3>
                    <h4>
                      <?php
                      echo wc_price($product->get_price());

                      ?>
                    </h4>

                    <p>
                      <?php echo $product->get_short_description() ?>
                    </p>
                    <a href="<?php echo esc_url($product->get_permalink()); ?>" class="btn btn-primary first-btn">read more</a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>
</section>