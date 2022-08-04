<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	
	$text_bars = get_post_meta(get_the_id(),$instance.'_text_bars',true);
	$title = get_post_meta( get_the_ID(), $instance.'_title', true ); 
?>
	<?php if ($title) : ?>
		<h2 class="<?php echo $headline_style; ?>"><?php echo $title; ?></h2>
	<?php endif; ?>
  
  <div class="row <?php echo $text_bars; ?>">
	  <?php 
		 $columns = get_post_meta(get_the_id(),$instance.'_images',true);
		 foreach ((array) $columns as $key => $column ) {
		 $image_img = $image_link = $image_link_title = '';
		 if(isset($column[$instance.'_img_link'])){ $image_link = $column[$instance.'_img_link']; }
		 if(isset($column[$instance.'_img_link_title'])){ $image_link_title = $column[$instance.'_img_link_title']; }
		 if(isset($column[$instance.'_img'])){ 
			 $image_img_id = $column[$instance.'_img_id'];
			 $image_img = wp_get_attachment_image_src( $image_img_id, 'lg' );
		 } ?>
	  
		  <div class="columns six static_4_up-column">
			  
			  <a href="<?php echo $image_link ?>" class="static_4_up-box hover-up-parent" style="background-image:url(<?php echo $image_img[0]; ?>);"><span class="hover-up-child"><?php echo $image_link_title ?></span></a>
			  
		  </div>
		  
		 <?php } ?>
	  
  </div>