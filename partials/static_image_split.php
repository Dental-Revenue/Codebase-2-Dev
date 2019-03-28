<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
?>


<div class="static_image_split">
	
	<?php
	$image = get_post_meta(get_the_id(),$instance.'_image',true);
	$color = (get_post_meta(get_the_id(),$instance.'_bg_color',true)!='') ? get_post_meta(get_the_id(),$instance.'_bg_color',true) : '#ffffff' ;	
  $raw_headline = get_post_meta(get_the_id(),$instance.'_headline',true);
	$headline = str_replace(array('{','}'), array('<span>','</span>'),$raw_headline);
	
	$content = get_post_meta(get_the_id(),$instance.'_content',true);
	?>

  <div class="static_image_split-img" style="background-image: url(<?php echo $image; ?>); border-right:10px solid <?php echo $color; ?>"></div>
  
  <div class="static_image_split-right">
    
    <div class="static_image_split-content">
      <h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2>
     <?php echo wpautop($content); ?>
    </div>
    
    <div class="static_image_split-contact">
      <div class="contact-options">
          <div class="contact-option">
            <i class="icon fas fa-phone"></i>
            <p>New Patients <span class="bold tracknum"><?php site_ops_new_patient_phone(); ?></span></p>
          </div> 
          <a class="contact-option street-address" href="https://maps.google.com/" target="_blank">
            <i class="icon fas fa-compass"></i>
            <p><?php site_ops_address(); ?> <span class="bold"><?php site_ops_city(); ?>, <?php site_ops_state(); ?> <?php site_ops_zip(); ?></span></p>
          </a>
      </div>
      <?php $page = get_pages(array('meta_key' => '_wp_page_template','meta_value' => 'page-templates/template-schedule.php')); ?>
      <a href="<?php echo get_permalink($page[0]->ID); ?>" class="btn solid"><?php site_ops_cta_text(); ?></a>
    </div>
    
  </div>

</div>