<?php
$appearance_info = get_option('appearance_info');
$header_style = $appearance_info['nav_style'];
$header_items = $appearance_info['header_items'];
$extra_header_classes = '';
if (!empty(site_ops_notification_message(false))) { 
    if (empty(site_ops_notification_timestamp(false)) || site_ops_notification_timestamp(false) > time()) {
        $extra_header_classes .= ' notification-active';
    }
}
//set up defaults
$option = get_option('appearance_info');
$header_color = $option['nav_color'];
$lightness = getColorLightness($header_color);
$alternate_nav_color = $option['alternate_nav_color'];
$alternate_nav_text_color = $option['alternate_nav_text_color'];
$header_text_color = $option['header_text_color'];
$popup = $option['cta_popup'];
$left_btn_text = $option['left_btn_text'];
$right_btn_text = $option['right_btn_text'];
$left_btn_url = $option['left_btn_url'];
$right_btn_url = $option['right_btn_url'];
$left_btn_bckgrnd_color = $option['left_btn_bckgrnd_color'];
$left_btn_txt_color = $option['left_btn_txt_color'];
$right_btn_bckgrnd_color = $option['right_btn_bckgrnd_color'];
$right_btn_txt_color = $option['right_btn_txt_color'];
?>
<header class="header
    <?php
    echo $extra_header_classes;
    if ($lightness<700) {
        echo "invert";
    } ?>
    ">
    <?php
    if (!empty(site_ops_notification_message(false))) {
        if (empty(site_ops_notification_timestamp(false)) || site_ops_notification_timestamp(false) > time()) {
            $notification_invert_color = getColorLightness()<700 ? ' invert' : '' ;
            ?>
            <div class="header-notification<?php echo $notification_invert_color; ?>">
                <div class="row">
                    <p><?php site_ops_notification_message(); ?></p>
                </div>
            </div>
            <?php
        }
    }
    do_action('before_header');
    if ($header_style == 'header-style-a') {
        ?>
        <div class="header-logo">
        <?php if (is_front_page()) {?>
            <h1>
        <?php } ?>
        <a href="/" class="logo"><img src="<?php site_ops_logo(); ?>" alt="<?php site_ops_practice_name(); ?>" /></a>
        <?php if (is_front_page()) {?>
            </h1>
        <?php } ?>
        </div>
        <div class="header-top">
            <div class="row full">
                <div class="header-contact">
                    <?php
                    if (!empty(site_ops_new_patient_phone(false))) {
                        ?>
                        <div class="contact-option">
                            <i class="fas fa-phone fa-flip-horizontal"></i>
                            <p>New Patients <span class="bold tracknum"><?php site_ops_new_patient_phone(); ?></span></p>
                        </div>
                        <?php
                    }
                    if (!empty(site_ops_current_patient_phone(false)) && in_array("current_patient", $header_items)) {
                        ?>
                        <div class="contact-option">
                            <i class="fas fa-phone fa-flip-horizontal"></i>
                            <p>Current Patients <span class="bold"><?php site_ops_current_patient_phone(); ?></span></p>
                        </div>
                        <?php
                    }
                    if (!empty(site_ops_address(false)) && in_array("address", $header_items)) { 
                        ?>
                        <div class="contact-option street-address">
                            <i class="fas fa-map-marker-alt"></i>
                            <p><?php site_ops_address(); ?> <span class="bold"><?php echo site_ops_city(false).', '.site_ops_state(false).' '.site_ops_zip(false); ?></span></p>
                        </div> 
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="row full">
                <nav class="large-nav">
                    <?php
                    wp_nav_menu(array('walker' => new Walker_Quickstart_Menu()));
                    if (!empty(site_ops_cta_text(false)) && in_array("cta", $header_items)) {
                        ?>
                        <a href="<?php site_ops_cta_url(); ?>" class="schedule btn sm outline"><?php site_ops_cta_text(); ?></a>
                        <?php
                    }
                    ?>
                </nav>
                <nav class="mobile-nav">
                    <a href="#" id="panel-main"><i class="fas fa-bars"></i><span>Menu</span></a>
                    <?php
                    if (wp_is_mobile()) {
                        ?>
                        <a href="tel:<?php site_ops_new_patient_phone(); ?>"><i class="fas fa-phone"></i><span class="tracknum">Call</span></a>
                        <?php
                    }
                    if (!empty(site_ops_cta_text(false)) && in_array("cta", $header_items)) { 
                        ?>
                        <a href="<?php site_ops_cta_url(); ?>"><i class="far fa-calendar-alt"></i><span>Book</span></a>
                        <?php
                    }
                    ?>
                    <a href="#" id="panel-more"><i class="fas fa-info"></i><span>Contact</span></a>
                </nav>
            </div>
        </div>
        <?php
    } elseif ($header_style == 'header-style-b') { 
        ?>
        <div class="header-style-b-contain">
            <div class="header-logo">
            <?php if (is_front_page()) {?>
            <h1>
        <?php } ?>
        <a href="/" class="logo"><img src="<?php site_ops_logo(); ?>" alt="<?php site_ops_practice_name(); ?>" /></a>
        <?php if (is_front_page()) {?>
            </h1>
        <?php } ?>
            </div>
            <div class="header-bottom">
                <nav class="large-nav">
                    <?php
                    wp_nav_menu(array('walker' => new Walker_Quickstart_Menu()));
                    if (!empty(site_ops_cta_text(false)) && in_array("cta", $header_items)) { 
                        ?>
                        <a href="<?php site_ops_cta_url(); ?>" class="schedule btn sm outline"><?php site_ops_cta_text(); ?></a>
                        <?php
                    }
                    ?>
                </nav>
                <nav class="mobile-nav">
                    <a href="#" id="panel-main"><i class="fas fa-bars"></i><span>Menu</span></a>
                    <?php
                    if (wp_is_mobile()) {
                        ?>
                        <a href="tel:<?php site_ops_new_patient_phone(); ?>"><i class="fas fa-phone"></i><span class="tracknum">Call</span></a>
                        <?php
                    }
                    if (!empty(site_ops_cta_text(false)) && in_array("cta", $header_items)) {
                        ?>
                        <a href="<?php site_ops_cta_url(); ?>"><i class="far fa-calendar-alt"></i><span>Book</span></a>
                        <?php
                    }
                    ?>
                    <a href="#" id="panel-more"><i class="fas fa-info"></i><span>Contact</span></a>
                </nav>
            </div>
        </div>
        <?php
    } elseif ($header_style == 'header-style-c') {
        ?>
        <div class="header-logo">
        <?php if (is_front_page()) {?>
            <h1>
        <?php } ?>
        <a href="/" class="logo"><img src="<?php site_ops_logo(); ?>" alt="<?php site_ops_practice_name(); ?>" /></a>
        <?php if (is_front_page()) {?>
            </h1>
        <?php } ?>
        </div>
        <div class="header-top">
            <div class="row">
                <div class="contact-option street-address">
                    <i class="fas fa-map-marker-alt"></i>
                    <?php
                    if (!empty(site_ops_address(false)) && in_array("address", $header_items)) {
                        ?>
                        <p><?php site_ops_address(); ?> <span class="bold"><?php echo site_ops_city(false).', '.site_ops_state(false).' '.site_ops_zip(false); ?></span></p>
                        <?php
                    }
                    ?>
                </div>
                <?php
                if (!empty(site_ops_current_patient_phone(false)) && in_array("current_patient", $header_items)) {
                    ?>
                    <div class="contact-option">
                        <a href="tel:<?php site_ops_current_patient_phone(); ?>"><i class="fas fa-phone"></i><span>Current Patients </span><span class="bold"><?php site_ops_current_patient_phone(); ?></span></a>
                    </div>
                    <?php
                }
                if (!empty(site_ops_new_patient_phone(false))) { 
                    ?>
                    <div class="contact-option">
                        <a href="tel:<?php site_ops_new_patient_phone(); ?>"><i class="fas fa-phone"></i><span class="tracknum">New Patients </span><span class="bold tracknum"><?php site_ops_new_patient_phone(); ?></span></a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="header-bottom">
            <div class="row full">
                <nav class="large-nav">
                    <?php
                    wp_nav_menu(array('walker' => new Walker_Quickstart_Menu()));
                    if (!empty(site_ops_cta_text(false)) && in_array("cta", $header_items)) {
                        ?>
                        <a href="<?php site_ops_cta_url(); ?>" class="schedule btn sm outline"><?php site_ops_cta_text(); ?></a>
                        <?php
                    }
                    ?>
                </nav>
                <nav class="mobile-nav">
                    <a href="#" id="panel-main"><i class="fas fa-bars"></i><span>Menu</span></a>
                    <?php 
                    if (wp_is_mobile()) {
                        ?>
                        <a href="tel:<?php site_ops_new_patient_phone(); ?>"><i class="fas fa-phone"></i><span class="tracknum">Call</span></a>
                        <?php
                    }
                    if (!empty(site_ops_cta_text(false)) && in_array("cta", $header_items)) {
                        ?>
                        <a href="<?php site_ops_cta_url(); ?>"><i class="far fa-calendar-alt"></i><span>Book</span></a>
                        <?php
                    }
                    ?>
                    <a href="#" id="panel-more"><i class="fas fa-info"></i><span>Contact</span></a>
                </nav>
            </div>
        </div>
        <?php
    } elseif ($header_style == 'header-style-d') {
        ?>
        <div class="header-style-contain">
            <div class="header-logo">
            <?php if (is_front_page()) {?>
            <h1>
        <?php } ?>
        <a href="/" class="logo"><img src="<?php site_ops_logo(); ?>" alt="<?php site_ops_practice_name(); ?>" /></a>
        <?php if (is_front_page()) {?>
            </h1>
        <?php } ?>
            </div>
        </div>
        <div class="header-bottom">
            <nav class="large-nav">
                <?php
                wp_nav_menu(array('walker' => new Walker_Quickstart_Menu()));
                if (!empty(site_ops_cta_text(false)) && in_array("cta", $header_items)) {
                    ?>
                    <a href="<?php site_ops_cta_url(); ?>" class="schedule btn sm outline"><?php site_ops_cta_text(); ?></a>
                    <?php
                }
                ?>
            </nav>
            <nav class="mobile-nav">
                <a href="#" id="panel-main"><i class="fas fa-bars"></i><span>Menu</span></a>
                <?php
                if (wp_is_mobile()) {
                    ?>
                    <a href="tel:<?php site_ops_new_patient_phone(); ?>"><i class="fas fa-phone"></i><span class="tracknum">Call</span></a>
                    <?php
                }
                if (!empty(site_ops_cta_text(false)) && in_array("cta", $header_items)) {
                    ?>
                    <a href="<?php site_ops_cta_url(); ?>"><i class="far fa-calendar-alt"></i><span>Book</span></a>
                    <?php
                }
                ?>
                <a href="#" id="panel-more"><i class="fas fa-info"></i><span>Contact</span></a>
            </nav>
        </div>
        <div class="header-top">
            <?php
            if (!empty(site_ops_address(false)) && in_array("address", $header_items)) {
                ?>
                <div class="contact-option street-address">
                    <i class="fas fa-map-marker-alt"></i>
                    <p><?php site_ops_address(); ?> <span class="bold"><?php echo site_ops_city(false).', '.site_ops_state(false).' '.site_ops_zip(false); ?></span></p>
                </div>
                <?php
            }
            if (!empty(site_ops_current_patient_phone(false)) && in_array("current_patient", $header_items)) {
                ?>
                <div class="contact-option">
                    <a href="tel:<?php site_ops_current_patient_phone(); ?>"><i class="fas fa-phone"></i><span>Current Patients </span><span class="bold"><?php site_ops_current_patient_phone(); ?></span></a>
                </div>
                <?php
            }
            if (!empty(site_ops_new_patient_phone(false))) {
                ?>
                <div class="contact-option">
                    <a href="tel:<?php site_ops_new_patient_phone(); ?>"><i class="fas fa-phone"></i><span class="tracknum">New Patients </span><span class="bold tracknum"><?php site_ops_new_patient_phone(); ?></span></a>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    } elseif ($header_style == 'header-style-e') {
        ?>
            <div class="header-logo">
            <?php if (is_front_page()) {?>
            <h1>
        <?php } ?>
        <a href="/" class="logo"><img src="<?php site_ops_logo(); ?>" alt="<?php site_ops_practice_name(); ?>" /></a>
        <?php if (is_front_page()) {?>
            </h1>
        <?php } ?>
                <a href="#" id="panel-main"><i class="fas fa-bars"></i></a>
            </div>
            <div class="header-top">
                <ul>
                    <li class="new-phone">New Patients Call <span class="tracknum"><?php site_ops_new_patient_phone(); ?></span></li>
                    <?php
                    if (!empty(site_ops_current_patient_phone(false)) && in_array("current_patient", $header_items)) {
                        ?>
                        <li class="new-phone">Current Patients Call <span><?php site_ops_current_patient_phone(); ?></span></li>
                        <?php
                    }
                    ?>
                    <li><a href="<?php site_ops_cta_url(); ?>" class="schedule"><?php site_ops_cta_text(); ?></a></li>
                    <?php if (!empty(site_ops_facebook(false))) { ?>
                        <li><a href="<?php site_ops_facebook(); ?>" target="_blank" rel="noopener" aria-label="facebook link"><i class="fab fa-facebook-f"></i></a></li>
                    <?php } ?>
                    <?php if (!empty(site_ops_twitter(false))) { ?>
                        <li><a href="<?php site_ops_twitter(); ?>" target="_blank" rel="noopener" aria-label="twitter link"><i class="fab fa-twitter"></i></a></li>
                    <?php } ?>
                    <?php if (!empty(site_ops_linkedin(false))) { ?>
                        <li><a href="<?php site_ops_linkedin(); ?>" target="_blank" rel="noopener" aria-label="linkedin link"><i class="fab fa-linkedin-in"></i></a></li>
                    <?php } ?>
                    <?php if (!empty(site_ops_instagram(false))) { ?>
                        <li><a href="<?php site_ops_instagram(); ?>" target="_blank" rel="noopener" aria-label="instagram link"><i class="fab fa-instagram"></i></a></li>
                    <?php } ?>
                    <?php if (!empty(site_ops_google_plus(false))) { ?>
                        <li><a href="<?php site_ops_google_plus(); ?>" target="_blank" rel="noopener" aria-label="google plus link"><i class="fab fa-google-plus-g"></i></a></li>
                    <?php } ?>
                    <?php if (!empty(site_ops_youtube(false))) { ?>
                        <li><a href="<?php site_ops_youtube(); ?>" target="_blank" rel="noopener" aria-label="youtube link"><i class="fab fa-youtube"></i></a></li>
                    <?php } ?>
                    <?php if (!empty(site_ops_yelp(false))) { ?>
                        <li><a href="<?php site_ops_yelp(); ?>" target="_blank" rel="noopener" aria-label="yelp link"><i class="fab fa-yelp"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="header-bottom">
                <nav class="large-nav">
                    <?php 
                    wp_nav_menu(array('walker' => new Walker_Quickstart_Menu()));
                    ?>
                </nav>
                <nav class="mobile-nav">
                    <div class="contact-dropwdown">
                        <a class="drop-link" href="">Contact Us <i class="fa fa-caret-down"></i></a>
                        <div class="drop-content" style="display: none;">
                            <a href="tel:<?php site_ops_new_patient_phone(); ?>"><i class="fas fa-phone"></i><span>New Patients </span><span class="bold tracknum"><?php site_ops_new_patient_phone(); ?></span></a>
                            <a href="tel:<?php site_ops_current_patient_phone(); ?>"><i class="fas fa-phone"></i><span>Current Patients </span><span class="bold"><?php site_ops_current_patient_phone(); ?></span></a>
                            <a href="<?php site_ops_cta_url(); ?>"><?php site_ops_cta_text(); ?></a>
                            <a href="/leave-a-review/">Leave a Review</a>
                        </div>
                    </div>
                </nav>
            </div>
            <?php
    } else {
        if ($option['alternate_nav_review_url'] || $option['alternate_nav_links']) {
            ?>
                <div id="alternate-nav" style="background-color: <?php echo $alternate_nav_color; ?>">
                    <div class="alternate-left">
                        <a href="<?php echo $option['alternate_nav_review_url']; ?>" style="color: <?php echo $alternate_nav_text_color; ?>">Write a Review</a>
                    </div>
                    <div class="alternate-right">
                        <?php 
                        $alternate_nav_links = alternateNavLinks(true);
                        foreach ( (array) $alternate_nav_links as $key => $link ) {
                            ?>
                            <a href="<?= $link['alternate_nav_link_url'] ?>" style="color: <?php echo $alternate_nav_text_color; ?>"><?= $link['alternate_nav_link_text'] ?></a>
                        <?php } ?>
                    </div>
                </div>
            <?php
        }
        ?>
        <div class="header-logo">
            <?php if (is_front_page()) {?>
                <h1>
            <?php } ?>
            <a href="/" class="logo"><img src="<?php site_ops_logo(); ?>" alt="<?php site_ops_practice_name(); ?>" /></a>
            <?php if (is_front_page()) {?>
                </h1>
            <?php } ?>
        </div>
        <div class="header-top" style="background-color: <?php echo $header_color; ?>">
            <p class="patient-number" style="color: <?php echo $header_text_color; ?>">New Patients: <span class="tracknum"><?php site_ops_new_patient_phone(); ?></span></p>
            <?php
            if (!empty(site_ops_current_patient_phone(false)) && in_array("current_patient", $header_items)) {
                ?>
                <p class="patient-number" style="color: <?php echo $header_text_color; ?>">Current Patients: <?php site_ops_current_patient_phone(); ?></span></li>
                <?php
            }
            ?>
            <ul class="social">
                <?php if (!empty(site_ops_facebook(false))) { ?>
                    <li style="color: <?php echo $header_text_color; ?>"><a href="<?php site_ops_facebook(); ?>" target="_blank" rel="noopener" aria-label="facebook link"><i class="fab fa-facebook-f"></i></a></li>
                <?php } ?>
                <?php if (!empty(site_ops_twitter(false))) { ?>
                    <li style="color: <?php echo $header_text_color; ?>"><a href="<?php site_ops_twitter(); ?>" target="_blank" rel="noopener" aria-label="twitter link"><i class="fab fa-twitter"></i></a></li>
                <?php } ?>
                <?php if (!empty(site_ops_linkedin(false))) { ?>
                    <li style="color: <?php echo $header_text_color; ?>"><a href="<?php site_ops_linkedin(); ?>" target="_blank" rel="noopener" aria-label="linkedin link"><i class="fab fa-linkedin-in"></i></a></li>
                <?php } ?>
                <?php if (!empty(site_ops_instagram(false))) { ?>
                    <li style="color: <?php echo $header_text_color; ?>"><a href="<?php site_ops_instagram(); ?>" target="_blank" rel="noopener" aria-label="instagram link"><i class="fab fa-instagram"></i></a></li>
                <?php } ?>
                <?php if (!empty(site_ops_google_plus(false))) { ?>
                    <li style="color: <?php echo $header_text_color; ?>"><a href="<?php site_ops_google_plus(); ?>" target="_blank" rel="noopener" aria-label="google plus link"><i class="fab fa-google-plus-g"></i></a></li>
                <?php } ?>
                <?php if (!empty(site_ops_youtube(false))) { ?>
                    <li style="color: <?php echo $header_text_color; ?>"><a href="<?php site_ops_youtube(); ?>" target="_blank" rel="noopener" aria-label="youtube link"><i class="fab fa-youtube"></i></a></li>
                <?php } ?>
                <?php if (!empty(site_ops_yelp(false))) { ?>
                    <li style="color: <?php echo $header_text_color; ?>"><a href="<?php site_ops_yelp(); ?>" target="_blank" rel="noopener" aria-label="yelp link"><i class="fab fa-yelp"></i></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="header-bottom">
            <div class="row full">
                <nav class="large-nav">
                <?php
                    wp_nav_menu(array('walker' => new Walker_Quickstart_Menu()));
                ?>
                </nav>
                <nav class="mobile-nav">
                    <a href="#" id="panel-main"><i class="fas fa-bars"></i><span>Menu</span></a>                        
                    <?php if (wp_is_mobile()) { ?>
                        <a href="tel:<?php site_ops_new_patient_phone(); ?>"><i class="fas fa-phone"></i><span class="tracknum">Call</span></a>
                    <?php }                        
                    if (!empty(site_ops_cta_text(false)) && in_array("cta", $header_items)) { ?>
                        <a href="<?php site_ops_cta_url(); ?>"><i class="far fa-calendar-alt"></i><span>Book</span></a>
                    <?php } ?>
                    <a href="#" id="panel-more"><i class="fas fa-info"></i><span>Contact</span></a>
                </nav>
            </div>
        </div>
        <div class="option-container">
            <?php
            if ($left_btn_text) {
                ?>
                <a class="btn solid" href="<?php echo $btn_one_url; ?>" style="background-color: <?php echo $left_btn_bckgrnd_color; ?>; color: <?php echo $left_btn_txt_color; ?>"><?php echo $left_btn_text; ?></a>
                <?php
            }
            if ($right_btn_text) {
                ?>
                <a class="btn solid" href="<?php echo $btn_two_url; ?>"  style="background-color: <?php echo $right_btn_bckgrnd_color; ?>; color: <?php echo $right_btn_txt_color; ?>"><?php echo $right_btn_text; ?></a>
                <?php
            }
            ?>
        </div>
    <?php
    }
    do_action('after_header');
    ?>
</header>









