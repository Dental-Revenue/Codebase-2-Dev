<?php
/*
Template Name: Schedule Appointment Form
*/
?>

<?php get_header(); ?>
	
<!-- page head -->
<?php get_template_part( 'partials/page-head' ); ?> 

<!-- main -->
	<div role="main">	
		<div class="row">
			
		    <div class="main-content schedule-form">
		        <?php if (have_posts()) : while (have_posts()) : the_post();
		            the_content();
                endwhile; endif; ?>
        
                <form action="<?php echo get_form_processor(); ?>" method="post" name="form-schedule">
                    <label for="firstname">First name:</label> <input type="text" name="FirstName" id="firstname">
                    <label for="lastname">Last name:</label> <input type="text" name="LastName" id="lastname">
                    <label for="phone">Phone:</label> <input type="text" name="Phone" id="phone">
                    <label for="email">Email:</label> <input type="text" name="EmailName" id="email">
                    <input type="text" name="RepeatEmailName" placeholder="Retype Email" autocomplete="nope">
                    <label for="textarea">Comments:</label> <textarea name="Comments"></textarea>
            
                    <fieldset name="AdsNext-PreferredContactMethod">
                        <legend>I prefer to be contacted by: </legend>
                        <div>
                            <input id="by-phone" type="checkbox">
                            <label for="by-phone">Phone</label>
                        </div>
                        <div>
                            <input id="by-email" type="checkbox">
                            <label for="by-email">Email</label>
                        </div>
                    </fieldset>
                    
                    <div class="select-container"> <!-- Styles are needed on this element, and the label -->
                        <label for="patient">Are you a new Patient?</label>
                        <select name="AdsNext-AreYouNewPatient" id="patient" required>
                            <option selected value="Select One">Select One*</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
            
                    <div class="select-container"><!-- Styles are needed on this element, and the label -->
                        <label for="range">I would like to schedule a visit</label>
                        <select name="AdsNext-ScheduleRange" id="range">
                            <option selected value="Select One">Select One</option>
                            <option value="Less than 1 month">Less than 1 month</option>
                            <option value="1 - 3 months">in 1 - 3 months</option>
                            <option value="3 - 6 months">in 3 - 6 months</option>
                            <option value="6 - 12 months">in 6 - 12 months</option>
                            <option value="12 months or more">in 12 months+</option>
                        </select>
                    </div>
                    
                    <fieldset name="FS-AreYouNewPatient">
                        <legend>What time of day would you prefer?</legend>
                        <div>
                            <input name="AdsNext-AreYouNewPatientMorning" value="morning" id="morning" type="checkbox">
                            <label for="morning">Morning</label>
                        </div>
                        <div>
                            <input name="AdsNext-AreYouNewPatientMidDay" value="midday" id="midday" type="checkbox">
                            <label for="midday">Mid-day</label>
                        </div>
                        <div>
                            <input name="AdsNext-AreYouNewPatientAfternoon" value="afternoon" id="afternoon" type="checkbox">
                            <label for="aftenoon">Afternoon</label>
                        </div>
                    </fieldset>

                    <label>What day of the week would you like to schedule your consultation <em>(select all that apply)</em>?</label>
                    <label for="monday">Monday</label><input type="checkbox" value="Monday" name="AdsNext-PreferredDayMonday" id="monday"> 
                    <label for="tuesday">Tuesday</label><input type="checkbox" value="Tuesday" name="AdsNext-PreferredDayTuesday" id="tuesday">
                    <label for="wednesday">Wednesday</label><input type="checkbox" value="Wednesday" name="AdsNext-PreferredDayWednesday" id="wednesday">
                    <label for="thursday">Thursday</label><input type="checkbox" value="Thursday" name="AdsNext-PreferredDayThursday" id="thursday">
                    <label for="friday">Friday</label><input type="checkbox" value="Friday" name="AdsNext-PreferredDayFriday" id="friday">
                    
                    <br />
          
                    <?php  if(!empty(site_ops_recaptcha(false))){ ?>
                        <div class="captcha-container">
                            <div class="g-recaptcha" data-sitekey="<?php site_ops_recaptcha(); ?>"></div>
                        </div>
                    <?php }  ?>
                                        
                    <button type="submit" class="btn solid">Submit</button>
          
                    <input name="Subject" type="hidden" value="<?php bloginfo('name'); ?> Get a Free Quote Form" />
                    <input name="Campaign" type="hidden" value="Get a Free Quote Form" />
                    <input name="AccountID" type="hidden" value="<?php site_ops_dashboard_account_id(); ?>" />
                    <input name="RedirectPageFullURL" type="hidden" value="<?php site_ops_form_redirect_url(); ?>" />
                    <input name="EmailRecipient" type="hidden" value="<?php site_ops_form_to_email(); ?>" />

                    <?php  if(!empty(site_ops_dashboard_cc_email(false))){ ?>
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
    
<!-- Hide the honeypot -->
<style>
    input[name="RepeatEmailName"] { opacity: 0; position: absolute; top: 0; left: 0; height: 0; width: 0; z-index: -1; }
</style>

<?php get_footer(); ?>
