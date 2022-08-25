<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	
	$image = get_post_meta(get_the_id(),$instance.'_left_side_image',true);	
  	$headline = get_post_meta(get_the_id(),$instance.'_headline',true);
	$subtitle = get_post_meta(get_the_ID(), $instance.'_subtitle', true);
	
	$left_side_img = get_post_meta(get_the_id(),$instance.'_left_side_image',true);
	$left_side_content = get_post_meta(get_the_id(),$instance.'_left_side_content',true);
	$left_side_cta = get_post_meta(get_the_id(),$instance.'_left_side_cta',true);
	$left_side_url = get_post_meta(get_the_id(),$instance.'_left_side_url',true);
	?>

<div class="offset_left">
 	<?php if ($headline) : ?>
      <h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2>
    <?php endif; ?>
	<?php if ($subtitle) : ?>
      <p class="sio-subtitle <?php echo $headline_style; ?>"><?php echo $subtitle; ?></p>
    <?php endif; ?>
	 <div class="offset_left_img" style="background-image: url(<?php echo $left_side_img; ?>);"></div>
	 <?php echo wpautop($left_side_content); ?>
	 <p><a href="<?php echo $left_side_url; ?>" class="btn solid"><?php echo $left_side_cta; ?></a></p>
 </div>
 
 <div class="offset_right">
	 <?php
		$right_side_img = get_post_meta(get_the_id(),$instance.'_right_side_image',true);
		$right_side_content = get_post_meta(get_the_id(),$instance.'_right_side_content',true);
		$right_side_cta = get_post_meta(get_the_id(),$instance.'_right_side_cta',true);
		$right_side_url = get_post_meta(get_the_id(),$instance.'_right_side_url',true);
	?>
	 <div class="offset_right_img" style="background-image: url(<?php echo $right_side_img; ?>);"></div>
	 <?php echo wpautop($right_side_content); ?>
	 <p><a href="<?php echo $right_side_url; ?>" class="btn solid"><?php echo $right_side_cta; ?></a></p>
 </div>
 