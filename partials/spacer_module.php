<?php
$instance = $template_args['instance'];
$padding = get_post_meta(get_the_id(), $instance.'_padding', true);
?>
<div class="row" style="padding-bottom: <?php echo $padding; ?>px;"></div>