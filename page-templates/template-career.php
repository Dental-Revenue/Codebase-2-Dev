<?php
/*
Template Name: Career Form
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
            <form action="<?php echo get_form_processor(); ?>" method="post" name="form-schedule" enctype="multipart/form-data">
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
              <label for="statement">Personal Statement</label>
              <textarea id="statement" cols="10" name="AdsNext-Statement" rows="5"></textarea>
              <label for="fileUploadAttachment">Upload Resume* (Preferred file type: PDF)</label>
              <input id="fileUploadAttachment" class="btn btn-secondary" style="margin-bottom:1rem" multiple="multiple" name="fileUploadAttachment" required="" type="file">
              
              <?php  if (!empty(site_ops_recaptcha(false))) { ?>
                <div class="captcha-container">
                  <div class="g-recaptcha" data-sitekey="<?php site_ops_recaptcha(); ?>"></div>
                </div>
              <?php }  ?>
                                            
              <button type="submit" class="btn solid">Submit</button>
              
              <input name="Subject" type="hidden" value="<?php bloginfo('name'); ?> Career Form" />
                            
              <input name="Campaign" type="hidden" value="Career Form" />
              
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
