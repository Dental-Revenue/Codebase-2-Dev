<?php $instance = $template_args['instance']; ?>


<div class="row">
	
	<?php
  $headline = get_post_meta(get_the_id(), $instance.'_breaker_text', true);
  $subtitle = get_post_meta(get_the_ID(), $instance.'_subtitle', true);
	
	$button_text = get_post_meta(get_the_id(),$instance.'_breaker_button_text',true);
	$button_url = get_post_meta(get_the_id(),$instance.'_breaker_button_url',true);
  ?>
  <?php if ($headline) : ?>
    <h2 class="hp-headline"><?php echo $headline; ?></h2>
  <?php endif; ?>
  <?php if ($subtitle) : ?>
    <p class="module-subtitle"><?php echo $subtitle; ?></p>
  <?php endif; ?>
  <?php if ($button_url != ''){?><a href="<?php echo $button_url; ?>" class="btn"><?php echo $button_text; ?></a><?php } ?>
	
</div>