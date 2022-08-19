<?php
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	$title = get_post_meta( get_the_ID(), $instance.'_title', true ); 
	$cta_title = get_post_meta( get_the_ID(), $instance.'_cta_title', true ); 
	$cta_subtitle = get_post_meta( get_the_ID(), $instance.'_cta_subtitle', true ); 
	$cta_excerpt = get_post_meta( get_the_ID(), $instance.'_cta_excerpt', true ); 
	$cta_align = get_post_meta( get_the_ID(), $instance.'_cta_alignment', true );
	?>
<?php if ($title) : ?>
		<h2 class="<?php echo $headline_style; ?>"><?php echo $title; ?></h2>
	<?php endif; ?>

<div class="row">
	<div class="static_cta_fold-content<?php if(!empty($cta_align)){ echo ' '.$cta_align; } ?>">
		<?php if ($cta_title || $cta_subtitle) : ?>
			<h3><?php echo $cta_title; if(!empty($cta_subtitle)){ echo '<span>'.$cta_subtitle.'</span>'; } ?></h3>
		<?php endif; ?>
		<?php echo wpautop($cta_excerpt); ?>
		
		<?php
		$buttons = get_post_meta(get_the_id(),$instance.'_buttons',true);
		foreach ((array) $buttons as $key => $button ) {
		$button_title = $button_link = '';
		if(isset($button['title'])){ $button_title = $button['title']; }
		if(isset($button['link'])){ $button_link = $button['link']; }
		?>
		<a href="<?php echo $button_link; ?>" class="btn solid"><?php echo $button_title; ?></a>
		<?php } ?>
	
	</div>
</div>