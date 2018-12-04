<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	
	$title = get_post_meta( get_the_ID(), $instance.'_title', true ); 
	
	$big_img = get_post_meta( get_the_ID(), $instance.'_big_img_id', true ); 
	$big_img = wp_get_attachment_image_src( $big_img, 'lg' ); 
	$big_link_title = get_post_meta( get_the_ID(), $instance.'_big_img_link_title', true ); 
	$big_link = get_post_meta( get_the_ID(), $instance.'_big_img_link', true );
	
	$sm_top_img = get_post_meta( get_the_ID(), $instance.'_small_top_img_id', true ); 
	$sm_top_img = wp_get_attachment_image_src( $sm_top_img, 'md' ); 
	$sm_top_link_title = get_post_meta( get_the_ID(), $instance.'_small_top_link_title', true ); 
	$sm_top_link = get_post_meta( get_the_ID(), $instance.'_small_top_link', true );
	
	$sm_bottom_img = get_post_meta( get_the_ID(), $instance.'_small_bottom_img_id', true ); 
	$sm_bottom_img = wp_get_attachment_image_src( $sm_bottom_img, 'md' ); 
	$sm_bottom_link_title = get_post_meta( get_the_ID(), $instance.'_small_bottom_link_title', true ); 
	$sm_bottom_link = get_post_meta( get_the_ID(), $instance.'_small_bottom_link', true ); 
?>
  
  <h2 class="<?php echo $headline_style; ?>"><?php echo $title; ?></h2>
  
  <div class="row">
	  
	  <div class="columns eight static_big_small_hover-left">
		  
		  <a href="<?php echo $big_link; ?>" class="static_big_small_hover-box hover-up-parent" style="background-image:url(<?php echo $big_img[0]; ?>);"><span class="hover-up-child"><?php echo $big_link_title; ?></span></a>
		  
	  </div>
	  
	  <div class="columns four static_big_small_hover-right">
		  
		  <a href="<?php echo $sm_top_link; ?>" class="static_big_small_hover-box hover-up-parent" style="background-image:url(<?php echo $sm_top_img[0]; ?>);"><span class="hover-up-child"><?php echo $sm_top_link_title; ?></span></a>
		  
		  <a href="<?php echo $sm_bottom_link; ?>" class="static_big_small_hover-box hover-up-parent" style="background-image:url(<?php echo $sm_bottom_img[0]; ?>);"s><span class="hover-up-child"><?php echo $sm_bottom_link_title; ?></span></a>
		  
	  </div>
	  
  </div>