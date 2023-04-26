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
            <form action="<?php echo get_form_processor(); ?>" method="post" name="form-schedule" autocomplete="nope">
              <div class="user-info">
                <div class="name">
                  <label for="firstname">First name:</label>
                  <input type="text" name="FirstName" id="firstname" class="s-input">
                  <label for="lastname">Last name:</label>
                  <input type="text" name="LastName" id="lastname" class="s-input">
                </div>
                <div class="contact-info">
                  <label for="phone">Phone:</label> <input type="text" name="Phone" id="phone" class="s-input">
                  <label for="email">Email:</label> <input type="text" name="EmailName" id="email" class="s-input">
                  <input type="text" name="RepeatEmailName" placeholder="Retype Email" autocomplete="nope">
                </div>
              </div>
              <div class="user-info">
                <div class="info-select">
                  <label for="contact-method">I prefer to be contacted by:</label> 
                  <select name="AdsNext-PreferredContactMethod" id="contact-method" class="s-input" >
                    <option selected value="Select One">Select One</option>
                    <option value="Phone">Phone</option>
                    <option value="Email">Email</option>
                  </select>
                  <label for="patient">Are you a new Patient?</label>
                  <select name="AdsNext-AreYouNewPatient" id="patient" class="s-input">
                    <option selected value="Select One">Select One*</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                </div>

                <div class="info-select">
                  <label for="range">I would like to schedule a visit</label> 
                  <select name="AdsNext-ScheduleRange" id="range" class="s-input">
                    <option selected value="Select One">Select One</option>
                    <option value="Less than 1 month">Less than 1 month</option>
                    <option value="1 - 3 months">in 1 - 3 months</option>
                    <option value="3 - 6 months">in 3 - 6 months</option>
                    <option value="6 - 12 months">in 6 - 12 months</option>
                    <option value="12 months or more">in 12 months+</option>
                  </select>
                  <label for="day-time">What time of day would you prefer?</label> 
                  <select name="AdsNext-PreferredTimeOfDay"  id="day-time" class="s-input">
                    <option selected value="Select One">Select One</option>
                    <option value="Morning">Morning</option>
                    <option value="Mid-day">Mid-day</option>
                    <option value="Afternoon">Afternoon</option>
                  </select>
                </div>
              </div>

              <div class="bottom-info">
                <fieldset>
                  <legend>What day of the week would you like to schedule your consultation (select all that apply)</legend>
                  <label for="monday">Monday</label><input type="checkbox" value="Monday" name="AdsNext-PreferredDayMonday" id="monday"> 
                  <label for="tuesday">Tuesday</label><input type="checkbox" value="Tuesday" name="AdsNext-PreferredDayTuesday" id="tuesday">
                  <label for="wednesday">Wednesday</label><input type="checkbox" value="Wednesday" name="AdsNext-PreferredDayWednesday" id="wednesday">
                  <label for="thursday">Thursday</label><input type="checkbox" value="Thursday" name="AdsNext-PreferredDayThursday" id="thursday">
                  <label for="friday">Friday</label><input type="checkbox" value="Friday" name="AdsNext-PreferredDayFriday" id="friday">
                </fieldset>
                <div>
                  <label for="comments">Comments</label><br>
                  <textarea name="Comments" id="comments" class="s-input" rows="2"></textarea>
                </div>
              </div>
              
              <br />
              
              <?php  if (!empty(site_ops_recaptcha(false))) { ?>
                <div class="captcha-container">
                  <div class="g-recaptcha" data-sitekey="<?php site_ops_recaptcha(); ?>"></div>
                </div>
              <?php }  ?>
                                          
                                                
              <button type="submit" class="btn solid">Submit</button>

              <!-- Dashboard Account Info -->
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
              <!-- END Dashboard Account Info -->
            </form>
        </div>
    </div>
</div>

<?php get_footer(); ?>
