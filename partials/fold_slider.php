<?php
$instance = $template_args['instance']; 
$appearance_info = get_option('appearance_info');
$headline_style = $appearance_info['headline_style'];
$slider_overlay = get_post_meta(get_the_id(), $instance.'_overlay', true);
$font_family = get_post_meta(get_the_id(), $instance.'_import_title_font_family', true);
$font_family_2 = get_post_meta(get_the_id(), $instance.'_import_title_font_family_2', true);
$slider_type = get_post_meta(get_the_id(), $instance.'_type', true);
$slider_height = get_post_meta(get_the_id(), $instance.'_height', true);
?>
<?php if (!empty($font_family)) { ?>
    <style><?php echo $font_family; ?></style>
<?php } ?>
<?php if (!empty($font_family_2)) { ?>
    <style><?php echo $font_family_2; ?></style>
<?php } ?>
<div class="slick-init slick-fold_slider" style="height:<?php echo $slider_height; ?>">
    <?php
    $blocks = get_post_meta(get_the_id(), $instance.'_fold_slides', true);
    foreach ((array) $blocks as $key => $block ) {
        $image_atf = wp_get_attachment_image_src($block['image_id'], 'xxl');
        $image_xxl = wp_get_attachment_image_src($block['image_id'], 'xxl');
        $image_xl = wp_get_attachment_image_src($block['image_id'], 'xl');
        $image_lg = wp_get_attachment_image_src($block['image_id'], 'lg');
        $alignment = $block['alignment'];
        ?>
        <div class="fold-slide">
            <div class="fold-slide-contain" style="height:<?php echo $slider_height; ?>; <?php if (isset($block['bg_color'])) { ?>
            background:<?php if (isset($block['bg_color_2'])) { ?>
            linear-gradient(<?php echo $block['bg_color']; ?>,<?php echo $block['bg_color_2']; ?>)
           <?php } else {
                           echo $block['bg_color'];
           } ?>;
           <?php } ?>">
            <?php if (isset($block['video_webm']) && $block['video_webm']!='' && isset($block['video_mp4']) && $block['video_mp4'] != '') { ?>
                <video class="fold-video" autoplay loop muted data-audio="true" poster="<?php echo $image[0]; ?>">
                    <source src="<?php echo $block['video_webm']; ?>" type="video/webm">
                    <source src="<?php echo $block['video_mp4']; ?>" type="video/mp4">
                </video>
            <?php } else if (isset($block['image_id']) && $block['image_id']!='') { ?>
                <img alt="
                <?php if (isset($block['alt'])) {
                    echo $block['alt'];
                } else {
                    echo 'Slideshow Image';
                } ?>" src="<?php echo $image_atf[0]; ?>" srcset="<?php echo $image_lg[0]; ?> 500w, <?php echo $image_xl[0]; ?> 700w, <?php echo $image_xxl[0]; ?> 1300w, <?php echo $image_atf[0]; ?> 3000w" sizes="100vw,(min-width: 300px) 700px,(min-width: 700px) 1300px,(min-width: 1300px) 1800px" />
            <?php } ?>
            <div class="fold-overlay" style="background-color: rgba(0,0,0,.<?php echo $slider_overlay; ?>);">
            </div>
            <div class="fold-slide-text 
            <?php if ($alignment != '') {
                echo $alignment;
            } ?>">
            <?php if (!empty($block['title'])) {
                if ($key === array_key_first($blocks)) { ?>
                    <h2 style="
                        <?php if (!wp_is_mobile()) { ?>
                            <?php echo $block['title_styling']; ?>
                        <?php } else { ?>
                            <?php echo $block['title_styling_mobile']; ?>
                        <?php } ?>"><?php echo $block['title']; ?>
                    </h2>
                <?php } else { ?>
                    <p style="
                        <?php if (!wp_is_mobile()) { ?>
                            <?php echo $block['title_styling']; ?>
                        <?php } else { ?>
                            <?php echo $block['title_styling_mobile']; ?>
                        <?php } ?>"><?php echo $block['title']; ?>
                    </p>
                <?php } ?>
            <?php } ?>
            <?php if ($block['title_line'] === 'Yes') { ?>
                <hr style="<?php echo $block['title_line_style']; ?>">
            <?php } ?>
            <?php if (!empty($block['subtitle'])) { ?>
                <p class="fold-slider-subtitle 
                <?php if (!empty($block['subtitle']) && $block['subtitle_line'] === 'No') { ?>
                    single_title
                <?php } ?>" style="
                    <?php if (!wp_is_mobile()) { ?>
                        <?php echo $block['subtitle_styling']; ?>
                    <?php } else { ?>
                        <?php echo $block['subtitle_styling_mobile']; ?>
                    <?php } ?>">
                    <?php echo $block['subtitle']; ?></p>
            <?php } ?>
            <?php if ($block['line'] === 'Yes') { ?>
                <hr style="<?php echo $block['line_style']; ?>">
            <?php } ?>
            <?php if (!empty($block['excerpt'])) { ?>
                <p style="
                <?php if (!wp_is_mobile()) { ?>
                    <?php echo $block['excerpt_styling']; ?>
                <?php } else { ?>
                    <?php echo $block['excerpt_styling_mobile']; ?>
                <?php } ?>" class="
                <?php if (!empty($block['subtitle'])&&$block['line'] === 'No') { ?>
                    single_excerpt
                <?php } ?>"><?php echo $block['excerpt']; ?></p>
            <?php } ?>
            <?php if (!empty($block['url'])) { ?>
                <a class="
                <?php if (empty($block['excerpt']) && !empty($block['subtitle'])) { ?>
                    single_btn
                <?php } ?> btn solid" href="<?php echo $block['url']; ?>"><?php echo $block['cta']; ?></a>
            <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
</div>