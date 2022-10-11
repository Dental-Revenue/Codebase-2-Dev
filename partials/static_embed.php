<?php
$instance = $template_args['instance'];
$appearance_info = get_option( 'appearance_info');
$headline_style = $appearance_info['headline_style'];
$headline = get_post_meta(get_the_id(),$instance.'_heading',true);
$subtitle = get_post_meta(get_the_ID(), $instance.'_subtitle', true);
$video_thumbnail = get_post_meta(get_the_id(),$instance.'_static_embed_image',true);
$video_link = get_post_meta(get_the_id(),$instance.'_link',true);
$additional_text = get_post_meta(get_the_id(),$instance.'_additional-text',true);
$embedtype = get_post_meta(get_the_id(),$instance.'_embedtype',true);
if ($embedtype === 'youtube') { $embedicon = "play"; } elseif ($embedtype === 'image') { $embedicon = "none"; } else { $embedicon = "plus"; }
$btn_text = get_post_meta(get_the_id(),$instance.'_btntext',true);
$btn_link = get_post_meta(get_the_id(),$instance.'_btnlink',true);
$randomnumber = rand(1,100);
?>

<?php if(!empty($headline)){ ?><h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2><?php } ?>
<?php if ($subtitle) : ?>
    <p class="se-subtitle <?php echo $headline_style; ?>"><?php echo $subtitle; ?></p>
  <?php endif; ?>
<div class="embed-container">
<a class="popup-<?php echo $embedtype ?><?php if ($embedtype === 'custom') { echo "-" . $randomnumber; } ?> embed-button-<?php echo $embedicon; ?> embed-button-overlay embed-button-bg" <?php if ($embedtype !== 'custom') { echo 'href="' . $video_link . '"'; } ?>><img src="<?php echo $video_thumbnail; ?>"></a>
</div>
<?php if(!empty($additional_text)){ ?><p style="margin-bottom: 0px;"><?php echo $additional_text; ?></p><?php } ?>
<?php if(!empty($btn_link)){ ?><a class="<?php //if(empty($block['excerpt'])&&!empty($block['title'])){ ?>single_btn<?php //} ?> btn solid" href="<?php echo $btn_link; ?>"><?php echo $btn_text; ?></a><?php } ?>

<?php if ($embedtype === 'custom') { ?>
<script>
 document.addEventListener('DOMContentLoaded', function() {
    $('.popup-<?php echo $embedtype . "-" . $randomnumber; ?>').magnificPopup({
        preloader: false,
        modal: false,
        items: {
            src: '<?php echo $video_link; ?>',
            type: 'inline',
        },
        type: 'image'
      });
 });
</script>
<?php } ?>