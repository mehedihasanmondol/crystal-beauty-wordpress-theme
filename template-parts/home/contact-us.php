
<section class="clearfix contactSection padding">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-7 col-xl-8">
            <div class="contactTitle">
              <h3>Get in touch</h3>
            </div>

            <div class="contactForm">
              <div id="alert"></div><!--Response Holder-->
              <form action="mail/contact-form.php" id="angelContactForm" method="post">
              <div class="form-group">
                  <input type="text" name="contact-form-name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                  <input type="email" name="contact-form-email" class="form-control" placeholder="Your Email" required>
                </div>
               <div class="form-group">
                  <input type="text" name="contact-form-mobile" class="form-control" placeholder="Your Mobile" required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="contact-form-message" placeholder="Your Message" required></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" id="contact-submit-btn" class="btn btn-primary first-btn">send Message</button>

                </div>
              </form>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 col-xl-4">
            <div class="holdingInfo patternbg">
              <p>Lorem ipsum dolor sit amet, consectetur adipiselit, sed do eiusmod.</p>
              <ul>
                <li><i class="fa fa-map-marker" aria-hidden="true"></i> 16/14 Babor Road, Mohammad pur Dhaka, Bangladeshincididunt </li>
                <li><i class="fa fa-phone" aria-hidden="true"></i> +55 654 545 122 <br>+55 654 545 123</li>
                <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a> <br><a href="mailto:info2@example.com">info2@example.com</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>