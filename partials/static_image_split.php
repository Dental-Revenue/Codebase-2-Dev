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
  $image_alt = get_post_meta(get_the_id(),$instance.'_alt',true);
	
	$color = (get_post_meta(get_the_id(),$instance.'_bg_color',true)!='') ? get_post_meta(get_the_id(),$instance.'_bg_color',true) : '#ffffff' ;	
  $raw_headline = get_post_meta(get_the_id(),$instance.'_headline',true);
	$headline = str_replace(array('{','}'), array('<span>','</span>'),$raw_headline);
	
	$content = get_post_meta(get_the_id(),$instance.'_content',true);
	?>

  <div class="static_image_split-img" style="border-right:10px solid <?php echo $color; ?>">
	  <img alt="<?php if (isset($image_alt) && $image_alt!=''){ echo $image_alt; } else { echo 'Background Image'; } ?>" src="<?php echo $image_xxl[0]; ?>" srcset="<?php echo $image_lg[0]; ?> 500w, <?php echo $image_xl[0]; ?> 700w, <?php echo $image_xxl[0]; ?> 3000w" sizes="100vw,(min-width: 300px) 700px,(min-width: 700px) 1300px" />
  </div>
  
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
