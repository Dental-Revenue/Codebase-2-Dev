<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	$slider_overlay = get_post_meta(get_the_id(),$instance.'_overlay',true);
	$slide_one_alignment = get_post_meta(get_the_id(),$instance.'_alignment',true);
	$boxes = get_post_meta( get_the_ID(),$instance.'_fold_boxes', true );
	if(sizeof($boxes)<4){ echo "<p>The slice style ATF requires a minimum of 4 slides</p>"; } else {
	$slider_height = get_post_meta(get_the_id(),$instance.'_height',true);
		?>

	<div id="hp-fold" class="fold-panel" style="height:<?php echo $slider_height; ?>;">
	  
	  
	  <?php $first = true;
		foreach((array) $boxes as $p ) {
		$image = wp_get_attachment_image_src($p['image_id'],'xxl');
		
		$image_atf = wp_get_attachment_image_src( $p['image_id'], 'xxl' );
	  $image_xxl = wp_get_attachment_image_src( $p['image_id'], 'xxl' );
	  $image_xl = wp_get_attachment_image_src( $p['image_id'], 'xl' );
	  $image_lg = wp_get_attachment_image_src( $p['image_id'], 'lg' );
	  
		?>
		
			<?php if ( $first ) { ?>
				<div class="slick-fold">
				  <div class="fold-slide slide-1">
					  <img alt="<?php if (isset($p['alt'])){ echo $p['alt']; } else { echo 'Slideshow Image'; } ?>" src="<?php echo $image_atf[0]; ?>" srcset="<?php echo $image_lg[0]; ?> 500w, <?php echo $image_xl[0]; ?> 700w, <?php echo $image_xxl[0]; ?> 1300w, <?php echo $image_atf[0]; ?> 3000w" sizes="100vw,(min-width: 300px) 700px,(min-width: 700px) 1300px,(min-width: 1300px) 1800px" />
						<div class="fold-overlay" style="background-color: rgba(0,0,0,.<?php echo $slider_overlay; ?>);"></div>
				    <div class="hp-fold-text <?php if($slide_one_alignment != ''){ echo $slide_one_alignment; } ?>">
						<?php if ($p['title']) : ?>
							<h2><?php echo $p['title']; ?></h2>
						<?php endif; ?>
						<?php if(isset($p['excerpt'])){ ?><p><?php echo $p['excerpt']; ?></p><?php }else{ echo "<br/>"; } ?>
				      <a href="<?php echo $p['url']; ?>" class="btn solid"><?php echo $p['cta']; ?></a>
				    </div>
				  </div> 
		  	</div> 
		  <?php $first = false; } else { ?>
	  
			<div class="tri-fold-block">
			<div class="fold-overlay" style="background-color: rgba(0,0,0,.<?php echo $slider_overlay; ?>);"></div>
				<a href="<?php echo $p['url']; ?>" class="tri-block">
					<img alt="<?php if (isset($p['alt'])){ echo $p['alt']; } else { echo 'Slideshow Image'; } ?>" src="<?php echo $image_lg[0]; ?>" />
				</a>
				<a href="<?php echo $p['url']; ?>" class="tri-block-link"><?php echo $p['cta']; ?></a>
		  </div>
		  
		  <?php } ?>
		<?php } ?>           
	  
	</div>

	<?php } //end check for a minimum of 4 slides ?>
