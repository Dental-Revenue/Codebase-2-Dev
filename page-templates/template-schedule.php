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

                        <!--  research radio box option for the checkbox, will not work (checkbox group - required fields) -->
                    <fieldset name="AdsNext-AreYouNewPatient">
                        <legend>Are you a new patient? </legend>
                        <div>
                            <input id="yes" type="checkbox">
                            <label for="yes">Yes</label>
                        </div>
                        <div>
                            <input id="no" type="checkbox">
                            <label for="no">No</label>
                        </div>
                    </fieldset>
                <!-- =============================================================================================== -->
            
                    <fieldset name="AdsNext-ScheduleRange">
                        <legend>I would like to schedule a visit: </legend>
                        <div>
                            <input id="lessthanone" type="checkbox">
                            <label for="lessthanone">Less than 1 month</label>
                        </div>
                        <div>
                            <input id="onetothree" type="checkbox">
                            <label for="onetothree">1 - 3 months</label>
                        </div>
                        <div>
                            <input id="threetosix" type="checkbox">
                            <label for="threetosix">3 - 6 months</label>
                        </div>
                        <div>
                            <input id="sixtotwelve" type="checkbox">
                            <label for="threetosix">6 - 12 months</label>
                        </div>
                        <div>
                            <input id="twelveormore" type="checkbox">
                            <label for="twelveormore">12 months +</label>
                        </div>
                    </fieldset>
            
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
