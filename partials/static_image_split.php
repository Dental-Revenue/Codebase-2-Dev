<?php
$instance = $template_args['instance']; 
$appearance_info = get_option('appearance_info');
$leftForm = get_post_meta(get_the_id(), $instance.'_left_form', true);
$rightForm = get_post_meta(get_the_id(), $instance.'_right_form', true);
$leftImage = get_post_meta(get_the_id(), $instance.'_left_image', true);
$rightImage = get_post_meta(get_the_id(), $instance.'_right_image', true);
$leftImageAlt = get_post_meta(get_the_id(), $instance.'_left_image_alt', true);
$rightImageAlt = get_post_meta(get_the_id(), $instance.'_right_side_image_alt', true);
$leftWebmVideo = get_post_meta(get_the_id(), $instance.'_left_video_webm', true);
$leftMp4Video = get_post_meta(get_the_id(), $instance.'_left_video_mp4', true);
$rightWebmVideo = get_post_meta(get_the_id(), $instance.'_right_video_webm', true);
$rightMp4Video = get_post_meta(get_the_id(), $instance.'_right_video_mp4', true);
$leftRGBA = get_post_meta(get_the_id(), $instance.'_left_rgba', true);
$rightRGBA = get_post_meta(get_the_id(), $instance.'_right_rgba', true);
$leftTextPadding = get_post_meta(get_the_id(),$instance.'_left_text_padding',true);
$rightTextPadding = get_post_meta(get_the_id(),$instance.'_right_text_padding',true);
$leftTitle = get_post_meta(get_the_id(), $instance.'_left_title', true);
$rightTitle = get_post_meta(get_the_id(), $instance.'_right_title', true);
$leftTitleAlign = get_post_meta(get_the_id(), $instance . '_left_title_align', true);
$rightTitleAlign = get_post_meta(get_the_id(), $instance . '_right_title_align', true);
$leftSubtitle = get_post_meta(get_the_ID(), $instance.'_left_subtitle', true);
$rightSubtitle = get_post_meta(get_the_ID(), $instance.'_right_subtitle', true);
$leftSubtitleAlign = get_post_meta(get_the_id(), $instance . '_left_subtitle_align', true);
$rightSubtitleAlign = get_post_meta(get_the_id(), $instance . '_right_subtitle_align', true);
$leftDisplayPhone = get_post_meta(get_the_id(), $instance.'_left_display_phone', true);
$leftDisplayAddress = get_post_meta(get_the_id(), $instance.'_left_display_address', true);
$rightDisplayPhone = get_post_meta(get_the_id(), $instance.'_right_display_phone', true);
$rightDisplayAddress = get_post_meta(get_the_id(), $instance.'_right_display_address', true);
$leftBtnText = get_post_meta(get_the_id(), $instance.'_left_btn_text', true);
$leftBtnUrl = get_post_meta(get_the_id(), $instance.'_left_btn_url', true);
$leftBtnAlign = get_post_meta(get_the_id(), $instance . '_left_button_align', true);
$rightBtnAlign = get_post_meta(get_the_id(), $instance . '_right_button_align', true);
$rightBtnText = get_post_meta(get_the_id(), $instance.'_right_btn_text', true);
$rightBtnUrl = get_post_meta(get_the_id(), $instance.'_right_btn_url', true);
$leftExcerpt = get_post_meta(get_the_id(), $instance.'_left_excerpt', true);
$rightExcerpt = get_post_meta(get_the_id(), $instance.'_right_excerpt', true);
$leftEmbed = get_post_meta(get_the_id(), $instance.'_left_embed', true);
$rightEmbed = get_post_meta(get_the_id(), $instance.'_right_embed', true);
$leftContentType = get_post_meta(get_the_id(), $instance.'_left_content_type', true);
$rightContentType = get_post_meta(get_the_id(), $instance.'_right_content_type', true);
$leftFormLogo = get_post_meta(get_the_id(), $instance.'_left_logo', true);
$rightFormLogo = get_post_meta(get_the_id(), $instance.'_right_logo', true);
$randomnumber = rand(1, 100);
?>
<section class="sis-container">
    <div id="left-side" class="sis-side">
        <!-- Form -->
        <?php if ($leftContentType == 'form') : ?>
            <div class="main-content schedule-form">
                <?php if ($leftTitle) {?>
                    <h3><?php echo $leftTitle; ?></h3>
                <?php } ?>
                <?php if ($leftSubtitle) {?>
                    <p class="subtitle"><?php echo $leftSubtitle; ?></p>
                <?php } ?>
                <?php if ($leftExcerpt) {?>
                    <div class="excerpt">
                        <?php echo $leftExcerpt; ?>
                    </div>
                <?php } ?>
                <form action="<?php echo get_form_processor(); ?>" method="post" name="form-schedule">
                    <?php if ($leftFormLogo) : ?>
                        <img src="<?php echo $leftFormLogo; ?>" alt="Logo" />
                    <?php endif; ?>
                    <input name="FirstName" type="text" placeholder="First Name" required />
                    <input name="LastName" type="text" placeholder="Last Name" />
                    <input type="text" name="Phone" placeholder="Phone" />
                    <input type="text" name="EmailName" placeholder="Email" />
                    <textarea name="Comments" placeholder="How can we help?"></textarea>
                    <input type="text" name="RepeatEmailName" placeholder="Retype Email" autocomplete="nope">
                    <br />
                    <?php if (!empty(site_ops_recaptcha(false))) : ?>
                        <div class="captcha-container">
                            <div class="g-recaptcha" data-sitekey="<?php site_ops_recaptcha(); ?>"></div>
                        </div>
                    <?php endif;  ?>
                    <button type="submit" class="btn solid">Submit</button>
                    <input name="Subject" type="hidden" value="<?php bloginfo('name'); ?> Schedule Appointment Form" />
                    <input name="Campaign" type="hidden" value="Schedule Appointment Form" />
                    <input name="AccountID" type="hidden" value="<?php site_ops_dashboard_account_id(); ?>" />
                    <input name="RedirectPageFullURL" type="hidden" value="<?php site_ops_form_redirect_url(); ?>" />
                    <input name="EmailRecipient" type="hidden" value="<?php site_ops_form_to_email(); ?>" />
                    <?php if (!empty(site_ops_dashboard_cc_email(false))) : ?>
                        <input name="EmailCC" type="hidden" value="<?php echo site_ops_dashboard_cc_email(); ?>" />
                    <?php endif; ?>
                    <input type="hidden" name="gaSource" />
                    <input type="hidden" name="gaMedium" />
                    <input type="hidden" name="gaCampaign" />
                    <input type="hidden" name="gaKeyword" />
                    <input type="hidden" name="pagename" />       
                </form>
            </div>
            <script src='https://www.google.com/recaptcha/api.js' id='recaptcha-js'></script>
        <?php endif; ?>

        <!-- Image -->
        <?php if ($leftContentType === 'image') : ?>
            <img src="<?php echo $leftImage; ?>" alt="<?php echo $leftImageAlt; ?>" />
        <?php endif; ?>

        <!-- Google Maps/360 Tour -->
        <?php if ($leftContentType === 'iframe' && !$leftWebmVideo && !$leftMp4Video) : ?>
            <div class="popup-youtube embed-button-none">
                <?php echo $leftEmbed; ?>
            </div>
        <?php endif; ?>

        <!-- Video Link -->
        <?php if ($leftContentType === 'youtube' && !$leftWebmVideo && !$leftMp4Video) : ?>
            <div class="popup-youtube embed-button-none" href="<?php echo $leftEmbed; ?>">
                <img src="<?php echo $leftImage; ?>" alt="<?php echo $leftImageAlt; ?>" />
            </div>
        <?php endif; ?>

        <!-- Custom -->
        <?php if ($embedtype === 'custom') : ?>
            <div class="static_image_split-img popup-custom-<?php echo $randomnumber; ?> embed-button-plus static_image_split-img-btn-bg"></div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    $('.popup-<?php echo $leftEmbedType . "-" . $randomnumber; ?>').magnificPopup({
                    preloader: false,
                    modal: false,
                    items: {
                        src: '<?php echo $leftEmbed; ?>',
                        type: 'inline',
                    },
                    type: 'image'
                    });
                });
            </script>
        <?php endif; ?>

        <!-- Embedded Video -->
        <?php if ($leftWebmVideo || $leftMp4Video) : ?>
			<?php if (!wp_is_mobile()) { ?>
				<video class="fold-video" autoplay loop muted data-audio="true" poster="<?php echo $leftImage; ?>">
					<source src="<?php echo $leftWebmVideo; ?>" type="video/webm">
					<source src="<?php echo $leftMp4Video; ?>" type="video/mp4">
				</video>
			<?php } else { ?>
				<img src="<?php echo $leftImage; ?>" alt="<?php echo $leftImageAlt; ?>" />
			<?php } ?>
        <? endif; ?>

        <!-- Text -->
        <?php if ($leftTitle || $leftSubtitle || $leftExcerpt || $leftDisplayPhone === 'yes' || $leftDisplayAddress === 'yes' || $leftBtnText) : ?>
            <div class="text-container" style="background-color: rgba(<?php echo $leftRGBA; ?>); padding: 5% <?php echo $leftTextPadding; ?>% 7% <?php echo $leftTextPadding; ?>%;">
                <?php if ($leftTitle) : ?>
                    <h3 style="text-align: <?php echo $leftTitleAlign; ?>;"><?php echo $leftTitle; ?></h3>
                <?php endif; ?>
                <?php if ($leftSubtitle) : ?>
                    <p class="subtitle" style="text-align: <?php echo $leftSubtitleAlign; ?>;"><?php echo $leftSubtitle; ?></p>
                <?php endif; ?>
                <?php if ($leftExcerpt) : ?>
                    <div class="excerpt">
                        <?php echo $leftExcerpt; ?>
                    </div>
                <?php endif; ?>
                <?php if ($leftDisplayPhone === 'yes' || $leftDisplayAddress === 'yes') : ?>
                    <div class="contact-container">
                        <?php if ($leftDisplayPhone === 'yes') : ?>
                            <a class="contact-option phone" <?php $option = get_option('practice_info'); if (!empty($option['new_patient_phone'])) { echo 'href="tel:' . $option['new_patient_phone'] . '"'; } ?>>
                                <i class="icon fas fa-phone"></i>
                                <p>New Patients <span class="bold tracknum"><?php site_ops_new_patient_phone(); ?></span></p>
                            </a>
                        <?php endif; ?>
                        <?php if ($leftDisplayAddress === 'yes') : ?>
                            <a class="contact-option street-address" <?php $option = get_option('practice_info'); if (!empty($option['google_place_id'])) { echo 'href="https://www.google.com/maps/search/?api=1&query=Google&query_place_id=' . $option['google_place_id'] . '" target="_blank"'; } ?>>
                                <i class="icon fas fa-compass"></i>
                                <p><?php site_ops_address(); ?>  <span class="bold"><?php site_ops_city(); ?>, <?php site_ops_state(); ?> <?php site_ops_zip(); ?></span></p>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif;
                if ($leftBtnText) { 
                    if ($leftBtnAlign === 'left') {
                        $leftBtnAlign = 'baseline';
                    }
                    if ($leftBtnAlign === 'right') {
                        $leftBtnAlign = 'end';
                    }
                    ?>
                    <a href="<?php echo $leftBtnUrl; ?>" class="btn solid" style="place-self: <?php echo $leftBtnAlign; ?>;"><?php echo $leftBtnText; ?></a>
                <?php
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
    <div id="right-side" class="sis-side">
        <!-- Form -->
        <?php if ($rightContentType == 'form') : ?>
            <div class="main-content schedule-form">
            <?php if ($rightTitle) {?>
                    <h3><?php echo $rightTitle; ?></h3>
                <?php } ?>
                <?php if ($rightSubtitle) {?>
                    <p class="subtitle"><?php echo $rightSubtitle; ?></p>
                <?php } ?>
                <?php if ($rightExcerpt) {?>
                    <div class="excerpt">
                        <?php echo $rightExcerpt; ?>
                    </div>
                <?php } ?>
                <form action="<?php echo get_form_processor(); ?>" method="post" name="form-schedule">
                    <?php if ($rightFormLogo) : ?>
                        <img src="<?php echo $rightFormLogo; ?>" alt="Logo" />
                    <?php endif; ?>
                    <input name="FirstName" type="text" placeholder="First Name" required />
                    <input name="LastName" type="text" placeholder="Last Name" />
                    <input type="text" name="Phone" placeholder="Phone" />
                    <input type="text" name="EmailName" placeholder="Email" />
                    <textarea name="Comments" placeholder="How can we help?"></textarea>
                    <input type="text" name="RepeatEmailName" placeholder="Retype Email" autocomplete="nope">
                    <br />
                    <?php if (!empty(site_ops_recaptcha(false))) : ?>
                        <div class="captcha-container">
                            <div class="g-recaptcha" data-sitekey="<?php site_ops_recaptcha(); ?>"></div>
                        </div>
                    <?php endif;  ?>
                    <button type="submit" class="btn solid">Submit</button>
                    <input name="Subject" type="hidden" value="<?php bloginfo('name'); ?> Schedule Appointment Form" />
                    <input name="Campaign" type="hidden" value="Schedule Appointment Form" />
                    <input name="AccountID" type="hidden" value="<?php site_ops_dashboard_account_id(); ?>" />
                    <input name="RedirectPageFullURL" type="hidden" value="<?php site_ops_form_redirect_url(); ?>" />
                    <input name="EmailRecipient" type="hidden" value="<?php site_ops_form_to_email(); ?>" />
                    <?php if (!empty(site_ops_dashboard_cc_email(false))) : ?>
                        <input name="EmailCC" type="hidden" value="<?php echo site_ops_dashboard_cc_email(); ?>" />
                    <?php endif; ?>
                    <input type="hidden" name="gaSource" />
                    <input type="hidden" name="gaMedium" />
                    <input type="hidden" name="gaCampaign" />
                    <input type="hidden" name="gaKeyword" />
                    <input type="hidden" name="pagename" />       
                </form>
            </div>
            <script src='https://www.google.com/recaptcha/api.js' id='recaptcha-js'></script>
        <?php endif; ?>

        <!-- Image -->
        <?php if ($rightContentType === 'image') : ?>
            <img src="<?php echo $rightImage; ?>" alt="<?php echo $rightImageAlt; ?>" />
        <?php endif; ?>

        <!-- Google Maps/360 Tour -->
        <?php if ($rightContentType === 'iframe' && !$rightMp4Video && !$rightWebmVideo) : ?>
            <div class="popup-youtube embed-button-none">
                <?php echo $rightEmbed; ?>
            </div>
        <?php endif; ?>

        <!-- Video Link -->
        <?php if ($rightContentType === 'youtube' && !$rightMp4Video && !$rightWebmVideo) : ?>
            <div class="popup-youtube embed-button-none" href="<?php echo $rightEmbed; ?>">
                <img src="<?php echo $rightImage; ?>" alt="<?php echo $rightImageAlt; ?>" />
            </div>
        <?php endif; ?>

        <!-- Custom -->
        <?php if ($embedtype === 'custom') : ?>
            <div class="static_image_split-img popup-custom-<?php echo $randomnumber; ?> embed-button-plus static_image_split-img-btn-bg"></div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    $('.popup-<?php echo $rightEmbedType . "-" . $randomnumber; ?>').magnificPopup({
                    preloader: false,
                    modal: false,
                    items: {
                        src: '<?php echo $rightEmbed; ?>',
                        type: 'inline',
                    },
                    type: 'image'
                    });
                });
            </script>
        <?php endif; ?>

        <!-- Embedded Video -->
        <?php if ($rightWebmVideo || $rightMp4Video) : ?>
			<?php if (!wp_is_mobile()) { ?>
				<video class="fold-video" autoplay loop muted data-audio="true" poster="<?php echo $rightImage; ?>">
					<source src="<?php echo $rightWebmVideo; ?>" type="video/webm">
					<source src="<?php echo $rightMp4Video; ?>" type="video/mp4">
				</video>
			<?php } else { ?>
				<img src="<?php echo $rightImage; ?>" alt="<?php echo $rightImageAlt; ?>" />
			<?php } ?>
        <? endif; ?>

        <!-- Text -->
        <?php if ($rightTitle || $rightSubtitle || $rightExcerpt || $rightDisplayPhone === 'yes' || $rightDisplayAddress === 'yes' || $rightBtnText) : ?>
            <div class="text-container" style="background-color: rgba(<?php echo $rightRGBA; ?>); padding: 5% <?php echo $rightTextPadding; ?>% 7% <?php echo $rightTextPadding; ?>%;">
                <?php if ($rightTitle) : ?>
                    <h3 style="text-align: <?php echo $rightTitleAlign; ?>;"><?php echo $rightTitle; ?></h3>
                <?php endif; ?>
                <?php if ($rightSubtitle) : ?>
                    <p class="subtitle" style="text-align: <?php echo $rightSubtitleAlign; ?>;"><?php echo $rightSubtitle; ?></p>
                <?php endif; ?>
                <?php if ($rightExcerpt) : ?>
                    <div class="excerpt">
                        <?php echo $rightExcerpt; ?>
                    </div>
                <?php endif; ?>
                <?php if ($rightDisplayPhone === 'yes' || $rightDisplayAddress === 'yes') : ?>
                    <div class="contact-container">
                        <?php if ($rightDisplayPhone === 'yes') : ?>
                            <a class="contact-option phone" <?php $option = get_option('practice_info'); if (!empty($option['new_patient_phone'])) { echo 'href="tel:' . $option['new_patient_phone'] . '"'; } ?>>
                                <i class="icon fas fa-phone"></i>
                                <p>New Patients <span class="bold tracknum"><?php site_ops_new_patient_phone(); ?></span></p>
                            </a>
                        <?php endif; ?>
                        <?php if ($rightDisplayAddress === 'yes') : ?>
                            <a class="contact-option street-address" <?php $option = get_option('practice_info'); if (!empty($option['google_place_id'])) { echo 'href="https://www.google.com/maps/search/?api=1&query=Google&query_place_id=' . $option['google_place_id'] . '" target="_blank"'; } ?>>
                                <i class="icon fas fa-compass"></i>
                                <p><?php site_ops_address(); ?>  <span class="bold"><?php site_ops_city(); ?>, <?php site_ops_state(); ?> <?php site_ops_zip(); ?></span></p>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php
                endif;
                if ($rightBtnText) { 
                    if ($rightBtnAlign === 'left') {
                        $rightBtnAlign = 'baseline';
                    }
                    if ($rightBtnAlign === 'right') {
                        $rightBtnAlign = 'end';
                    }
                    ?>
                    <a href="<?php echo $rightBtnUrl; ?>" class="btn solid" style="place-self: <?php echo $rightBtnAlign; ?>;"><?php echo $rightBtnText; ?></a>
                <?php
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>