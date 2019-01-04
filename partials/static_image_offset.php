<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
?>


<div class="static_image_offset">
	
	<?php
	$image = get_post_meta(get_the_id(),$instance.'_left_side_image',true);	
  $raw_headline = get_post_meta(get_the_id(),$instance.'_headline',true);
	$headline = str_replace(array('{','}'), array('<span>','</span>'),$raw_headline);
	
	$content = get_post_meta(get_the_id(),$instance.'_left_side_content',true);
	?>

 

</div>