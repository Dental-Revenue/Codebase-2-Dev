<?php 
	$instance = $template_args['instance']; 
	$title = get_post_meta( get_the_ID(), $instance.'_title', true );
	$text_bars = get_post_meta(get_the_id(),$instance.'_text_bars',true);
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	?>
	<?php if ($title) : ?>
		<h2 class="<?php echo $headline_style; ?>"><?php echo $title; ?></h2>
	<?php endif; ?>

<div class="slick-init slick-carousel_2 <?php echo $text_bars; ?>">
    
  <?php
	$items = get_post_meta( get_the_ID(), $instance.'_carousel_items', true );
	foreach ( (array) $items as $key => $item ) {
		$item_title = $item_img = $item_link_id = ''; 
		if(isset($item['title'])){ $item_title = $item['title']; }
		if(isset($item['image'])){ $item_img_id = $item['image_id']; }
		if(isset($item['image'])){ $item_img = wp_get_attachment_image_src( $item_img_id, 'lg-square' ); }
		if(isset($item['carousel_page'])){ $item_link_id = $item['carousel_page']; } ?>
  
    <div class="carousel_2-block hover-up-parent">
      <a href="<?php the_permalink($item_link_id); ?>">
        <img src="<?php echo $item_img[0]; ?>" alt="<?php echo $item_title; ?>">
      </a>
      <a href="<?php the_permalink($item_link_id); ?>" class="hover-up-child"><?php echo $item_title; ?></a>
    </div>
  
	<?php } ?>
    
</div>
  
