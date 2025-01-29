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
  <div class="se-pre-con"></div>
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

          <a class="navbar-brand" href="index.html"><img class="lazyestload" data-src="<?php echo get_template_directory_uri() ?>/img/logo.png" src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="logo"></a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">Services</a>
                <ul class="dropdown-menu">
                  <li><a href="service.html">Services</a></li>
                  <li><a href="single-service.html">Service Details</a></li>
                </ul>
              </li>

              <li class=" dropdown megaDropMenu nav-item ">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">Store</a>

                <ul class="row dropdown-menu justify-content-md-between">
                  <li class="">
                    <ul class="list-unstyled">
                      <li><a href="product-right-sidebar.html">Product Right Sidebar</a></li>
                      <li><a href="product-left-sidebar.html">Product Left Sidebar</a></li>
                      <li><a href="product-3col.html">Product 3 Col</a></li>
                      <li><a href="product-4col.html">Product 4 Col</a></li>
                      <li><a href="single-product.html">Single product</a></li>
                    </ul>
                  </li>

                  <li class="">
                    <ul class="list-unstyled">
                      <li><a href="user-dashboard.html">User Dashboard</a></li>
                      <li><a href="user-profile.html">User Profile</a></li>
                      <li><a href="address.html">Address</a></li>
                      <li><a href="all-order.html">All Order</a></li>
                      <li><a href="wishlist.html">Wishlist</a></li>
                    </ul>
                  </li>

                  <li class="">
                    <ul class="list-unstyled">
                      <li><a href="cart.html">Cart</a></li>
                      <li><a href="checkout.html">Checkout</a></li>
                      <li><a href="success.html">Confirmation</a></li>
                      <li><a href="pricing.html">Price table</a></li>
                    </ul>
                  </li>

                  <li class="">
                    <ul class="list-unstyled">
                      <li><a href="javascript:void(0)" class="px-md-0"><img class="img-responsive lazyestload" data-src="<?php echo get_template_directory_uri() ?>/img/home/pricing-1.jpg" src="<?php echo get_template_directory_uri() ?>/img/home/pricing-1.jpg" alt="logo"></a></li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">Pages</a>

                <ul class="dropdown-menu">
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                  <li><a href="appointment.html">Appointment</a></li>

                  <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Team</a>

                    <ul class="dropdown-menu submenu">
                      <li><a href="member.html">Our Team</a></li>
                      <li><a href="single-member-profile.html">Single Member</a></li>
                    </ul>
                  </li>

                  <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallery</a>

                    <ul class="dropdown-menu submenu">
                      <li><a href="gallery-v1.html">Gallery 3 Col</a></li>
                      <li><a href="gallery-v2.html">Gallery 4 Col</a></li>
                    </ul>
                  </li>

                  <li><a href="login-signup.html">Login SignUp</a></li>

                  <li><a href="404.html">404 Not Found</a></li>

                  <li><a href="coming-soon.html">Coming Soon</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">Blog</a>

                <ul class="dropdown-menu menu-xl-right">
                  <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                    <ul class="dropdown-menu submenu">
                      <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                      <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                      <li><a href="blog-fullwidth.html">Fullwidth</a></li>
                    </ul>
                  </li>

                  <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Single Blog</a>
                    <ul class="dropdown-menu submenu">
                      <li><a href="blog-single-right-sidebar.html">Right Sidebar</a></li>
                      <li><a href="blog-single-left-sidebar.html">Left Sidebar</a></li>
                      <li><a href="blog-single-fullwidth.html">Fullwidth</a></li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">Components</a>
                <ul class="dropdown-menu menu-right">
                  <li><a href="tabs-pagination.html">Tab &amp; Pagination</a></li>
                  <li><a href="accrodion.html">Accrodions</a></li>
                  <li><a href="buttons-alerts.html">Buttons &amp; Alerts</a></li>
                </ul>
              </li>
            </ul>
          </div>

          <div class="cart_btn">
            <a href="cart.html"><i class="fa fa-shopping-basket" aria-hidden="true"></i><span class="badge">0</span></a>
          </div>
          <!-- header search ends-->
        </div>
      </nav>

    </header>