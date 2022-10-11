<?php $instance = $template_args['instance']; 
	
	$color = (get_post_meta(get_the_id(),$instance.'_bg_color',true)!='') ? get_post_meta(get_the_id(),$instance.'_bg_color',true) : '#ffffff' ;
	$hex = str_replace('#', '', $color);
	if(strlen($hex) == 3) {
	$r = hexdec(substr($hex,0,1).substr($hex,0,1));
	$g = hexdec(substr($hex,1,1).substr($hex,1,1));
	$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
	$r = hexdec(substr($hex,0,2));
	$g = hexdec(substr($hex,2,2));
	$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
	
	$items = get_post_meta(get_the_id(),$instance.'_items',true);
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	
	$headline = get_post_meta(get_the_id(),$instance.'_headline',true);
	$subtitle = get_post_meta(get_the_ID(), $instance.'_subtitle', true);
	
	$excerpt = get_post_meta(get_the_id(),$instance.'_excerpt',true);
	$url = get_post_meta(get_the_id(),$instance.'_url',true);
	$url_text = get_post_meta(get_the_id(),$instance.'_url_text',true);
	$second_url = get_post_meta(get_the_id(), $instance.'_second_url', true);
	$second_url_text = get_post_meta(get_the_id(), $instance.'_second_url_text', true);

	$display_static_block = get_post_meta(get_the_id(),$instance.'_display_static_block',true);	
	$grid_bg_color = get_post_meta(get_the_id(),$instance.'_grid_bg_color',true);		
	$display_rectangle_or_square = get_post_meta(get_the_id(),$instance.'_display_rectangle_or_square',true);	
	$add_spacing = get_post_meta(get_the_id(),$instance.'_add_spacing',true);

?>

<div class="custom-video-testimonials <?php if($add_spacing === 'yes'){ ?>grid-padding<?php } ?> <?php if($add_spacing === 'yes' && $display_rectangle_or_square != 'square'){ ?>grid-padding-rect<?php } ?>">

	<?php if($display_static_block === 'yes') { ?>
	<div class="cvt-block static <?php if($display_rectangle_or_square === 'square'){ ?>cvt-block-square<?php } else { echo "cvt-block-rect";} ?>" <?php if (!empty($grid_bg_color)){?>style="background-color:<?php echo $grid_bg_color; ?>"<?php } ?>>
	  <?php if(!empty($headline)){ ?><h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2><?php } ?>
	  <?php if ($subtitle) : ?>
      	<p class="rtg-subtitle <?php echo $headline_style; ?>"><?php echo $subtitle; ?></p>
      <?php endif; ?>
		<?php if(!empty($excerpt)){ ?><p><?php echo $excerpt; ?></p><?php } ?>
		<?php if(!empty($url)){ ?><a href="<?php echo $url; ?>"><?php echo $url_text; ?></a><?php }
		if (!empty($second_url)) {
			?>
			<a href="<?php echo $second_url; ?>"><?php echo $second_url_text; ?></a>
			<?php
		} ?>
	</div>
	<?php } ?>
	
	<?php
    $blocks = get_post_meta(get_the_id(),$instance.'_blocks',true);
    foreach ((array) $blocks as $key => $block ) {
	  $image = wp_get_attachment_image_src( $block['image_id'], 'lg' );
	  $url = $block['url'];
	  $url_text = $block['url_text'];
		$bg_color = $block['bg_color'];
    ?>
      
    <div class="cvt-block <?php if($display_rectangle_or_square === 'square'){ ?>cvt-block-square<?php } else { echo "cvt-block-rect";} ?>" style="background-image: url(<?php echo $image[0]; ?>);">
		<div class="cvt-content" style="background-color:<?php echo $bg_color; ?>;">
			<?php if ($block['name']) : ?>
				<h3><?php echo $block['name']; ?></h3>
			<?php endif; ?>
			<p><?php echo $block['excerpt']; ?></p>
			<?php if(!empty($url)){ ?><a href="<?php echo $url; ?>" class="<?php if(strpos($url,'youtube') !== false || strpos($url,'vimeo') !== false){ ?>popup-youtube<?php } else { ?>icon-arrow<?php } ?>"><?php echo $url_text; ?></a><?php } ?>
		</div>
		<span style="background-color:<?php echo $bg_color; ?>;"><?php echo $block['name']; ?></span>
	</div>
      	
    <?php } ?>
	
</div>