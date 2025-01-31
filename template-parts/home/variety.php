<?php
// Exit if WooCommerce is not active
if (!class_exists('WooCommerce')) {
  return;
}

$atts = get_query_var('service_atts', array());

?>

<section class="clearfix varietySection">
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
                                <a href="javascript:void(0)" class="btn btn-primary first-btn" data-toggle="modal" data-target="#appoinmentModal_<?php echo esc_html($product->get_id()) ?>">make An Appoinment</a>
                              <?php } else { ?>
                                <!-- Product Details Button -->
                                <a href="<?php echo esc_url($product->get_permalink()); ?>" class="btn btn-primary first-btn">Book now</a>

                              <?php } ?>


                              <!-- APPOINMENT MODAL -->
                              <div id="appoinmentModal_<?php echo esc_html($product->get_id()) ?>" class="modal fade modalCommon" role="dialog" tabindex="-1">
                                <div class="modal-dialog">
                                  <!-- MODAL CONTENT-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title appointment-modal-title">Appointment For <?php echo esc_html($product->get_name()) ?></h4>
                                    </div>
                                    <div class="modal-body">
                                      <div id="appointment-alert" class="my-alert"></div>
                                      <form action="#" method="post" class="appoinmentModalFormQuick">
                                        <input type="hidden" name="appointment-form-services[]" value="<?php echo esc_html($product->get_name()) ?>">
                                        <!--Response Holder-->
                                        <div class="form-group categoryTitle">
                                          <h5>Service Date and Time</h5>
                                        </div>
                                        <div class="dateSelect form-half form-left">
                                          <div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                                            <input type="text" name="appointment-form-date" class="form-control" placeholder="MM/DD/YYYY">
                                            <div class="input-group-addon">
                                              <span class="fa fa-calendar"></span>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="timeSelect appointment-timeSelect form-half clearfix">
                                          <select id="guiest_id1" name="appointment-form-time" class="select-drop">
                                            <?php
                                            foreach (generate_time_slots() as $time) {
                                            ?>
                                              <option value="<?php echo $time ?>"><?php echo $time ?></option>
                                            <?php } ?>
                                          </select>
                                        </div>

                                        <div class="form-group categoryTitle">
                                          <h5>Personal info</h5>
                                        </div>
                                        <div id="appointment-alert"></div>

                                        <div class="form-group form-half form-left">
                                          <input type="text" name="appointment-form-name" class="form-control" placeholder="Your Name"
                                            required>
                                        </div>
                                        <div class="form-group form-half form-right">
                                          <input type="email" name="appointment-form-email" class="form-control" placeholder="Your email"
                                            required>
                                        </div>
                                        <div class="form-group form-half form-left">
                                          <input type="text" name="appointment-form-mobile" class="form-control" placeholder="Mobile number"
                                            required>
                                        </div>
                                        <div class="form-group form-half form-right">
                                          <input type="text" name="appointment-form-address" class="form-control" placeholder="Your address"
                                            required>
                                        </div>
                                        <div class="form-group">
                                          <textarea class="form-control" name="appointment-form-message" placeholder="Your Message"
                                            required></textarea>
                                        </div>
                                        <div class="form-group">
                                          <button type="submit" id="appointment-submit-btn" class="btn btn-primary first-btn">Get Appintment</button>
                                        </div>
                                      </form>
                                    </div>
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
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>