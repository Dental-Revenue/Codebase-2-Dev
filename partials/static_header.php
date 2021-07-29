<?php $instance = $template_args['instance']; ?>

<?php
	$static_header_text = get_post_meta(get_the_id(),$instance.'_static_header_text',true);

    $static_text_align = get_post_meta(get_the_id(),$instance.'_static_text_align',true);

?>

<h2 class="static-header-styling static-header-styling-align-<?php echo $static_text_align; ?>"><?php echo $static_header_text; ?></h2>