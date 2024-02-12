<?php
/*
    Template Name: Leave A Review
*/
get_header();
get_template_part('partials/page-head');
?>
<!-- main -->
<div role="main">
    <div class="row">
        <div class="columns twelve">
            <div class="main-content">
                <div class="review-content">
                    <h3>Thanks for choosing <?php site_ops_practice_name(); ?>!</h3>
                    <p>Leaving a Google Review for us is easy! Use the link below to get started and follow the instructions. If you're on your phone, scroll down for the Google Map App instructions.</p>
                    <a href="<?php site_ops_google_review_url(); ?>" target="_blank" rel="noopener" class="review-link">LEAVE A REVIEW</a>
                    <ol>
                        <li>Click on the link provided above. This will take you to your Google Maps and show our <?php site_ops_practice_name(); ?> location.</li>
                        <li>Scroll down until you see the Rate and Review section. If you're on a desktop computer, click the "write a review" link, if you're on a mobile device select how many stars you would like to give <?php site_ops_practice_name(); ?> and then write your review. Once you're done writing your review, click post to add your review.</li>
                    </ol>
                    <img src="//cdn.dentalrevenue.com/assets/images/leave-review/google-review.jpg" alt="Leaving a Google Review" />
                    <h3>On Your Phone & Don't Have the Google Maps App? No Problem!</h3>
                    <p>Download the Google Maps App and follow the instructions below:</p>
                    <a href="https://itunes.apple.com/us/app/google-maps/id585027354?mt=8" target="_blank" rel="noopener" class="review-link review-platform">Click here for iPhone</a>
                    | 
                    <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.maps&hl=en" target="_blank" rel="noopener" class="review-link review-platform">Click here for Android</a>
                    <ol>
                        <li>Once the Google Maps App has downloaded. Open it on your phone and use the search bar to type in "<?php site_ops_practice_name(); ?>". The app will show you our location.</li>
                        <li>Scroll down to the Rate and Review section. Select how many stars you would like to give <?php site_ops_practice_name(); ?> and then write your review. Once you’re done writing your review, click post to add your review.</li>
                    </ol>
                    <img src="//cdn.dentalrevenue.com/assets/images/leave-review/google-review.jpg" alt="Leaving a Google Review"><p>If you're not signed in to your Google Account or do not currently have a Google Account, the Google Maps App will guide you through a few quick steps to login or create an account.</p>
                    <p>Thanks again for showing your continued support for <?php site_ops_practice_name(); ?>!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>