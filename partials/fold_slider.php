<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
?>
  <div class="slick-init slick-fold_slider">
	  
	  <?php
    $blocks = get_post_meta(get_the_id(),$instance.'_fold_slides',true);
    foreach ((array) $blocks as $key => $block ) {
	  $image = wp_get_attachment_image_src( $block['image_id'], 'xxl' );
    ?>
		<div class="fold-slide" style="background-image: url(<?php echo $image[0]; ?>);"></div>
		<?php } ?>
		
  </div>