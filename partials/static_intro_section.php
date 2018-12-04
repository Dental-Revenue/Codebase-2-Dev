<?php 
	$instance = $template_args['instance'];
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
?>


<div class="row sm">
  
  <?php
	$raw_headline = get_post_meta(get_the_id(),$instance.'_heading',true);
	$headline = str_replace(array('{','}'), array('<span>','</span>'),$raw_headline);
	$link = get_post_meta(get_the_id(),$instance.'_link',true);
	?>
  
  <h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2>
  <div class="rte">
    <?php echo apply_filters('the_content', get_post_meta(get_the_id(),$instance.'_paragraph',true)); ?>
    <?php if ($link != '') { ?>
			<a href="<?php echo $link; ?>" class="btn solid">Learn More</a>
		<?php } ?>
  </div>    
  
</div>