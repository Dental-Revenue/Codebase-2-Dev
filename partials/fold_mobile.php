<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];

	$fold_image = get_post_meta(get_the_id(),$instance.'_static_bg_image',true);
	$fold_image_alt = get_post_meta(get_the_id(),$instance.'_static_image_alt',true);
	
	$color = (get_post_meta(get_the_id(),$instance.'_overlay_color',true)!='') ? get_post_meta(get_the_id(),$instance.'_overlay_color',true) : '#ffffff' ;
	$color2 = get_post_meta(get_the_id(),$instance.'_overlay_color_2',true);
	$colorCSS = !empty($color2) ? 'background:linear-gradient('.$color.', '.$color2.');' : 'background-color:'.$color.';';
	$fold_overlay = get_post_meta(get_the_id(),$instance.'_overlay',true)/100;
	$colorDarkness = 'opacity:'.$fold_overlay.';';
	
	$fold_height = get_post_meta(get_the_id(),$instance.'_height',true);
	$fold_title = get_post_meta(get_the_id(),$instance.'_title',true);
	$fold_excerpt = get_post_meta(get_the_id(),$instance.'_excerpt',true);
	$cta_text = get_post_meta(get_the_id(),$instance.'_cta',true);
	$cta_url = get_post_meta(get_the_id(),$instance.'_url',true);
	$cta_text_2 = get_post_meta(get_the_id(),$instance.'_cta_2',true);
	$cta_url_2 = get_post_meta(get_the_id(),$instance.'_url_2',true);
?>

  <div>
	  <?php if($fold_image != '') {?><img src="<?php echo $fold_image; ?>" alt="<?php if($fold_image_alt !=''){ echo $fold_image_alt; } else {?>Background Image<?php } ?>" class="static-module-image" /><?php } ?>
	  <?php if($color != '') {?><span class="fold-mobile-color-overlay" style="<?php echo $colorCSS; ?>"></span><?php } ?>
		<div class="fold-mobile-slide">
  		<div class="fold-overlay" style="<?php if($color != '') { echo $colorCSS; } ?> <?php echo $colorDarkness; ?>"></div>
			<div class="fold-mobile-slide-text">
				<?php if ($fold_title) : ?>
			  		<h2><?php echo $fold_title; ?></h2>
				<?php endif; ?>
				<?php if(isset($fold_excerpt) && $fold_excerpt != ''){ ?><p><?php echo $fold_excerpt; ?></p><?php } ?>
			  <?php if(isset($cta_text) && $cta_text != ''){ ?><a class="btn solid" href="<?php echo $cta_url; ?>"><?php echo $cta_text; ?></a><?php } ?>
			  <?php if(isset($cta_text_2) && $cta_text_2 != ''){ ?><a class="btn solid" href="<?php echo $cta_url_2; ?>"><?php echo $cta_text_2; ?></a><?php } ?>
			</div>
		</div>
		
  </div>
