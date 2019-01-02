<?php $instance = $template_args['instance']; 
	$items = get_post_meta(get_the_id(),$instance.'_items',true);
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	
  $raw_headline = get_post_meta(get_the_id(),$instance.'_headline',true);
	$headline = str_replace(array('{','}'), array('<span>','</span>'),$raw_headline);
	
	$excerpt = get_post_meta(get_the_id(),$instance.'_excerpt',true);
?>

<div class="custom-video-testimonials">
	
	<div class="cvt-block static">
	  <?php if(!empty($headline)){ ?><h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2><?php } ?>
		<?php if(!empty($excerpt)){ ?><p><?php echo $excerpt; ?></p><?php } ?>
		<a href="/testimonials/">View Testimonials</a>
	</div>
	
	<?php
    $blocks = get_post_meta(get_the_id(),$instance.'_blocks',true);
    foreach ((array) $blocks as $key => $block ) {
	  $image = wp_get_attachment_image_src( $block['image_id'], 'lg' );
    ?>
      
      <div class="cvt-block" style="background-image: url(<?php echo $image[0]; ?>);">
				<div class="cvt-content">
					<h3><?php echo $block['name']; ?></h3>
					<p><?php echo $block['excerpt']; ?></p>
					<a href="<?php echo $block['url']; ?>" class="popup-youtube">Watch Video</a>
				</div>
				<span><?php echo $block['name']; ?></span>
			</div>
      	
    <?php } ?>
	
</div>