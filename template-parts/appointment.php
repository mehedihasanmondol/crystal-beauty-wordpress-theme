<section class="clearfix contactSection padding">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-7 col-xl-8">


        <div class="contactForm">

          <form action="#" id="appoinmentForm" method="post">


            <ul class="list-unstyled custom-list">
              <li class="checkbox form-check custom-checkbox">
                <input class="form-check-input" type="checkbox" name="appointment-form-services[]" value="Braids & Twist" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">Braids & Twist</label>
              </li>
              <li class="checkbox form-check custom-checkbox">
                <input class="form-check-input" type="checkbox" name="appointment-form-services[]" value="Hair color" id="defaultCheck2">
                <label class="form-check-label" for="defaultCheck2">Hair color</label>
              </li>
              <li class="checkbox form-check custom-checkbox">
                <input class="form-check-input" type="checkbox" name="appointment-form-services[]" value="Hair extension" id="defaultCheck3">
                <label class="form-check-label" for="defaultCheck3">Hair extension</label>
              </li>
              <li class="checkbox form-check custom-checkbox">
                <input class="form-check-input" type="checkbox" name="appointment-form-services[]" value="Corrective color" id="defaultCheck4">
                <label class="form-check-label" for="defaultCheck4">Corrective color</label>
              </li>
              <li class="checkbox form-check custom-checkbox">
                <input class="form-check-input" type="checkbox" name="appointment-form-services[]" value="Hair cut" id="defaultCheck5">
                <label class="form-check-label" for="defaultCheck5">Hair cut</label>
              </li>
              <li class="checkbox form-check custom-checkbox">
                <input class="form-check-input" type="checkbox" name="appointment-form-services[]" value="Partial foil" id="defaultCheck6">
                <label class="form-check-label" for="defaultCheck6">Partial foil</label>
              </li>
              <li class="checkbox form-check custom-checkbox">
                <input class="form-check-input" type="checkbox" name="appointment-form-services[]" value="Extension per track" id="defaultCheck7">
                <label class="form-check-label" for="defaultCheck7">Extension per track</label>
              </li>
            </ul>

            <div class="contactTitle">
              <h3>Appointment Date:</h3>
            </div>

            <div class="dateSelect custom-dateSelect">
              <div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                <input type="text" name="appointment-form-date" class="form-control" placeholder="DD/MM/YYYY">
                <div class="input-group-addon">
                  <span class="fa fa-calendar"></span>
                </div>
              </div>
            </div>

            <div class="contactTitle">
              <h3>Appointment Time:</h3>
            </div>

            <div class="custom-timeSelect clearfix">
              <div class="countrySelect timeSelect">
                <select name="appointment-form-time" id="time" class="select-drop">
                  <?php
                  foreach (generate_time_slots() as $time) {
                  ?>
                    <option value="<?php echo $time ?>"><?php echo $time ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>



            <div class="contactTitle">
              <h3>Personal info:</h3>
            </div>

            <div class="contactForm">
              <div id="appointment-alert"></div>

              <div class="form-group">
                <input type="text" name="appointment-form-name" class="form-control" placeholder="Your Name" required>
              </div>
              <div class="form-group">
                <input type="email" name="appointment-form-email" class="form-control" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                <input type="text" name="appointment-form-mobile" class="form-control" placeholder="Your Mobile" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="appointment-form-message" placeholder="Your Message" required></textarea>
              </div>


              <div class="form-group">
                <button type="submit" id="appointment-submit-btn" class="btn btn-primary first-btn">Get appointment</button>

              </div>

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