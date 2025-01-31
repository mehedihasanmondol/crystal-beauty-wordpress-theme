<!-- FOOTER -->
<footer style="background-image: url(<?php echo get_template_directory_uri() ?>/img/home/footer-bg.jpg);">
  <!-- BACK TO TOP BUTTON -->
  <a href="#pageTop" class="backToTop"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
  <!-- FOOTER INFO -->
  <div class="clearfix footerInfo">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-xs-12">
          <div class="footerText">
            <a style="width: 230px;" href="<?php echo home_url(); ?>">
              <?php if (get_theme_mod('site_logo')) : ?>
                <img style="max-width: 100%;margin-bottom:20px" src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>">
              <?php else : ?>
                <h1><?php bloginfo('name'); ?></h1>
              <?php endif; ?>
            </a>
            <p>
              <?php echo esc_html(get_theme_mod('footer_text_1', 'Default Footer Text 1')); ?>
            </p>
            <p>
              <?php echo esc_html(get_theme_mod('footer_text_2', 'Default Footer Text 1')); ?>
            </p>
          </div>
        </div>
        <div class="col-sm-3 col-xs-12 paddingLeft">
          <div class="footerInfoTitle">
            <h4><?php echo esc_html(get_theme_mod('useful_links_heading', 'Useful Links')); ?></h4>
          </div>
          <div class="useLink">
            <ul class="list-unstyled">
              <?php
              wp_nav_menu(array(
                'theme_location' => 'footer_menu',
                'container'      => false,
                'items_wrap'     => '%3$s', // Removes the default <ul> wrapper
                'fallback_cb'    => false, // Hides menu if empty
                'before'         => ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> &nbsp; &nbsp;'
              ));
              ?>
            </ul>


          </div>
        </div>


        <div class="col-sm-3 col-xs-12">
          <div class="footerInfoTitle">
            <h4><?php echo esc_html(get_theme_mod('newsletter_heading', 'Subscribe to our Newsletter')); ?></h4>
          </div>

          <div class="footerText">
            <p><?php echo esc_html(get_theme_mod('newsletter_text', 'Get the latest updates and offers.')); ?></p>
            <form class="input-group">
              <input type="text" class="form-control" required="" placeholder="Email address" aria-describedby="basic-addon21">
              <button type="submit" class="input-group-addon" id="basic-addon21">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- COPY RIGHT -->
  <div class="clearfix copyRight">
    <div class="container">
      <div class="row">
        <div class="col-md-5 order-md-1">
          <ul class="list-inline socialLink">
            <?php
            $social_icons = array(
              'twitter'    => 'fa-twitter',
              'linkedin'   => 'fa-linkedin',
              'facebook'   => 'fa-facebook',
              'skype'      => 'fa-skype',
              'pinterest'  => 'fa-pinterest-p',
            );

            foreach ($social_icons as $key => $icon) {
              $social_url = get_theme_mod("social_$key", '');
              if (!empty($social_url)) {
                echo '<li><a href="' . esc_url($social_url) . '" target="_blank"><i class="fa ' . esc_attr($icon) . '" aria-hidden="true"></i></a></li>';
              }
            }
            ?>
          </ul>

        </div>

        <div class="col-md-7">
          <div class="copyRightText">
            <p>
              &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</a>.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
</div>


<!-- FANCY SEARCH -->
<div id="morphing-content" class="morphing-content">
  <!-- FORM -->
  <section class="morphing-searchBox" id="quote">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center">Search our product</h2>
          <div class="row">
            <div class="col-lg-6">
              <form class="fancymorphingForm" action="mail/appointment-form.php" method="post" id="fancymorphingForm">
                <div class="input-group">
                  <input type="text" class="form-control" required="" id="expire" placeholder="Search...">
                  <div class="input-group-append">
                    <button class="input-group-text btn" type="submit"><i class="fa fa-search text-white"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php wp_footer(); ?>

<script>
  //paste this code under head tag or in a seperate js file.
  // Wait for window load
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
  });
</script>

</body>

</html>