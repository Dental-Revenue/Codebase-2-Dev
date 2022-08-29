<?php
$instance = $template_args['instance']; 
$appearance_info = get_option('appearance_info');
$headline_style = $appearance_info['headline_style'];
$slices = get_post_meta(get_the_ID(), $instance.'_fold_slices', true);
if (sizeof($slices)<3) {
    echo "<p>The slice style ATF requires a minimum of 3 slides</p>";
} else {
    $num_slices = sizeof($slices)-1;
    $slice_width = (40/$num_slices);
    $slider_height = get_post_meta(get_the_id(), $instance.'_height', true);
    ?>        
    <div id="hp-fold" class="fold-slices" data-slice="<?php echo $slice_width; ?>">        
        <?php $counter=0;
        foreach ((array) $slices as $s ) {
            if (isset($s['overlay_darkness'])) {
                $overlay = $s['overlay_darkness'];
            } else {
                $overlay = 30;
            }
            $image_atf = wp_get_attachment_image_src($s['image_id'], 'xxl');
            $image_xxl = wp_get_attachment_image_src($s['image_id'], 'xxl');
            $image_xl = wp_get_attachment_image_src($s['image_id'], 'xl');
            $image_lg = wp_get_attachment_image_src($s['image_id'], 'lg');          
            $alignment = $s['alignment'];
            ?>            
            <div class="fold-slice 
            <?php if ($counter==0) {
                echo 'active';
            } ?>" style="height:<?php echo $slider_height; ?>">                
                <?php if (isset($s['video_webm']) && $s['video_webm']!='' && isset($s['video_mp4']) && $s['video_mp4']!='') { ?>
                    <video class="fold-video" autoplay loop muted data-audio="true" poster="<?php echo $image[0]; ?>">
                        <source src="<?php echo $s['video_webm']; ?>" type="video/webm">
                        <source src="<?php echo $s['video_mp4']; ?>" type="video/mp4">
                    </video>
                <?php } else { ?>
                    <img alt="
                    <?php if (isset($s['alt'])) {
                        echo $s['alt'];
                    } else {
                        echo 'Slideshow Image';
                    } ?>" src="<?php echo $image_atf[0]; ?>" srcset="<?php echo $image_lg[0]; ?> 500w, <?php echo $image_xl[0]; ?> 700w, <?php echo $image_xxl[0]; ?> 1300w, <?php echo $image_atf[0]; ?> 3000w" sizes="100vw,(min-width: 300px) 700px,(min-width: 700px) 1300px,(min-width: 1300px) 1800px" />
                <?php } ?>                
                <div class="fold-overlay" style="background-color: rgba(0,0,0,<?php echo $overlay/100; ?>);">
                </div>
                <div class="fold-slice-content 
                <?php if ($alignment != '') {
                    echo $alignment;
                } ?>">
                <?php if ($s['title']) : ?>
                    <?php if ($counter == 0) { ?>
                        <h2><?php echo $s['title']; ?></h2>
                    <?php } else { ?>
                        <p><?php echo $s['title']; ?></p>
                    <?php } ?>
                <?php endif; ?>
                <?php if (isset($s['excerpt'])) {
                    ?><p><?php echo $s['excerpt']; ?></p>
                <?php } else {
                    echo "<br/>";
                } ?>
                <?php if (isset($s['url']) && isset($s['cta'])) {
                    ?><a class="btn solid" href="<?php echo $s['url']; ?>"><?php echo $s['cta']; ?></a>
                <?php } ?>
                </div>
            </div>    
            <?php $counter++;
        } ?>      
    </div>    
    <div id="hp-fold" class="fold-slices-mobile">
        <div class="fold-slices-slick">"
        <?php $counter=0;
        $slides = get_post_meta(get_the_ID(), $instance.'_fold_slices', true);
        foreach ((array) $slides as $slide ) {
            if (isset($slide['overlay_darkness'])) {
                $overlay = $slide['overlay_darkness'];
            } else {
                $overlay = 30;
            }
            $image_atf = wp_get_attachment_image_src($slide['image_id'], 'xxl');
            $image_xxl = wp_get_attachment_image_src($slide['image_id'], 'xxl');
            $image_xl = wp_get_attachment_image_src($slide['image_id'], 'xl');
            $image_lg = wp_get_attachment_image_src($slide['image_id'], 'lg');          
            $alignment = $slide['alignment'];
            ?>            
            <div class="fold-slice" style="background-image: url(<?php echo $image[0]; ?>);height:<?php echo $slider_height; ?>">                
                <?php if (isset($slide['video_webm']) && $slide['video_webm']!='' && isset($slide['video_mp4']) && $slide['video_mp4']!='') { ?>
                    <video class="fold-video" autoplay loop muted data-audio="true" poster="<?php echo $image[0]; ?>">
                        <source src="<?php echo $slide['video_webm']; ?>" type="video/webm">
                        <source src="<?php echo $slide['video_mp4']; ?>" type="video/mp4">
                    </video>
                <?php } else { ?>
                    <img alt="
                    <?php if (isset($slide['alt'])) {
                        echo $s['alt'];
                    } else {
                        echo 'Slideshow Image';
                    } ?>" src="<?php echo $image_atf[0]; ?>" srcset="<?php echo $image_lg[0]; ?> 500w, <?php echo $image_xl[0]; ?> 700w, <?php echo $image_xxl[0]; ?> 1300w, <?php echo $image_atf[0]; ?> 3000w" sizes="100vw,(min-width: 300px) 700px,(min-width: 700px) 1300px,(min-width: 1300px) 1800px" />
                <?php  } ?>                
                <div class="fold-overlay" style="background-color: rgba(0,0,0,<?php echo $overlay/100; ?>);">
                </div>
                <div class="fold-slice-content 
                    <?php if ($alignment != '') {
                        echo $alignment;
                    } ?>">
                    <?php if ($slide['title']) : ?>
                        <?php if ($counter == 0) { ?>
                            <h2><?php echo $s['title']; ?></h2>
                        <?php } else { ?>
                            <p><?php echo $s['title']; ?></p>
                        <?php } ?>
                    <?php endif; ?>
                    <?php if (isset($slide['excerpt'])) {
                        ?><p><?php echo $slide['excerpt']; ?></p>
                    <?php } else {
                        echo "<br/>";
                    } ?>
                    <?php if (isset($slide['url']) && isset($slide['cta'])) { ?>
                        <a class="btn solid" href="<?php echo $slide['url']; ?>"><?php echo $slide['cta']; ?></a>
                    <?php } ?>
                </div>
            </div>    
            <?php $counter++;
        } ?>
        </div>
    </div>
<?php } //end check for a minimum of 3 slides ?>