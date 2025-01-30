<?php
// Exit if WooCommerce is not active
if (!class_exists('WooCommerce')) {
  return;
}


?>
<!-- OFFERS SECTION -->
<section class="clearfix offersSection patternbg">
  <div class="container">
    <div class="row">
      <?php

      $currency_symbol = get_woocommerce_currency_symbol();
      $products = get_offer_products('service');
      foreach ($products as $product) {
        // Get product image URL
        $image_id  = $product->get_image_id(); // Get main image ID
        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : wc_placeholder_img_src();

      ?>
        <div class="col-sm-3 col-xs-12">
          <div class="offerContent mt-4">
            <img class="lazyestload" src="<?php echo $image_url ?>" data-src="<?php echo $image_url ?>" alt="<?php echo esc_html($product->get_name()) ?>">
            <div class="offerMasking">
              <div class="offerTitle">
                <h4><a href="<?php echo esc_url($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()) ?></a></h4>
              </div>
            </div>
            <div class="offerPrice">
              <h5><?php echo $currency_symbol ?><?php echo esc_html($product->get_price()) ?></h5>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>