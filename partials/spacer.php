<?php
$instance = $template_args['instance'];
$margin = get_post_meta(get_the_id(), $instance.'_margin', true);
?>
<div class="row" style="margin-top: <?php echo $margin; ?>px;"></div>