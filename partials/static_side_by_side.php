<?php 
	$instance = $template_args['instance'];
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
?>

<div class="row">
	<?php //get data
	$title = get_post_meta( get_the_id(),$instance.'_title', true );
	?>
	<?php if ($title) : ?>
		<h2 class="<?php echo $headline_style; ?>"><?php echo $title; ?></h2>
	<?php endif; ?>
</div>

<div class="row">
	<?php 
	$blocks = get_post_meta(get_the_id(),$instance.'_blocks',true);
	foreach ((array) $blocks as $key => $block ) {
	  $block_title = $block_img = $block_link = $block_link_title = $block_excerpt = '';
	  if(isset($block['title'])){ $block_title = $block['title']; }
		if(isset($block['image'])){ $block_img_id = $block['image_id']; }
		if(isset($block['image'])){ $block_img = wp_get_attachment_image_src( $block_img_id, 'lg' ); }
		if(isset($block['link'])){ $block_link = $block['link']; }
		if(isset($block['link_title'])){ $block_link_title = $block['link_title']; } 
		if(isset($block['excerpt'])){ $block_excerpt = $block['excerpt']; } ?>
	  
	  <div class="static_side_by_side-block static_side_by_side-left columns six repeat">
	    <a href="<?php echo $block_link; ?>" class="img" style="background-image: url(<?php echo $block_img[0]; ?>);"></a>
		<?php if ($block_title) : ?>
			<h3><a href="<?php echo $block_link; ?>"><?php echo $block_title; ?></a></h3>
		<?php endif; ?>
	    <?php echo wpautop($block_excerpt); ?>
	    <a href="<?php echo $block_link; ?>" class="learn-more arrow"><?php echo $block_link_title; ?></a>
	  </div>
	<?php } ?>
</div>