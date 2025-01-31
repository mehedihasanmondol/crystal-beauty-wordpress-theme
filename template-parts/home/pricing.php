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

    <div class="row">
      <?php

      $currency_symbol = get_woocommerce_currency_symbol();
      $products = get_products('package_service');
      foreach ($products as $product) {
        // Get product image URL
        $image_id  = $product->get_image_id(); // Get main image ID
        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : wc_placeholder_img_src();

      ?>
        <div class="col-md-6 col-lg-3">
          <div class="priceTableWrapper">
            <div class="priceImage">
              <img src="<?php echo $image_url ?>" data-src="<?php echo $image_url ?>" alt="<?php echo esc_html($product->get_name()) ?>" class="img-responsive lazyestload">
              <div class="maskImage">
                <h3><?php echo esc_html($product->get_name()) ?></h3>
              </div>
              <div class="priceTag">
                <h4><?php echo $currency_symbol ?><?php echo esc_html($product->get_price()) ?></h4>
              </div>
            </div>
            <div class="priceInfo">
              <div>
                <?php echo $product->get_short_description() ?>

              </div>
              <a href="<?php echo esc_url($product->get_permalink()); ?>" class="btn btn-primary first-btn">Book Now</a>
            </div>
          </div>
        </div>
      <?php } ?>


    </div>
  </div>
</section>