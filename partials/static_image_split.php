<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
?>

<div class="static_image_split">
	
	<?php
	$image = get_post_meta(get_the_id(),$instance.'_image',true);
  $image_xxl = wp_get_attachment_image_src( get_post_meta(get_the_id(),$instance.'_image_id',true), 'xxl' );
  $image_xl = wp_get_attachment_image_src( get_post_meta(get_the_id(),$instance.'_image_id',true), 'xl' );
  $image_lg = wp_get_attachment_image_src( get_post_meta(get_the_id(),$instance.'_image_id',true), 'lg' );
  $image_alt = get_post_meta(get_the_id(),$instance.'_side_image_alt',true);
	
	$color = (get_post_meta(get_the_id(),$instance.'_bg_color',true)!='') ? get_post_meta(get_the_id(),$instance.'_bg_color',true) : '#ffffff' ;	
  $headline = get_post_meta(get_the_id(),$instance.'_headline',true);
	$subtitle = get_post_meta(get_the_ID(), $instance.'_subtitle', true);

  $display_phone = get_post_meta(get_the_id(),$instance.'_display_phone',true);
  $display_address = get_post_meta(get_the_id(),$instance.'_display_address',true);

  $btn_text = get_post_meta(get_the_id(),$instance.'_btn_text',true);
  $btn_url = get_post_meta(get_the_id(),$instance.'_btn_url',true);
	
	$content = get_post_meta(get_the_id(),$instance.'_content',true);

  $side_image_left_right = get_post_meta(get_the_id(),$instance.'_side_image_left_right',true);
  
  $text_align = get_post_meta(get_the_id(),$instance.'_text_align',true);

  $display_form = get_post_meta(get_the_id(),$instance.'_display_form',true);
  $text_padding = get_post_meta(get_the_id(),$instance.'_text_padding',true);
  $embed = get_post_meta(get_the_id(),$instance.'_embed',true);
  $embedtype = get_post_meta(get_the_id(),$instance.'_embedtype',true);
  if ($embedtype === 'youtube') { $embedicon = "play"; } elseif ($embedtype === 'image') { $embedicon = "none"; } else { $embedicon = "plus"; }
  $randomnumber = rand(1,100);
	?>

  <div class="static_image_split-img <?php if ($embedtype != 'image') { echo 'popup-'; } ?><?php echo $embedtype ?><?php if ($embedtype === 'custom') { echo '-' . $randomnumber; } ?> <?php if ($embedtype != 'image') { echo 'embed-button-' . $embedicon . ' static_image_split-img-btn-bg'; } ?>" <?php if ($embedtype === 'youtube' || $embedtype === 'iframe') { echo 'href="' . $embed . '"'; } ?> style="<?php if ($side_image_left_right === 'left') { echo ""; } else { echo "left: 50%;"; } ?>">
  <img alt="<?php if (!empty($image_alt)){ echo $image_alt; } else { echo 'Background Image'; } ?>" src="<?php echo $image_xxl[0]; ?>" srcset="<?php echo $image_lg[0]; ?> 500w, <?php echo $image_xl[0]; ?> 700w, <?php echo $image_xxl[0]; ?> 3000w" sizes="100vw,(min-width: 300px) 700px,(min-width: 700px) 1300px" />
  </div>

  <div class="static_image_split-right" style="<?php if ($side_image_left_right === 'left') { echo "margin-left:50%;"; } else { echo "margin-left:0;"; } ?>">

    <div class="static_image_split-content" style="text-align:<?php echo $text_align; ?>; padding: 5% <?php echo $text_padding; ?>% 7% <?php echo $text_padding; ?>%;">
    <?php if(!empty($headline)){ ?><h2 style="text-align:<?php echo $text_align; ?>" class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2><?php } ?>
    <?php if ($subtitle) : ?>
      <p class="sis-subtitle <?php echo $headline_style; ?>"><?php echo $subtitle; ?></p>
    <?php endif; ?>
    <?php if ($display_form === 'no') { ?>
    <?php if (!empty($content)) {?><div class="static_image_split-paragraph"><?php echo $content; ?></div><?php } ?>
    <?php if ($display_phone === 'yes' || $display_address === 'yes' || !empty($btn_url) ) {?>
    <div class="static_image_split-contact">
    <?php if ($display_phone === 'yes' || $display_address === 'yes') {?>
    <div class="contact-options">
    <?php if ($display_phone === 'yes') {?>
    <a class="contact-option" <?php $option = get_option('practice_info'); if (!empty($option['new_patient_phone'])) { echo 'href="tel:' . $option['new_patient_phone'] . '"'; } ?>>
    <i class="icon fas fa-phone"></i>
    <p>New Patients <span class="bold tracknum"><?php site_ops_new_patient_phone(); ?></span></p>
    <?php } ?>
    <?php if ($display_address === 'yes') {?>
    <a class="contact-option street-address" <?php $option = get_option('practice_info'); if (!empty($option['google_place_id'])) { echo 'href="https://www.google.com/maps/search/?api=1&query=Google&query_place_id=' . $option['google_place_id'] . '" target="_blank"'; } ?>>
    <i class="icon fas fa-compass"></i>
    <p><?php site_ops_address(); ?>  <span class="bold"><?php site_ops_city(); ?>, <?php site_ops_state(); ?> <?php site_ops_zip(); ?></span></p>
    </a>
    <?php } ?>
    </div>
    <?php } ?>
    <?php if (empty($btn_url) || empty($btn_text)) { } else { ?>
    <a href="<?php echo $btn_url; ?>" class="btn solid" <?php if ($display_phone === 'no' && $display_address === 'no') {?>style="margin-top: 20px;"<?php } ?>><?php echo $btn_text; ?></a>
    <?php } ?>
    </div>
    <?php } ?>
    <?php } else { ?>
    <form action="<?php echo get_form_processor(); ?>" method="post" name="form-schedule">
      <input type="text" name="Name" placeholder="Name" />
      <input type="text" name="Phone" placeholder="Phone" />
      <input type="text" name="EmailName" placeholder="Email" />
      <textarea name="Comments" placeholder="How can we help?"></textarea>
      <input type="text" name="RepeatEmailName" placeholder="Retype Email">
      <br />
      <?php if(!empty(site_ops_recaptcha(false))){ ?>
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
      <?php if(!empty(site_ops_dashboard_cc_email(false))){ ?>
      <input name="EmailCC" type="hidden" value="<?php echo site_ops_dashboard_cc_email(); ?>" />
      <?php } ?>
      <input type="hidden" name="gaSource" />
      <input type="hidden" name="gaMedium" />
      <input type="hidden" name="gaCampaign" />
      <input type="hidden" name="gaKeyword" />
      <input type="hidden" name="pagename" />       
    </form>
    <script src='https://www.google.com/recaptcha/api.js' id='recaptcha-js'></script>
    <?php } ?>
    </div>
  </div>

</div>

<?php if ($embedtype === 'custom') { ?>
<script>
 document.addEventListener('DOMContentLoaded', function() {
    $('.popup-<?php echo $embedtype . "-" . $randomnumber; ?>').magnificPopup({
        preloader: false,
        modal: false,
        items: {
            src: '<?php echo $embed; ?>',
            type: 'inline',
        },
        type: 'image'
      });
 });
</script>
<?php } ?>
