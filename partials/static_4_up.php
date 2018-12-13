<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	
	$title = get_post_meta( get_the_ID(), $instance.'_title', true ); 
	
	$img = get_post_meta( get_the_ID(), $instance.'_img_id', true ); 
	$img = wp_get_attachment_image_src( $big_img, 'lg' ); 
	$link_title = get_post_meta( get_the_ID(), $instance.'_img_link_title', true ); 
	$link = get_post_meta( get_the_ID(), $instance.'_img_link', true );
	 
?>
  
  <h2 class="<?php echo $headline_style; ?>"><?php echo $title; ?></h2>
  
  <div class="row">
	  <?php 
		 $images = get_post_meta(get_the_id(),$instance.'_images',true);
		 foreach ((array) $images as $key => $image ) {
		 $image_img = $image_link = $image_link_title = '';
		 if(isset($image['img'])){ 
			 $image_img = $image['img']; 
			 $image_img = wp_get_attachment_image_src( $image_img, 'lg' ); 
		 }
		 if(isset($image['img_link'])){ $image_link = $image['img_link']; }
		 if(isset($image['img_link_title'])){ $image_link_title = $image['img_link_title']; } ?>
	  
		  <div class="columns six static_4_up-column">
			  
			  <a href="<?php echo $image_link ?>" class="static_4_up-box hover-up-parent" style="background-image:url(<?php echo $image_img[0]; ?>);"><span class="hover-up-child"><?php echo $image_link_title ?></span></a>
			  
		  </div>
		  
		 <?php } ?>
	  
  </div>