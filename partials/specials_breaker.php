<?php $instance = $template_args['instance'];
	$items = get_post_meta(get_the_id(),$instance.'_items',true);
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	
    $headline = get_post_meta(get_the_id(),$instance.'_specials_breaker_headline',true);
	$subtitle = get_post_meta(get_the_ID(), $instance.'_subtitle', true);
	
  $specials_text = get_post_meta(get_the_id(),$instance.'_specials_breaker_text',true);
	
	$button_text = get_post_meta(get_the_id(),$instance.'_specials_breaker_button_text',true);
	$button_url = get_post_meta(get_the_id(),$instance.'_specials_breaker_button_url',true);	
	$paragraph_mobile = get_post_meta(get_the_id(),$instance.'_paragraph_mobile',true);	
?>
<?php if($paragraph_mobile === 'no' && wp_is_mobile()) { ?><style>.specials_breaker h2:after {margin-bottom: 15px;}</style><?php } ?>
<div class="row">
  <?php if(!empty($headline)){ ?><h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2><?php } ?>
  <?php if ($subtitle) : ?>
    <p class="sb-subtitle <?php echo $headline_style; ?>"><?php echo $subtitle; ?></p>
  <?php endif; ?>
  <?php if(!empty($specials_text) && !wp_is_mobile() ){ ?><p><?php echo $specials_text; ?></p><?php } ?><?php if( wp_is_mobile() && $paragraph_mobile === 'yes' && !empty($specials_text) ){ ?><p><?php echo $specials_text; ?></p><?php } ?>
  <?php if ($button_url != ''){?><a href="<?php echo $button_url; ?>" class="btn"><?php echo $button_text; ?></a><?php } ?>
</div>