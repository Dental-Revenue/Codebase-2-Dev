<?php $instance = $template_args['instance'];
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style']; ?>
  
<div class="row">
	
	<?php //get data
	$image =	wp_get_attachment_image_src(get_post_meta(get_the_id(),$instance.'_img_id', true ),'large');
	$title = get_post_meta( get_the_id(),$instance.'_title', true );
	$excerpt = get_post_meta( get_the_id(),$instance.'_excerpt', true );
	?>

  <div class="static_image_content-left">
    <img src="<?php echo $image[0]; ?>" alt="<?php echo $title; ?>" />
  </div>
  
  <div class="static_image_content-right">
  <?php if ($title) : ?>
		<h2 class="<?php echo $headline_style; ?>"><?php echo $title; ?></h2>
	<?php endif; ?>
	<?php echo wpautop($excerpt); ?>
    <?php 
	    $buttons = get_post_meta(get_the_id(),$instance.'_buttons',true);
	    foreach ((array) $buttons as $key => $button ) {
		    $button_title = $button_link = '';
		    if(isset($button['title'])){ $button_title = $button['title']; }
				if(isset($button['link'])){ $button_link = $button['link']; } ?>
				
				<a href="<?php echo $button_link; ?>" class="btn btn-sm solid"><? echo $button_title; ?></a>
				
		<?php } ?>    

  </div>

</div>
