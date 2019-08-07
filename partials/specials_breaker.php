<?php 
	$instance = $template_args['instance']; 
	$items = get_post_meta(get_the_id(),$instance.'_items',true);
	$button_text = get_post_meta(get_the_id(),$instance.'_specials_breaker_button_text',true);
	$button_url = get_post_meta(get_the_id(),$instance.'_specials_breaker_button_url',true);	
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	$raw_title = get_post_meta(get_the_id(),$instance.'_title',true);
	$maintitle = str_replace(array('(',')'), array("<h2 class='$headline_style'>","</h2>"),$raw_title);
	$subtitle = str_replace(array('{','}'), array('<h3>','</h3>'),$maintitle);
	$title = str_replace(array('[',']'), array('<p>','</p>'),$subtitle);
?>
<div class="section-title"><?php echo $title; ?></div>
<?php if ($button_url != ''){?><a href="<?php echo $button_url; ?>" class="btn"><?php echo $button_text; ?></a><?php } ?>
