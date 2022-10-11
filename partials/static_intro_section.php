<?php
    $instance = $template_args['instance'];
    $appearance_info = get_option('appearance_info');
    $headline_style = $appearance_info['headline_style'];

    $paragraph = get_post_meta(get_the_id(), $instance.'_paragraph', true);
    //$paragraph = apply_filters('the_content', get_post_meta(get_the_id(),$instance.'_paragraph',true));
    $paragraph_mobile = get_post_meta(get_the_id(), $instance.'_paragraph_mobile', true);
?>
<?php if ($paragraph_mobile === 'no' && wp_is_mobile()) { ?>
    <style>.static_intro_section h2:after {margin-bottom: 15px;}</style>
<?php } ?>
<div class="row sm">
  
<?php
    $headline = get_post_meta(get_the_id(), $instance.'_heading', true);
    $subtitle = get_post_meta(get_the_ID(), $instance.'_subtitle', true);
    $link = get_post_meta(get_the_id(), $instance.'_link', true);
?>
<?php if ($headline) : ?>
    <h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2>
<?php endif; ?>
<?php if ($subtitle) : ?>
    <p class="sisection-subtitle <?php echo $headline_style; ?>"><?php echo $subtitle; ?></p>
<?php endif; ?>
<div class="rte">
    <?php if (!empty($paragraph) && !wp_is_mobile() ) { ?>
        <p><?php echo $paragraph; ?></p>
    <?php } ?>
    <?php if (wp_is_mobile() && $paragraph_mobile === 'yes' && !empty($paragraph) ) { ?>
        <p><?php echo $paragraph; ?></p>
    <?php } ?>
    <?php if ($link != '') { ?>
        <a href="<?php echo $link; ?>" class="btn solid">Learn More</a>
    <?php } ?>
  </div>    
  
</div>