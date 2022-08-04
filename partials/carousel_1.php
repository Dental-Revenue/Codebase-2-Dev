<?php $instance = $template_args['instance']; ?>



<div class="row">
  <div class="slick-init slick-carousel_1" data-slides="<?php echo get_post_meta(get_the_id(),$instance.'_items',true); ?>">
    
		<?php
    $blocks = get_post_meta(get_the_id(),$instance.'_blocks',true);
    foreach ((array) $blocks as $key => $block ) {
	  $image = wp_get_attachment_image_src( $block['image_id'], 'md-square' );
    ?>
      	
      <div class="carousel_1-block">
	      <a href="<?php echo $block['url']; ?>">
		      <img src="<?php echo $image[0]; ?>" alt="" />
	      </a>
				<div class="carousel_1-block-text">
					<?php if ($block['title']) : ?>
						<h3><a href="<?php echo $block['url']; ?>"><?php echo $block['title']; ?></a></h3>
					<?php endif; ?>
					<p><?php echo $block['excerpt']; ?></p>
					<a href="<?php echo $block['url']; ?>" class="read-more">Read More</a>
      	</div>
      </div>
      	
    <?php } ?>
    
  </div>
</div>