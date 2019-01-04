<?php $instance = $template_args['instance']; ?>


<div class="row">
	
	<?php
  $raw_headline = get_post_meta(get_the_id(),$instance.'_specials_breaker_text',true);
	$headline = str_replace(array('{','}'), array('<span>','</span>'),$raw_headline);
	
	$button_text = get_post_meta(get_the_id(),$instance.'_specials_breaker_button_text',true);
	$button_url = get_post_meta(get_the_id(),$instance.'_specials_breaker_button_url',true);
  ?>
  
  <h2 class="hp-headline"><?php echo $headline; ?></h2>
  <?php if ($button_url != ''){?><a href="<?php echo $button_url; ?>" class="btn"><?php echo $button_text; ?></a><?php } ?>
	
</div>