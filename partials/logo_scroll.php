<?php
$instance = $template_args['instance'];
$images = get_post_meta( get_the_ID(), $instance.'_common_images', 1 );
$entries = get_post_meta( get_the_ID(), $instance.'_images', 1 ); 
$paddingtop = get_post_meta( get_the_ID(), $instance.'_paddingtop', 1 );
$paddingbottom = get_post_meta( get_the_ID(), $instance.'_paddingbottom', 1 );
?>

<div class="row" style="padding-top:<?php echo $paddingtop; ?>;padding-bottom:<?php echo $paddingbottom; ?>">
<?php
if ($images != '') { foreach ( (array) $images as $image ) {?><img src="<?php echo $image; ?>" alt="logo image" /><?php } } ?><?php if ($entries != '') { foreach ( (array) $entries as $attachment_id => $attachment_url ) { $img = wp_get_attachment_image_src( $attachment_id, 'logo' );?><img src="<?php echo $img[0]; ?>" alt="logo image" /><?php } } ?>
</div>
