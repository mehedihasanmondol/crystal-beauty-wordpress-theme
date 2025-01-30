<section class="clearfix contactSection padding">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-7 col-xl-8">
        <div class="contactTitle">
          <h3>
            <?php echo esc_html(get_theme_mod('contact_section_heading', 'Get in touch')); ?>
          </h3>
        </div>

        <div class="contactForm">
          <div id="alert"></div><!--Response Holder-->
          <form action="#" id="angelContactForm" method="post">
            <div class="form-group">
              <input type="text" name="contact-form-name" class="form-control" placeholder="Your Name" required value="mehedi">
            </div>
            <div class="form-group">
              <input type="email" name="contact-form-email" class="form-control" placeholder="Your Email" required value="mahadirahman5@gmail.com">
            </div>
            <div class="form-group">
              <input type="text" name="contact-form-mobile" class="form-control" placeholder="Your Mobile" required value="0157878787">
            </div>
            <div class="form-group">
              <textarea class="form-control" name="contact-form-message" placeholder="Your Message" required>message from wordpress</textarea>
            </div>
            <div class="form-group">
              <button type="submit" id="contact-submit-btn" class="btn btn-primary first-btn">send Message</button>

            </div>
          </form>
        </div>
      </div>

      <div class="col-md-6 col-lg-5 col-xl-4">
        <div class="holdingInfo patternbg">
          <ul>
            <li><i class="fa fa-map-marker" aria-hidden="true"></i>
              <?php echo esc_html(get_theme_mod('contact_address', '123 Main Street, City, Country')); ?>

            </li>
            <li><i class="fa fa-phone" aria-hidden="true"></i>
              <a href="tel:<?php echo esc_html(get_theme_mod('contact_phone', '+1 234 567 8900')); ?>"><?php echo esc_html(get_theme_mod('contact_phone', '+1 234 567 8900')); ?></a>

            </li>
            <li>
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <a href="mailto:<?php echo esc_html(get_theme_mod('contact_email', 'info@example.com')); ?>"><?php echo esc_html(get_theme_mod('contact_email', 'info@example.com')); ?></a>

            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>