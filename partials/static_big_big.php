<?php $instance = $template_args['instance']; ?>

<div class="row">
  
  <?php
  $blocks = get_post_meta(get_the_id(),$instance.'_blocks',true);
  foreach ((array) $blocks as $key => $block ) {
	$title = $img = $link = $link_title = $excerpt = '';
	if(isset($block['title'])){ $title = $block['title']; }
	if(isset($block['image_id'])){ $img_id = $block['image_id']; }
	if(isset($block['image_id'])){ $img = wp_get_attachment_image_src( $img_id, 'lg' ); } 
	if(isset($block['link'])){ $link = $block['link']; }
	if(isset($block['link_title'])){ $link_title = $block['link_title']; }
	if(isset($block['excerpt'])){ $excerpt = $block['excerpt']; }
  ?>
    
	  <div class="static_big_big-block">
	    <img src="<?php echo $img[0]; ?>" alt="<?php echo $title; ?>" />
	    <div class="static_big_big-block-text">
			<?php if ($title) : ?>
				<h3><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h3>
			<?php endif; ?>
	      <p><?php echo $excerpt; ?></p>
	      <a href="<?php echo $link; ?>" class="read-more"><?php echo $link_title; ?></a>
	    </div>
	  </div>
    
	<?php } ?>

</div>