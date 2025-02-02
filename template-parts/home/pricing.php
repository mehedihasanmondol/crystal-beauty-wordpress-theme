<?php
// Exit if WooCommerce is not active
if (!class_exists('WooCommerce')) {
  return;
}

$atts = get_query_var('package_service_atts', array());

?>

<section class="clearfix pricingSection patternbg">
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

    <div class="row" data-masonry='{"percentPosition": true }'>
      <?php

      $currency_symbol = get_woocommerce_currency_symbol();
      $products = get_products('package_service', -1, true);
      foreach ($products as $product) {
        // Get product image URL
        $image_id  = $product->get_image_id(); // Get main image ID
        $image_url = wp_get_attachment_image_url($image_id, 'full');
        $price = $product->get_price();

      ?>
        <div class="col-md-6 col-lg-3 mb-3">
          <div class="priceTableWrapper">

            <?php
            if ($price or $image_id) {
            ?>
              <div class="priceImage">
                <?php if ($image_id) { ?>
                  <img src="<?php echo $image_url ?>" data-src="<?php echo $image_url ?>" alt="<?php echo esc_html($product->get_name()) ?>" class="img-responsive lazyestload">
                <?php } ?>
                <div class="maskImage">
                  <h3><?php echo esc_html($product->get_name()) ?></h3>
                </div>
                <?php


                if ($price) {

                ?>
                  <div class="priceTag">
                    <h4>
                      <?php

                      if (!empty($price)) {
                        echo wc_price($price);
                      }
                      ?>
                    </h4>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>

            <div class="priceInfo">
              <?php
              if (!$price and !$image_id) {
              ?>
                <h3><?php echo esc_html($product->get_name()) ?></h3>
              <?php } ?>
              <div>
                <?php echo $product->get_short_description() ?>

              </div>

              <a href="javascript:void(0)" class="btn btn-primary first-btn" data-toggle="modal" data-target="#<?php echo get_appointment_modal_id($product->get_id()) ?>">Book Now</a>
            </div>
          </div>
          <?php generate_appointment_modal($product->get_id(), $product->get_name()) ?>

        </div>
      <?php } ?>


    </div>
  </div>
</section>