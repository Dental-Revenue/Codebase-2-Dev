<?php
$instance = $template_args['instance']; 
$appearance_info = get_option('appearance_info');
$shorty_code = get_post_meta(get_the_id(), $instance.'_shorty_code', true);
echo do_shortcode($shorty_code);
?>
