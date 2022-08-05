<?php $instance = $template_args['instance']; ?>


<div class="static_block_grid-blocks">
	
	<?php
    $blocks = get_post_meta(get_the_id(),$instance.'_grid_blocks',true);
    foreach ((array) $blocks as $key => $block ) {
	  if(isset($block['block_image_id'])){ $img_id = $block['block_image_id']; }
		if(isset($block['block_image_id'])){ $img = wp_get_attachment_image_src( $img_id, 'md-square' ); };
    ?>
	
	<div class="static_block_grid-block">
		
		<a href="<?php echo $block['block_url']; ?>" class="static_block_grid-block-image" style="background-image: url(<?php echo $block['block_image']; ?>);"></a>
		
		<div class="static_block_grid-block-text-cont">
			<div class="static_block_grid-block-text">
				<?php if ($block['block_title']) : ?>
					<h3><?php echo $block['block_title']; ?></h3>
				<?php endif; ?>
				<p><?php echo $block['block_excerpt']; ?></p>
				<a href="<?php echo $block['block_url']; ?>" class="read-more">Read More</a>
			</div>
		</div>
	
	</div>
	
	 <?php } ?>
	
</div>