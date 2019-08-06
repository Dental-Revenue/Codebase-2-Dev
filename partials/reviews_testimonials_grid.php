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
	$raw_title = get_post_meta(get_the_id(),$instance.'_headline',true);
	$maintitle = str_replace(array('(',')'), array("<h2 class='$headline_style'>","</h2>"),$raw_title);
	$subtitle = str_replace(array('{','}'), array('<h3>','</h3>'),$maintitle);
	$title = str_replace(array('[',']'), array('<p>','</p>'),$subtitle);
?>

<div class="custom-video-testimonials">
	
	<div class="cvt-block static">
	<div class="section-title"><?php echo $title; ?></div>
	<a href="/testimonials/">View Testimonials</a>
	</div>
	
	<?php
    $blocks = get_post_meta(get_the_id(),$instance.'_blocks',true);
    foreach ((array) $blocks as $key => $block ) {
	  $image = wp_get_attachment_image_src( $block['image_id'], 'lg' );
    ?>
      
      <div class="cvt-block" style="background-image: url(<?php echo $image[0]; ?>);">
				<div class="cvt-content" style="background-color: rgba(<?php echo $r; ?>,<?php echo $g; ?>,<?php echo $b; ?>,.5);">
					<h3><?php echo $block['name']; ?></h3>
					<p><?php echo $block['excerpt']; ?></p>
					<a href="<?php echo $block['url']; ?>" class="popup-youtube">Watch Video</a>
				</div>
				<span style="background-color: rgba(<?php echo $r; ?>,<?php echo $g; ?>,<?php echo $b; ?>,.5);"><?php echo $block['name']; ?></span>
			</div>
      	
    <?php } ?>
	
</div>
