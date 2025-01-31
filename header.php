<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
  <?php wp_head(); ?>
  <style>
    /* Paste this css to your style sheet file or under head tag */
    /* This only works with JavaScript,
    if it's not present, don't show loader */
    .no-js #loader {
      display: none;
    }

    .js #loader {
      display: block;
      position: absolute;
      left: 100px;
      top: 0;
    }

    .se-pre-con {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url(<?php echo get_template_directory_uri() ?>/plugins/simple-pre-loader/images/loader-64x/Preloader_2.gif) center no-repeat #fff;
    }
  </style>

</head>

<body id="body" class="body-wrapper static">
  <!-- <div class="se-pre-con"></div> -->
  <div class="main-wrapper">
    <!-- HEADER -->
    <header id="pageTop" class="header">

      <!-- TOP INFO BAR -->


      <div class="top-info-bar">

        <div class="container">

          <div class="top-bar-right">
            <ul class="list-inline">
              <li>
                <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@yourdomain.com')); ?>">
                  <i class="fa fa-envelope" aria-hidden="true"></i> <?php echo esc_html(get_theme_mod('contact_email', 'info@yourdomain.com')); ?>
                </a>
              </li>

              <li>
                <span>
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <?php echo esc_html(get_theme_mod('contact_phone', '+1 234 567 8900')); ?>
                </span>
              </li>
              <li>
                <?php
                $social_icons = array(
                  'facebook'   => 'fa-facebook',
                  'instagram'   => 'fa-instagram',
                );

                foreach ($social_icons as $key => $icon) {
                  $social_url = get_theme_mod("social_$key", '');
                  if (!empty($social_url)) {
                    echo '<li><a href="' . esc_url($social_url) . '" target="_blank"><i class="fa ' . esc_attr($icon) . '" aria-hidden="true"></i></a></li>';
                  }
                }
                ?>

              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-md main-nav navbar-light">
        <div class="container">

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <?php if (get_theme_mod('site_logo')) : ?>
              <img src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>">
            <?php else : ?>
              <h1><?php bloginfo('name'); ?></h1>
            <?php endif; ?>
          </a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            wp_nav_menu(array(
              'theme_location'  => 'primary',
              'menu_class'      => 'navbar-nav ml-auto',
              'container'       => false,
              'depth'           => 3, // Supports dropdowns up to 3 levels
              'walker'          => new Custom_Nav_Walker(), // Enables Bootstrap-compatible dropdowns
            ));
            ?>
          </div>

          <div class="cart_btn">
            <a href="<?php echo wc_get_cart_url(); ?>">
              <i class="fa fa-shopping-basket" aria-hidden="true"></i>
              <span class="badge"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
            </a>
          </div>
          <!-- header search ends-->
        </div>
      </nav>

    </header>