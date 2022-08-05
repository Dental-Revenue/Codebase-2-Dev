<?php
/*
Template Name: Schedule Appointment Form
*/
get_header();  
// page head
get_template_part('partials/page-head');
?>
<!-- main -->
<div role="main">
    <div class="row">      
        <div class="main-content schedule-form">
            <?php
            if (have_posts()) : while (have_posts()) : the_post();
                    the_content();
            endwhile;
            endif;
            ?>            
            <form action="<?php echo get_form_processor(); ?>" method="post" name="form-schedule">
              <input type="text" name="FirstName" placeholder="First Name" />
              <input type="text" name="LastName" placeholder="Last Name" />
              <input type="text" name="Phone" placeholder="Phone" />
              <input type="text" name="EmailName" placeholder="Email" />
              <input type="text" name="RepeatEmailName" placeholder="Retype Email">
              <textarea name="Comments" placeholder="Comments"></textarea>
              
              <p>I prefer to be contacted by:</p>
              <select name="AdsNext-PreferredContactMethod">
                <option selected value="Select One">Select One</option>
                <option value="Phone">Phone</option>
                <option value="Email">Email</option>
              </select>
              
              <p>Are you a new patient?</p>
              <select name="AdsNext-AreYouNewPatient">
                <option selected value="Select One">Select One*</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
              
              <p>I would like to schedule a visit:</p>
              <select name="AdsNext-ScheduleRange">
                <option selected value="Select One">Select One</option>
                <option value="Less than 1 month">Less than 1 month</option>
                <option value="1 - 3 months">in 1 - 3 months</option>
                <option value="3 - 6 months">in 3 - 6 months</option>
                <option value="6 - 12 months">in 6 - 12 months</option>
                <option value="12 months or more">in 12 months+</option>
              </select>
              
              <p>What time of day would you prefer?</p>
              <select name="AdsNext-PreferredTimeOfDay">
                <option selected value="Select One">Select One</option>
                <option value="Morning">Morning</option>
                <option value="Mid-day">Mid-day</option>
                <option value="Afternoon">Afternoon</option>
              </select>
              
              <p>What day of the week would you like to schedule your consultation <em>(select all that apply)</em>?</p>
              <label><input type="checkbox" value="Monday" name="AdsNext-PreferredDayMonday" /> Monday</label>
              <label><input type="checkbox" value="Tuesday" name="AdsNext-PreferredDayTuesday" /> Tuesday</label>
              <label><input type="checkbox" value="Wednesday" name="AdsNext-PreferredDayWednesday" /> Wednesday</label>
              <label><input type="checkbox" value="Thursday" name="AdsNext-PreferredDayThursday" /> Thursday</label>
              <label><input type="checkbox" value="Friday" name="AdsNext-PreferredDayFriday" /> Friday</label>
              
              <br />
              
              <?php  if (!empty(site_ops_recaptcha(false))) { ?>
                <!-- recaptcha v3 stuff
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                <input type="hidden" name="action" value="validate_captcha"> -->
                <div class="captcha-container">
                  <div class="g-recaptcha" data-sitekey="<?php site_ops_recaptcha(); ?>"></div>
                </div>
              <?php }  ?>
                                            
              <button type="submit" class="btn solid">Submit</button>
              
              <input name="Subject" type="hidden" value="<?php bloginfo('name'); ?> Schedule Appointment Form" />
                            
              <input name="Campaign" type="hidden" value="Schedule Appointment Form" />
              
              <input name="AccountID" type="hidden" value="<?php site_ops_dashboard_account_id(); ?>" />
              <input name="RedirectPageFullURL" type="hidden" value="<?php site_ops_form_redirect_url(); ?>" />
              <input name="EmailRecipient" type="hidden" value="<?php site_ops_form_to_email(); ?>" />
              <?php  if (!empty(site_ops_dashboard_cc_email(false))) { ?>
                <input name="EmailCC" type="hidden" value="<?php echo site_ops_dashboard_cc_email(); ?>" />
              <?php }  ?>
              
              <input type="hidden" name="gaSource" />
              <input type="hidden" name="gaMedium" />
              <input type="hidden" name="gaCampaign" />
              <input type="hidden" name="gaKeyword" />
              <input type="hidden" name="pagename" />       
            </form>
        </div>
    </div>
</div>

<?php get_footer(); ?>
