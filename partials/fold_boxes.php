<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];

	$boxes = get_post_meta( get_the_ID(),$instance.'_fold_boxes', true );
	if(sizeof($boxes)<4){ echo "<p>The slice style ATF requires a minimum of 4 slides</p>"; } else {
	$slider_height = get_post_meta(get_the_id(),$instance.'_height',true);
		?>

	<div id="hp-fold" class="fold-panel" style="height:<?php echo $slider_height; ?>;">
	  
	  
	  <?php $first = true;
		foreach((array) $boxes as $p ) {
		$image = wp_get_attachment_image_src($p['image_id'],'xxl');
		?>
		
			<?php if ( $first ) { ?>
				<div class="slick-fold">
				  <div class="fold-slide slide-1" style="background-image: url(<?php echo $image[0]; ?>);">
						<div class="fold-overlay" style="background-color: rgba(0,0,0,.4);"></div>
				    <div class="hp-fold-text">
							<h2><?php echo $p['title']; ?></h2>
							<?php if(isset($p['excerpt'])){ ?><p><?php echo $p['excerpt']; ?></p><?php }else{ echo "<br/>"; } ?>
				      <a href="<?php echo $p['url']; ?>" class="btn solid"><?php echo $p['cta']; ?></a>
				    </div>
				  </div> 
		  	</div> 
		  <?php $first = false; } else { ?>
	  
			<div class="tri-fold-block">
				<div class="fold-overlay" style="background-color: rgba(0,0,0,.4);"></div>
				<a href="<?php echo $p['url']; ?>" class="tri-block" style="background-image: url(<?php echo $image[0]; ?>);"></a>
				<a href="<?php echo $p['url']; ?>" class="tri-block-link"><?php echo $p['cta']; ?></a>
		  </div>
		  
		  <?php } ?>
		<?php } ?>           
	  
	</div>

	<?php } //end check for a minimum of 4 slides ?>