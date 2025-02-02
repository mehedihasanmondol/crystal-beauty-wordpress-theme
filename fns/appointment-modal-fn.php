<?php
function get_appointment_modal_id($id)
{
    return 'appoinmentModal_' . esc_html($id);
}
?>

<?php
function generate_appointment_modal($id, $service_name)
{


?>
    <div id="<?php echo get_appointment_modal_id($id) ?>" class="modal fade modalCommon" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <!-- MODAL CONTENT-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title appointment-modal-title">Appointment For <?php echo esc_html($service_name) ?></h4>
                </div>
                <div class="modal-body">
                    <div id="appointment-alert" class="my-alert"></div>
                    <form action="#" method="post" class="appoinmentModalFormQuick">
                        <input type="hidden" name="appointment-form-services[]" value="<?php echo esc_html($service_name) ?>">
                        <!--Response Holder-->
                        <div class="form-group categoryTitle">
                            <h5>Service Date and Time</h5>
                        </div>
                        <div class="dateSelect form-half form-left">
                            <div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                                <input type="text" name="appointment-form-date" class="form-control" placeholder="DD/MM/YYYY">
                                <div class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </div>
                            </div>
                        </div>

                        <div class="timeSelect appointment-timeSelect form-half clearfix">
                            <select id="guiest_id1" name="appointment-form-time" class="selectize form-control" placeholder="Choose time">
                                <option value="">Choose time</option>
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

<?php } ?>