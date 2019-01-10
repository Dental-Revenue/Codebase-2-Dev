<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	
	$slider_type = get_post_meta(get_the_id(),$instance.'_type',true);
	$slider_height = get_post_meta(get_the_id(),$instance.'_height',true);
?>

  <div class="slick-init slick-fold_slider" style="height:<?php echo $slider_height; ?>">
	  
	  <?php
    $blocks = get_post_meta(get_the_id(),$instance.'_fold_slides',true);
    foreach ((array) $blocks as $key => $block ) {
	  $image = wp_get_attachment_image_src( $block['image_id'], 'xxl' );
    ?>
		<div class="fold-slide" style="background-image: url(<?php echo $image[0]; ?>);height:<?php echo $slider_height; ?>;">
			<?php if(isset($block['video_webm']) && $block['video_webm']!='' && isset($block['video_mp4']) && $block['video_mp4']!=''){ ?>
				<video class="fold-video" autoplay loop muted data-audio="true" poster="<?php echo $image[0]; ?>">
					<source src="<?php echo $block['video_webm']; ?>" type="video/webm">
					<source src="<?php echo $block['video_mp4']; ?>" type="video/mp4">
  			</video>
  		<?php } ?>
  		<div class="fold-overlay" style="background-color: rgba(0,0,0,.4);"></div>
			<div class="fold-slide-text">
			  <h2><?php echo $block['title']; ?></h2>
			  <?php if(isset($block['excerpt'])){ ?><p><?php echo $block['excerpt']; ?></p><?php } ?>
			  <a class="btn solid" href="<?php echo $block['url']; ?>"><?php echo $block['cta']; ?></a>
			</div>
		</div>
		<?php } ?>
		
  </div>
