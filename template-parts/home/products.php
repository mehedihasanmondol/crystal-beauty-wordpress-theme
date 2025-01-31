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
                    <a href="cart.html"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="productInfo">
                    <h3><?php echo esc_html($product->get_name()) ?></h3>
                    <h4><?php echo $currency_symbol ?><?php echo esc_html($product->get_price()) ?></h4>

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




<section class="clearfix productSection d-none">
  <div class="container">
    <div class="secotionTitle">
      <h2><span>Natural </span>Our Products</h2>
    </div>

    <div class="row">
      <div class="col-12">
        <div id="productSlider" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#productSlider" data-slide-to="0" class="active"></li>
            <li data-target="#productSlider" data-slide-to="1"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-md-6">
                  <div class="productImage">
                    <img src="<?php echo get_template_directory_uri() ?>/img/home/home-product.jpg" data-src="<?php echo get_template_directory_uri() ?>/img/home/home-product.jpg" alt="Image Product" class="img-responsive lazyestload">
                    <a href="cart.html"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="productInfo">
                    <h3>Traditional Massage</h3>
                    <h4>$25.00 Per Head</h4>
                    <ul class="list-inline rating">
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla paria tur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese runt mollit anim id est laborum. </p>
                    <a href="javascript:void(0)" class="btn btn-primary first-btn">read more</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="row">
                <div class="col-md-6">
                  <div class="productImage">
                    <img src="<?php echo get_template_directory_uri() ?>/img/home/home-product.jpg" data-src="<?php echo get_template_directory_uri() ?>/img/home/home-product.jpg" alt="Image Product" class="img-responsive lazyestload">
                    <a href="cart.html"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="productInfo">
                    <h3>Body Massage</h3>
                    <h4>$55.00 Per Head</h4>
                    <ul class="list-inline rating">
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                    </ul>
                    <p>Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla paria tur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese runt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    <a href="javascript:void(0)" class="btn btn-primary first-btn">read more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#productSlider" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#productSlider" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>