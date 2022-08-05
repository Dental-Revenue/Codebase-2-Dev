<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	
	$text_bars = get_post_meta(get_the_id(),$instance.'_text_bars',true);
	$title = get_post_meta( get_the_ID(), $instance.'_title', true );
	
	$top_left_img = get_post_meta( get_the_ID(), $instance.'_top_left_img_id', true ); 
	$top_left_img = wp_get_attachment_image_src( $top_left_img, 'lg' ); 
	$top_left_link_title = get_post_meta( get_the_ID(), $instance.'_top_left_link_title', true ); 
	$top_left_link_url = get_post_meta( get_the_ID(), $instance.'_top_left_link_url', true );
	
	$bottom_left_img = get_post_meta( get_the_ID(), $instance.'_bottom_left_img_id', true ); 
	$bottom_left_img = wp_get_attachment_image_src( $bottom_left_img, 'lg' ); 
	$bottom_left_link_title = get_post_meta( get_the_ID(), $instance.'_bottom_left_link', true ); 
	$bottom_left_link_url = get_post_meta( get_the_ID(), $instance.'_bottom_left_link_url', true );
	
	$top_right_img = get_post_meta( get_the_ID(), $instance.'_top_right_img_id', true ); 
	$top_right_img = wp_get_attachment_image_src( $top_right_img, 'lg' ); 
	$top_right_link_title = get_post_meta( get_the_ID(), $instance.'_top_right_link_title', true ); 
	$top_right_link_url = get_post_meta( get_the_ID(), $instance.'_top_right_link_url', true );
	
	$bottom_right_img = get_post_meta( get_the_ID(), $instance.'_bottom_right_img_id', true ); 
	$bottom_right_img = wp_get_attachment_image_src( $bottom_right_img, 'lg' ); 
	$bottom_right_link_title = get_post_meta( get_the_ID(), $instance.'_bottom_right_link_title', true ); 
	$bottom_right_link_url = get_post_meta( get_the_ID(), $instance.'_bottom_right_link_url', true );
	
	$middle_img = get_post_meta( get_the_ID(), $instance.'_middle_img_id', true ); 
	$middle_img = wp_get_attachment_image_src( $middle_img, 'full' ); 
	$middle_link_title = get_post_meta( get_the_ID(), $instance.'_middle_link_title', true ); 
	$middle_link_url = get_post_meta( get_the_ID(), $instance.'_middle_link_url', true );
	?>
	<?php if ($title) : ?>
		<h2 class="<?php echo $headline_style; ?>"><?php echo $title; ?></h2>
	<?php endif; ?>
  
  <div class="row <?php echo $text_bars; ?>">
  
	  <div class="static_5_up_left_column">
		  
		  <a href="<?php echo $top_left_link_url; ?>" class="static_5_up-box hover-up-parent" style="background-image:url(<?php echo $top_left_img[0]; ?>);"><span class="hover-up-child"><?php echo $top_left_link_title; ?></span></a>
		  
		  <a href="<?php echo $bottom_left_link_url; ?>" class="static_5_up-box hover-up-parent" style="background-image:url(<?php echo $bottom_left_img[0]; ?>);"><span class="hover-up-child"><?php echo $bottom_left_link_title; ?></span></a>
		  
	  </div>
	  <div class="static_5_up_middle_column">
		  
		  <a href="<?php echo $middle_link_url; ?>" class="static_5_up-box hover-up-parent" style="background-image:url(<?php echo $middle_img[0]; ?>);"><span class="hover-up-child"><?php echo $middle_link_title; ?></span></a>
		  
	  </div>
	  <div class="static_5_up_right_column">
		  
		  <a href="<?php echo $top_right_link_url; ?>" class="static_5_up-box hover-up-parent" style="background-image:url(<?php echo $top_right_img[0]; ?>);"><span class="hover-up-child"><?php echo $top_right_link_title; ?></span></a>
		  
		  <a href="<?php echo $bottom_right_link_url; ?>" class="static_5_up-box hover-up-parent" style="background-image:url(<?php echo $bottom_right_img[0]; ?>);"><span class="hover-up-child"><?php echo $bottom_right_link_title; ?></span></a>
		  
	  </div>
	  
  </div>
