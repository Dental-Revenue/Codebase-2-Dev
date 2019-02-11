<?php

function cmb2_practice_options() {
	
	
	$box = new_cmb2_box( array(
		'id'           	=> 'practice_info',
		'title'       	=> 'Practice Info',
		'object_types' 	=> array( 'options-page' ),
		'option_key'    => 'practice_info', 
	));
	
	
	//GENERAL PRACTICE FIELDS
	$box->add_field( array(
		'name' 					=> 'Practice Name',
		'id'   					=> 'practice_name',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'Practice Logo',
		'id'   					=> 'practice_img',
		'type' => 'file',
		'options' => array('url' => false),
		'query_args' => array(
			'type' => array('image/gif','image/jpeg','image/png')
		)
	));
	
	$box->add_field( array(
		'name' 					=> 'Doctor Name',
		'id'   					=> 'doc_name_1',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'Doctor Name Version 2',
		'id'   					=> 'doc_name_2',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'Doctor Name Version 3',
		'id'   					=> 'doc_name_3',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'Street Address',
		'id'   					=> 'street_address',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'City',
		'id'   					=> 'city',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'State',
		'id'   					=> 'state',
		'type' 					=> 'text',
		'desc'					=> 'All caps, two letter abbreviation. Ex MD'
	));
	
	$box->add_field( array(
		'name' 					=> 'Zip Code',
		'id'   					=> 'zip_code',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'New Patient Number',
		'id'   					=> 'new_patient_phone',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'Current Patient Number',
		'id'   					=> 'current_patient_phone',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'Google Map',
		'id'   					=> 'google_map',
		'type' 					=> 'textarea',
		'desc'					=> 'Copy/Paste Google Map embed iframe here',
		'sanitization_cb' => false
	));
	
	$box->add_field( array(
		'name' 					=> 'Company Hours',
		'id'   					=> 'company_hours',
		'type' 					=> 'textarea',
		'desc'					=> 'Separate lines with a line break'
	));
	
	$box->add_field( array(
		'name' 					=> 'Google Review URL',
		'id'   					=> 'google_review_url',
		'type' 					=> 'text_url',
	));
	
	$box->add_field( array(
		'name' 					=> 'Google Place ID',
		'id'   					=> 'google_place_id',
		'type' 					=> 'text',
		'desc'					=> 'Find using this tool: https://developers.google.com/maps/documentation/javascript/examples/places-placeid-finder'
	));
	
	
	
}

add_action( 'cmb2_admin_init', 'cmb2_practice_options' );




function cmb2_social_options() {

	$box = new_cmb2_box( array(
		'id'           	=> 'social_info',
		'title'       	=> 'Social',
		'object_types' 	=> array( 'options-page' ),
		'option_key'    => 'social_info',
		'parent_slug'  => 'practice_info',
	));
	
	$box->add_field( array(
		'name' 					=> 'Facebook Link',
		'id'   					=> 'facebook_link',
		'type' 					=> 'text_url',
	));
	
	$box->add_field( array(
		'name' 					=> 'Twitter Link',
		'id'   					=> 'twitter_link',
		'type' 					=> 'text_url',
	));
	
	$box->add_field( array(
		'name' 					=> 'LinkedIn Link',
		'id'   					=> 'linkedin_link',
		'type' 					=> 'text_url',
	));
	
	$box->add_field( array(
		'name' 					=> 'Instagram Link',
		'id'   					=> 'instagram_link',
		'type' 					=> 'text_url',
	));
	
	$box->add_field( array(
		'name' 					=> 'Google Plus Link',
		'id'   					=> 'google_plus_link',
		'type' 					=> 'text_url',
	));
	
	$box->add_field( array(
		'name' 					=> 'Youtube Link',
		'id'   					=> 'youtube_link',
		'type' 					=> 'text_url',
	));
	
	$box->add_field( array(
		'name' 					=> 'Yelp Link',
		'id'   					=> 'yelp_link',
		'type' 					=> 'text_url',
	));
	
}

add_action( 'cmb2_admin_init', 'cmb2_social_options' );





function cmb2_tracking_options() {
	
	
	$box = new_cmb2_box( array(
		'id'           	=> 'tracking_info',
		'title'       	=> 'Tracking',
		'object_types' 	=> array( 'options-page' ),
		'option_key'    => 'tracking_info',
		'parent_slug'  => 'practice_info',
	));
	
	$box->add_field( array(
		'name' 					=> 'Thank You Page Conversion Code',
		'id'   					=> 'thank_you_conversion',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'GTM ID',
		'id'   					=> 'gtm_id',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'Convirza ID',
		'id'   					=> 'convirza_id',
		'type' 					=> 'text',
	));
	
}

add_action( 'cmb2_admin_init', 'cmb2_tracking_options' );




function cmb2_appearance_options() {
	
	$box = new_cmb2_box( array(
		'id'           	=> 'appearance_info',
		'title'       	=> 'Appearance',
		'object_types' 	=> array( 'options-page' ),
		'option_key'    => 'appearance_info',
		'parent_slug'  	=> 'practice_info',
	));
	
	$box->add_field( array(
		'name' 					=> 'Sitewide',
		'id'   					=> 'sitewide_title',
		'type' 					=> 'title',
	));
	
	$box->add_field( array(
		'name' 					=> 'Primary Brand Color',
		'id'   					=> 'main_color',
		'type' 					=> 'colorpicker',
	));
	
	$box->add_field( array(
		'name' 					=> 'Heading Font',
		'desc'					=> 'Name of a Google Font',
		'id'   					=> 'heading_font',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'Body Font',
		'desc'					=> 'Name of a Google Font',
		'id'   					=> 'body_font',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'CTA button text',
		'desc'					=> 'Text in CTA buttons. Default: Schedule Appointment',
		'id'   					=> 'cta_text',
		'type' 					=> 'text',
		'default'				=> 'Schedule Appointment'
	));
	
	$box->add_field( array(
		'name' 					=> 'Sidebars On or Off?',
		'id'   					=> 'sidebars_global',
		'type' => 'radio_inline',
		'options'          => array(
			'on' => 'On',
			'off' => 'Off',
		),
		'default' => 'on'
	));
	
	$box->add_field( array(
		'name' 					=> 'Button Corner Style',
		'desc'					=> 'Rounded or Square Cornered Buttons',
		'id'   					=> 'buttons_style',
		'type' => 'select',
		'options'          => array(
			'3px' => 'Rounded',
			'0' => 'Square',
		),
		'default' => '3px'
	));
	
	$box->add_field( array(
		'name' 					=> 'Page Head Image',
		'desc'					=> 'Not Required. If an image is uploaded, it will change the style to have an image background.',
		'id'   					=> 'page_head_img',
		'type' => 'file',
		'options' => array('url' => false),
		'query_args' => array(
			'type' => array('image/gif','image/jpeg','image/png')
		)
	));
	
	$box->add_field( array(
		'name' 					=> 'Side Tabs Active?',
		'id'   					=> 'side_tabs_active',
		'type' 					=> 'radio',
		'options'          => array(
			'yes_no_social' => 'Yes, No Social Icons',
			'yes_social' => 'Yes, With Social Icons',
			'no' => 'No',
		),
		'default' => 'no'
	));
	
	$group_side_tabs = $box->add_field( array(
		'id'          => 'social_side_tabs',
		'type'        => 'group',
		'description' => __( 'Add tabs to side tabs section', 'cmb2' ),
		'options'     => array(
			'group_title'       => __( 'Tab {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'        => __( 'Add Another Tab', 'cmb2' ),
			'remove_button'     => __( 'Remove Tab', 'cmb2' ),
			'sortable'          => true,
		),
	) );
	
	$box->add_group_field( $group_side_tabs, array(
		'name' => 'Tab Short Title',
		'id'   => 'tab_short_title',
		'type' => 'text'
	) );
	$box->add_group_field( $group_side_tabs, array(
		'name' => 'Tab Long Title',
		'id'   => 'tab_long_title',
		'type' => 'text'
	) );
	$box->add_group_field( $group_side_tabs, array(
		'name' => 'Tab Icon',
		'id'   => 'tab_icon',
		'type' => 'select',
		'options'          => array(
			  'fa fa-glass' => 'fa fa-glass',
			  'fa fa-music' => 'fa fa-music',
			  'fa fa-search' => 'fa fa-search',
			  'fa fa-envelope-o' => 'fa fa-envelope-o',
			  'fa fa-heart' => 'fa fa-heart',
			  'fa fa-star' => 'fa fa-star',
			  'fa fa-star-o' => 'fa fa-star-o',
			  'fa fa-user' => 'fa fa-user',
			  'fa fa-film' => 'fa fa-film',
			  'fa fa-th-large' => 'fa fa-th-large',
			  'fa fa-th' => 'fa fa-th',
			  'fa fa-th-list' => 'fa fa-th-list',
			  'fa fa-check' => 'fa fa-check',
			  'fa fa-times' => 'fa fa-times',
			  'fa fa-search-plus' => 'fa fa-search-plus',
			  'fa fa-search-minus' => 'fa fa-search-minus',
			  'fa fa-power-off' => 'fa fa-power-off',
			  'fa fa-signal' => 'fa fa-signal',
			  'fa fa-cog' => 'fa fa-cog',
			  'fa fa-trash-o' => 'fa fa-trash-o',
			  'fa fa-home' => 'fa fa-home',
			  'fa fa-file-o' => 'fa fa-file-o',
			  'fa fa-clock-o' => 'fa fa-clock-o',
			  'fa fa-road' => 'fa fa-road',
			  'fa fa-download' => 'fa fa-download',
			  'fa fa-arrow-circle-o-down' => 'fa fa-arrow-circle-o-down',
			  'fa fa-arrow-circle-o-up' => 'fa fa-arrow-circle-o-up',
			  'fa fa-inbox' => 'fa fa-inbox',
			  'fa fa-play-circle-o' => 'fa fa-play-circle-o',
			  'fa fa-repeat' => 'fa fa-repeat',
			  'fa fa-refresh' => 'fa fa-refresh',
			  'fa fa-list-alt' => 'fa fa-list-alt',
			  'fa fa-lock' => 'fa fa-lock',
			  'fa fa-flag' => 'fa fa-flag',
			  'fa fa-headphones' => 'fa fa-headphones',
			  'fa fa-volume-off' => 'fa fa-volume-off',
			  'fa fa-volume-down' => 'fa fa-volume-down',
			  'fa fa-volume-up' => 'fa fa-volume-up',
			  'fa fa-qrcode' => 'fa fa-qrcode',
			  'fa fa-barcode' => 'fa fa-barcode',
			  'fa fa-tag' => 'fa fa-tag',
			  'fa fa-tags' => 'fa fa-tags',
			  'fa fa-book' => 'fa fa-book',
			  'fa fa-bookmark' => 'fa fa-bookmark',
			  'fa fa-print' => 'fa fa-print',
			  'fa fa-camera' => 'fa fa-camera',
			  'fa fa-font' => 'fa fa-font',
			  'fa fa-bold' => 'fa fa-bold',
			  'fa fa-italic' => 'fa fa-italic',
			  'fa fa-text-height' => 'fa fa-text-height',
			  'fa fa-text-width' => 'fa fa-text-width',
			  'fa fa-align-left' => 'fa fa-align-left',
			  'fa fa-align-center' => 'fa fa-align-center',
			  'fa fa-align-right' => 'fa fa-align-right',
			  'fa fa-align-justify' => 'fa fa-align-justify',
			  'fa fa-list' => 'fa fa-list',
			  'fa fa-outdent' => 'fa fa-outdent',
			  'fa fa-indent' => 'fa fa-indent',
			  'fa fa-video-camera' => 'fa fa-video-camera',
			  'fa fa-picture-o' => 'fa fa-picture-o',
			  'fa fa-pencil' => 'fa fa-pencil',
			  'fa fa-map-marker' => 'fa fa-map-marker',
			  'fa fa-adjust' => 'fa fa-adjust',
			  'fa fa-tint' => 'fa fa-tint',
			  'fa fa-pencil-square-o' => 'fa fa-pencil-square-o',
			  'fa fa-share-square-o' => 'fa fa-share-square-o',
			  'fa fa-check-square-o' => 'fa fa-check-square-o',
			  'fa fa-arrows' => 'fa fa-arrows',
			  'fa fa-step-backward' => 'fa fa-step-backward',
			  'fa fa-fast-backward' => 'fa fa-fast-backward',
			  'fa fa-backward' => 'fa fa-backward',
			  'fa fa-play' => 'fa fa-play',
			  'fa fa-pause' => 'fa fa-pause',
			  'fa fa-stop' => 'fa fa-stop',
			  'fa fa-forward' => 'fa fa-forward',
			  'fa fa-fast-forward' => 'fa fa-fast-forward',
			  'fa fa-step-forward' => 'fa fa-step-forward',
			  'fa fa-eject' => 'fa fa-eject',
			  'fa fa-chevron-left' => 'fa fa-chevron-left',
			  'fa fa-chevron-right' => 'fa fa-chevron-right',
			  'fa fa-plus-circle' => 'fa fa-plus-circle',
			  'fa fa-minus-circle' => 'fa fa-minus-circle',
			  'fa fa-times-circle' => 'fa fa-times-circle',
			  'fa fa-check-circle' => 'fa fa-check-circle',
			  'fa fa-question-circle' => 'fa fa-question-circle',
			  'fa fa-info-circle' => 'fa fa-info-circle',
			  'fa fa-crosshairs' => 'fa fa-crosshairs',
			  'fa fa-times-circle-o' => 'fa fa-times-circle-o',
			  'fa fa-check-circle-o' => 'fa fa-check-circle-o',
			  'fa fa-ban' => 'fa fa-ban',
			  'fa fa-arrow-left' => 'fa fa-arrow-left',
			  'fa fa-arrow-right' => 'fa fa-arrow-right',
			  'fa fa-arrow-up' => 'fa fa-arrow-up',
			  'fa fa-arrow-down' => 'fa fa-arrow-down',
			  'fa fa-share' => 'fa fa-share',
			  'fa fa-expand' => 'fa fa-expand',
			  'fa fa-compress' => 'fa fa-compress',
			  'fa fa-plus' => 'fa fa-plus',
			  'fa fa-minus' => 'fa fa-minus',
			  'fa fa-asterisk' => 'fa fa-asterisk',
			  'fa fa-exclamation-circle' => 'fa fa-exclamation-circle',
			  'fa fa-gift' => 'fa fa-gift',
			  'fa fa-leaf' => 'fa fa-leaf',
			  'fa fa-fire' => 'fa fa-fire',
			  'fa fa-eye' => 'fa fa-eye',
			  'fa fa-eye-slash' => 'fa fa-eye-slash',
			  'fa fa-exclamation-triangle' => 'fa fa-exclamation-triangle',
			  'fa fa-plane' => 'fa fa-plane',
			  'fa fa-calendar' => 'fa fa-calendar',
			  'fa fa-random' => 'fa fa-random',
			  'fa fa-comment' => 'fa fa-comment',
			  'fa fa-magnet' => 'fa fa-magnet',
			  'fa fa-chevron-up' => 'fa fa-chevron-up',
			  'fa fa-chevron-down' => 'fa fa-chevron-down',
			  'fa fa-retweet' => 'fa fa-retweet',
			  'fa fa-shopping-cart' => 'fa fa-shopping-cart',
			  'fa fa-folder' => 'fa fa-folder',
			  'fa fa-folder-open' => 'fa fa-folder-open',
			  'fa fa-arrows-v' => 'fa fa-arrows-v',
			  'fa fa-arrows-h' => 'fa fa-arrows-h',
			  'fa fa-bar-chart' => 'fa fa-bar-chart',
			  'fa fa-twitter-square' => 'fa fa-twitter-square',
			  'fa fa-facebook-square' => 'fa fa-facebook-square',
			  'fa fa-camera-retro' => 'fa fa-camera-retro',
			  'fa fa-key' => 'fa fa-key',
			  'fa fa-cogs' => 'fa fa-cogs',
			  'fa fa-comments' => 'fa fa-comments',
			  'fa fa-thumbs-o-up' => 'fa fa-thumbs-o-up',
			  'fa fa-thumbs-o-down' => 'fa fa-thumbs-o-down',
			  'fa fa-star-half' => 'fa fa-star-half',
			  'fa fa-heart-o' => 'fa fa-heart-o',
			  'fa fa-sign-out' => 'fa fa-sign-out',
			  'fa fa-linkedin-square' => 'fa fa-linkedin-square',
			  'fa fa-thumb-tack' => 'fa fa-thumb-tack',
			  'fa fa-external-link' => 'fa fa-external-link',
			  'fa fa-sign-in' => 'fa fa-sign-in',
			  'fa fa-trophy' => 'fa fa-trophy',
			  'fa fa-github-square' => 'fa fa-github-square',
			  'fa fa-upload' => 'fa fa-upload',
			  'fa fa-lemon-o' => 'fa fa-lemon-o',
			  'fa fa-phone' => 'fa fa-phone',
			  'fa fa-square-o' => 'fa fa-square-o',
			  'fa fa-bookmark-o' => 'fa fa-bookmark-o',
			  'fa fa-phone-square' => 'fa fa-phone-square',
			  'fa fa-twitter' => 'fa fa-twitter',
			  'fa fa-facebook' => 'fa fa-facebook',
			  'fa fa-github' => 'fa fa-github',
			  'fa fa-unlock' => 'fa fa-unlock',
			  'fa fa-credit-card' => 'fa fa-credit-card',
			  'fa fa-rss' => 'fa fa-rss',
			  'fa fa-hdd-o' => 'fa fa-hdd-o',
			  'fa fa-bullhorn' => 'fa fa-bullhorn',
			  'fa fa-bell' => 'fa fa-bell',
			  'fa fa-certificate' => 'fa fa-certificate',
			  'fa fa-hand-o-right' => 'fa fa-hand-o-right',
			  'fa fa-hand-o-left' => 'fa fa-hand-o-left',
			  'fa fa-hand-o-up' => 'fa fa-hand-o-up',
			  'fa fa-hand-o-down' => 'fa fa-hand-o-down',
			  'fa fa-arrow-circle-left' => 'fa fa-arrow-circle-left',
			  'fa fa-arrow-circle-right' => 'fa fa-arrow-circle-right',
			  'fa fa-arrow-circle-up' => 'fa fa-arrow-circle-up',
			  'fa fa-arrow-circle-down' => 'fa fa-arrow-circle-down',
			  'fa fa-globe' => 'fa fa-globe',
			  'fa fa-wrench' => 'fa fa-wrench',
			  'fa fa-tasks' => 'fa fa-tasks',
			  'fa fa-filter' => 'fa fa-filter',
			  'fa fa-briefcase' => 'fa fa-briefcase',
			  'fa fa-arrows-alt' => 'fa fa-arrows-alt',
			  'fa fa-users' => 'fa fa-users',
			  'fa fa-link' => 'fa fa-link',
			  'fa fa-cloud' => 'fa fa-cloud',
			  'fa fa-flask' => 'fa fa-flask',
			  'fa fa-scissors' => 'fa fa-scissors',
			  'fa fa-files-o' => 'fa fa-files-o',
			  'fa fa-paperclip' => 'fa fa-paperclip',
			  'fa fa-floppy-o' => 'fa fa-floppy-o',
			  'fa fa-square' => 'fa fa-square',
			  'fa fa-bars' => 'fa fa-bars',
			  'fa fa-list-ul' => 'fa fa-list-ul',
			  'fa fa-list-ol' => 'fa fa-list-ol',
			  'fa fa-strikethrough' => 'fa fa-strikethrough',
			  'fa fa-underline' => 'fa fa-underline',
			  'fa fa-table' => 'fa fa-table',
			  'fa fa-magic' => 'fa fa-magic',
			  'fa fa-truck' => 'fa fa-truck',
			  'fa fa-pinterest' => 'fa fa-pinterest',
			  'fa fa-pinterest-square' => 'fa fa-pinterest-square',
			  'fa fa-google-plus-square' => 'fa fa-google-plus-square',
			  'fa fa-google-plus' => 'fa fa-google-plus',
			  'fa fa-money' => 'fa fa-money',
			  'fa fa-caret-down' => 'fa fa-caret-down',
			  'fa fa-caret-up' => 'fa fa-caret-up',
			  'fa fa-caret-left' => 'fa fa-caret-left',
			  'fa fa-caret-right' => 'fa fa-caret-right',
			  'fa fa-columns' => 'fa fa-columns',
			  'fa fa-sort' => 'fa fa-sort',
			  'fa fa-sort-desc' => 'fa fa-sort-desc',
			  'fa fa-sort-asc' => 'fa fa-sort-asc',
			  'fa fa-envelope' => 'fa fa-envelope',
			  'fa fa-linkedin' => 'fa fa-linkedin',
			  'fa fa-undo' => 'fa fa-undo',
			  'fa fa-gavel' => 'fa fa-gavel',
			  'fa fa-tachometer' => 'fa fa-tachometer',
			  'fa fa-comment-o' => 'fa fa-comment-o',
			  'fa fa-comments-o' => 'fa fa-comments-o',
			  'fa fa-bolt' => 'fa fa-bolt',
			  'fa fa-sitemap' => 'fa fa-sitemap',
			  'fa fa-umbrella' => 'fa fa-umbrella',
			  'fa fa-clipboard' => 'fa fa-clipboard',
			  'fa fa-lightbulb-o' => 'fa fa-lightbulb-o',
			  'fa fa-exchange' => 'fa fa-exchange',
			  'fa fa-cloud-download' => 'fa fa-cloud-download',
			  'fa fa-cloud-upload' => 'fa fa-cloud-upload',
			  'fa fa-user-md' => 'fa fa-user-md',
			  'fa fa-stethoscope' => 'fa fa-stethoscope',
			  'fa fa-suitcase' => 'fa fa-suitcase',
			  'fa fa-bell-o' => 'fa fa-bell-o',
			  'fa fa-coffee' => 'fa fa-coffee',
			  'fa fa-cutlery' => 'fa fa-cutlery',
			  'fa fa-file-text-o' => 'fa fa-file-text-o',
			  'fa fa-building-o' => 'fa fa-building-o',
			  'fa fa-hospital-o' => 'fa fa-hospital-o',
			  'fa fa-ambulance' => 'fa fa-ambulance',
			  'fa fa-medkit' => 'fa fa-medkit',
			  'fa fa-fighter-jet' => 'fa fa-fighter-jet',
			  'fa fa-beer' => 'fa fa-beer',
			  'fa fa-h-square' => 'fa fa-h-square',
			  'fa fa-plus-square' => 'fa fa-plus-square',
			  'fa fa-angle-double-left' => 'fa fa-angle-double-left',
			  'fa fa-angle-double-right' => 'fa fa-angle-double-right',
			  'fa fa-angle-double-up' => 'fa fa-angle-double-up',
			  'fa fa-angle-double-down' => 'fa fa-angle-double-down',
			  'fa fa-angle-left' => 'fa fa-angle-left',
			  'fa fa-angle-right' => 'fa fa-angle-right',
			  'fa fa-angle-up' => 'fa fa-angle-up',
			  'fa fa-angle-down' => 'fa fa-angle-down',
			  'fa fa-desktop' => 'fa fa-desktop',
			  'fa fa-laptop' => 'fa fa-laptop',
			  'fa fa-tablet' => 'fa fa-tablet',
			  'fa fa-mobile' => 'fa fa-mobile',
			  'fa fa-circle-o' => 'fa fa-circle-o',
			  'fa fa-quote-left' => 'fa fa-quote-left',
			  'fa fa-quote-right' => 'fa fa-quote-right',
			  'fa fa-spinner' => 'fa fa-spinner',
			  'fa fa-circle' => 'fa fa-circle',
			  'fa fa-reply' => 'fa fa-reply',
			  'fa fa-github-alt' => 'fa fa-github-alt',
			  'fa fa-folder-o' => 'fa fa-folder-o',
			  'fa fa-folder-open-o' => 'fa fa-folder-open-o',
			  'fa fa-smile-o' => 'fa fa-smile-o',
			  'fa fa-frown-o' => 'fa fa-frown-o',
			  'fa fa-meh-o' => 'fa fa-meh-o',
			  'fa fa-gamepad' => 'fa fa-gamepad',
			  'fa fa-keyboard-o' => 'fa fa-keyboard-o',
			  'fa fa-flag-o' => 'fa fa-flag-o',
			  'fa fa-flag-checkered' => 'fa fa-flag-checkered',
			  'fa fa-terminal' => 'fa fa-terminal',
			  'fa fa-code' => 'fa fa-code',
			  'fa fa-reply-all' => 'fa fa-reply-all',
			  'fa fa-star-half-o' => 'fa fa-star-half-o',
			  'fa fa-location-arrow' => 'fa fa-location-arrow',
			  'fa fa-crop' => 'fa fa-crop',
			  'fa fa-code-fork' => 'fa fa-code-fork',
			  'fa fa-chain-broken' => 'fa fa-chain-broken',
			  'fa fa-question' => 'fa fa-question',
			  'fa fa-info' => 'fa fa-info',
			  'fa fa-exclamation' => 'fa fa-exclamation',
			  'fa fa-superscript' => 'fa fa-superscript',
			  'fa fa-subscript' => 'fa fa-subscript',
			  'fa fa-eraser' => 'fa fa-eraser',
			  'fa fa-puzzle-piece' => 'fa fa-puzzle-piece',
			  'fa fa-microphone' => 'fa fa-microphone',
			  'fa fa-microphone-slash' => 'fa fa-microphone-slash',
			  'fa fa-shield' => 'fa fa-shield',
			  'fa fa-calendar-o' => 'fa fa-calendar-o',
			  'fa fa-fire-extinguisher' => 'fa fa-fire-extinguisher',
			  'fa fa-rocket' => 'fa fa-rocket',
			  'fa fa-maxcdn' => 'fa fa-maxcdn',
			  'fa fa-chevron-circle-left' => 'fa fa-chevron-circle-left',
			  'fa fa-chevron-circle-right' => 'fa fa-chevron-circle-right',
			  'fa fa-chevron-circle-up' => 'fa fa-chevron-circle-up',
			  'fa fa-chevron-circle-down' => 'fa fa-chevron-circle-down',
			  'fa fa-html5' => 'fa fa-html5',
			  'fa fa-css3' => 'fa fa-css3',
			  'fa fa-anchor' => 'fa fa-anchor',
			  'fa fa-unlock-alt' => 'fa fa-unlock-alt',
			  'fa fa-bullseye' => 'fa fa-bullseye',
			  'fa fa-ellipsis-h' => 'fa fa-ellipsis-h',
			  'fa fa-ellipsis-v' => 'fa fa-ellipsis-v',
			  'fa fa-rss-square' => 'fa fa-rss-square',
			  'fa fa-play-circle' => 'fa fa-play-circle',
			  'fa fa-ticket' => 'fa fa-ticket',
			  'fa fa-minus-square' => 'fa fa-minus-square',
			  'fa fa-minus-square-o' => 'fa fa-minus-square-o',
			  'fa fa-level-up' => 'fa fa-level-up',
			  'fa fa-level-down' => 'fa fa-level-down',
			  'fa fa-check-square' => 'fa fa-check-square',
			  'fa fa-pencil-square' => 'fa fa-pencil-square',
			  'fa fa-external-link-square' => 'fa fa-external-link-square',
			  'fa fa-share-square' => 'fa fa-share-square',
			  'fa fa-compass' => 'fa fa-compass',
			  'fa fa-caret-square-o-down' => 'fa fa-caret-square-o-down',
			  'fa fa-caret-square-o-up' => 'fa fa-caret-square-o-up',
			  'fa fa-caret-square-o-right' => 'fa fa-caret-square-o-right',
			  'fa fa-eur' => 'fa fa-eur',
			  'fa fa-gbp' => 'fa fa-gbp',
			  'fa fa-usd' => 'fa fa-usd',
			  'fa fa-inr' => 'fa fa-inr',
			  'fa fa-jpy' => 'fa fa-jpy',
			  'fa fa-rub' => 'fa fa-rub',
			  'fa fa-krw' => 'fa fa-krw',
			  'fa fa-btc' => 'fa fa-btc',
			  'fa fa-file' => 'fa fa-file',
			  'fa fa-file-text' => 'fa fa-file-text',
			  'fa fa-sort-alpha-asc' => 'fa fa-sort-alpha-asc',
			  'fa fa-sort-alpha-desc' => 'fa fa-sort-alpha-desc',
			  'fa fa-sort-amount-asc' => 'fa fa-sort-amount-asc',
			  'fa fa-sort-amount-desc' => 'fa fa-sort-amount-desc',
			  'fa fa-sort-numeric-asc' => 'fa fa-sort-numeric-asc',
			  'fa fa-sort-numeric-desc' => 'fa fa-sort-numeric-desc',
			  'fa fa-thumbs-up' => 'fa fa-thumbs-up',
			  'fa fa-thumbs-down' => 'fa fa-thumbs-down',
			  'fa fa-youtube-square' => 'fa fa-youtube-square',
			  'fa fa-youtube' => 'fa fa-youtube',
			  'fa fa-xing' => 'fa fa-xing',
			  'fa fa-xing-square' => 'fa fa-xing-square',
			  'fa fa-youtube-play' => 'fa fa-youtube-play',
			  'fa fa-dropbox' => 'fa fa-dropbox',
			  'fa fa-stack-overflow' => 'fa fa-stack-overflow',
			  'fa fa-instagram' => 'fa fa-instagram',
			  'fa fa-flickr' => 'fa fa-flickr',
			  'fa fa-adn' => 'fa fa-adn',
			  'fa fa-bitbucket' => 'fa fa-bitbucket',
			  'fa fa-bitbucket-square' => 'fa fa-bitbucket-square',
			  'fa fa-tumblr' => 'fa fa-tumblr',
			  'fa fa-tumblr-square' => 'fa fa-tumblr-square',
			  'fa fa-long-arrow-down' => 'fa fa-long-arrow-down',
			  'fa fa-long-arrow-up' => 'fa fa-long-arrow-up',
			  'fa fa-long-arrow-left' => 'fa fa-long-arrow-left',
			  'fa fa-long-arrow-right' => 'fa fa-long-arrow-right',
			  'fa fa-apple' => 'fa fa-apple',
			  'fa fa-windows' => 'fa fa-windows',
			  'fa fa-android' => 'fa fa-android',
			  'fa fa-linux' => 'fa fa-linux',
			  'fa fa-dribbble' => 'fa fa-dribbble',
			  'fa fa-skype' => 'fa fa-skype',
			  'fa fa-foursquare' => 'fa fa-foursquare',
			  'fa fa-trello' => 'fa fa-trello',
			  'fa fa-female' => 'fa fa-female',
			  'fa fa-male' => 'fa fa-male',
			  'fa fa-gratipay' => 'fa fa-gratipay',
			  'fa fa-sun-o' => 'fa fa-sun-o',
			  'fa fa-moon-o' => 'fa fa-moon-o',
			  'fa fa-archive' => 'fa fa-archive',
			  'fa fa-bug' => 'fa fa-bug',
			  'fa fa-vk' => 'fa fa-vk',
			  'fa fa-weibo' => 'fa fa-weibo',
			  'fa fa-renren' => 'fa fa-renren',
			  'fa fa-pagelines' => 'fa fa-pagelines',
			  'fa fa-stack-exchange' => 'fa fa-stack-exchange',
			  'fa fa-arrow-circle-o-right' => 'fa fa-arrow-circle-o-right',
			  'fa fa-arrow-circle-o-left' => 'fa fa-arrow-circle-o-left',
			  'fa fa-caret-square-o-left' => 'fa fa-caret-square-o-left',
			  'fa fa-dot-circle-o' => 'fa fa-dot-circle-o',
			  'fa fa-wheelchair' => 'fa fa-wheelchair',
			  'fa fa-vimeo-square' => 'fa fa-vimeo-square',
			  'fa fa-try' => 'fa fa-try',
			  'fa fa-plus-square-o' => 'fa fa-plus-square-o',
			  'fa fa-space-shuttle' => 'fa fa-space-shuttle',
			  'fa fa-slack' => 'fa fa-slack',
			  'fa fa-envelope-square' => 'fa fa-envelope-square',
			  'fa fa-wordpress' => 'fa fa-wordpress',
			  'fa fa-openid' => 'fa fa-openid',
			  'fa fa-university' => 'fa fa-university',
			  'fa fa-graduation-cap' => 'fa fa-graduation-cap',
			  'fa fa-yahoo' => 'fa fa-yahoo',
			  'fa fa-google' => 'fa fa-google',
			  'fa fa-reddit' => 'fa fa-reddit',
			  'fa fa-reddit-square' => 'fa fa-reddit-square',
			  'fa fa-stumbleupon-circle' => 'fa fa-stumbleupon-circle',
			  'fa fa-stumbleupon' => 'fa fa-stumbleupon',
			  'fa fa-delicious' => 'fa fa-delicious',
			  'fa fa-digg' => 'fa fa-digg',
			  'fa fa-pied-piper-pp' => 'fa fa-pied-piper-pp',
			  'fa fa-pied-piper-alt' => 'fa fa-pied-piper-alt',
			  'fa fa-drupal' => 'fa fa-drupal',
			  'fa fa-joomla' => 'fa fa-joomla',
			  'fa fa-language' => 'fa fa-language',
			  'fa fa-fax' => 'fa fa-fax',
			  'fa fa-building' => 'fa fa-building',
			  'fa fa-child' => 'fa fa-child',
			  'fa fa-paw' => 'fa fa-paw',
			  'fa fa-spoon' => 'fa fa-spoon',
			  'fa fa-cube' => 'fa fa-cube',
			  'fa fa-cubes' => 'fa fa-cubes',
			  'fa fa-behance' => 'fa fa-behance',
			  'fa fa-behance-square' => 'fa fa-behance-square',
			  'fa fa-steam' => 'fa fa-steam',
			  'fa fa-steam-square' => 'fa fa-steam-square',
			  'fa fa-recycle' => 'fa fa-recycle',
			  'fa fa-car' => 'fa fa-car',
			  'fa fa-taxi' => 'fa fa-taxi',
			  'fa fa-tree' => 'fa fa-tree',
			  'fa fa-spotify' => 'fa fa-spotify',
			  'fa fa-deviantart' => 'fa fa-deviantart',
			  'fa fa-soundcloud' => 'fa fa-soundcloud',
			  'fa fa-database' => 'fa fa-database',
			  'fa fa-file-pdf-o' => 'fa fa-file-pdf-o',
			  'fa fa-file-word-o' => 'fa fa-file-word-o',
			  'fa fa-file-excel-o' => 'fa fa-file-excel-o',
			  'fa fa-file-powerpoint-o' => 'fa fa-file-powerpoint-o',
			  'fa fa-file-image-o' => 'fa fa-file-image-o',
			  'fa fa-file-archive-o' => 'fa fa-file-archive-o',
			  'fa fa-file-audio-o' => 'fa fa-file-audio-o',
			  'fa fa-file-video-o' => 'fa fa-file-video-o',
			  'fa fa-file-code-o' => 'fa fa-file-code-o',
			  'fa fa-vine' => 'fa fa-vine',
			  'fa fa-codepen' => 'fa fa-codepen',
			  'fa fa-jsfiddle' => 'fa fa-jsfiddle',
			  'fa fa-life-ring' => 'fa fa-life-ring',
			  'fa fa-circle-o-notch' => 'fa fa-circle-o-notch',
			  'fa fa-rebel' => 'fa fa-rebel',
			  'fa fa-empire' => 'fa fa-empire',
			  'fa fa-git-square' => 'fa fa-git-square',
			  'fa fa-git' => 'fa fa-git',
			  'fa fa-hacker-news' => 'fa fa-hacker-news',
			  'fa fa-tencent-weibo' => 'fa fa-tencent-weibo',
			  'fa fa-qq' => 'fa fa-qq',
			  'fa fa-weixin' => 'fa fa-weixin',
			  'fa fa-paper-plane' => 'fa fa-paper-plane',
			  'fa fa-paper-plane-o' => 'fa fa-paper-plane-o',
			  'fa fa-history' => 'fa fa-history',
			  'fa fa-circle-thin' => 'fa fa-circle-thin',
			  'fa fa-header' => 'fa fa-header',
			  'fa fa-paragraph' => 'fa fa-paragraph',
			  'fa fa-sliders' => 'fa fa-sliders',
			  'fa fa-share-alt' => 'fa fa-share-alt',
			  'fa fa-share-alt-square' => 'fa fa-share-alt-square',
			  'fa fa-bomb' => 'fa fa-bomb',
			  'fa fa-futbol-o' => 'fa fa-futbol-o',
			  'fa fa-tty' => 'fa fa-tty',
			  'fa fa-binoculars' => 'fa fa-binoculars',
			  'fa fa-plug' => 'fa fa-plug',
			  'fa fa-slideshare' => 'fa fa-slideshare',
			  'fa fa-twitch' => 'fa fa-twitch',
			  'fa fa-yelp' => 'fa fa-yelp',
			  'fa fa-newspaper-o' => 'fa fa-newspaper-o',
			  'fa fa-wifi' => 'fa fa-wifi',
			  'fa fa-calculator' => 'fa fa-calculator',
			  'fa fa-paypal' => 'fa fa-paypal',
			  'fa fa-google-wallet' => 'fa fa-google-wallet',
			  'fa fa-cc-visa' => 'fa fa-cc-visa',
			  'fa fa-cc-mastercard' => 'fa fa-cc-mastercard',
			  'fa fa-cc-discover' => 'fa fa-cc-discover',
			  'fa fa-cc-amex' => 'fa fa-cc-amex',
			  'fa fa-cc-paypal' => 'fa fa-cc-paypal',
			  'fa fa-cc-stripe' => 'fa fa-cc-stripe',
			  'fa fa-bell-slash' => 'fa fa-bell-slash',
			  'fa fa-bell-slash-o' => 'fa fa-bell-slash-o',
			  'fa fa-trash' => 'fa fa-trash',
			  'fa fa-copyright' => 'fa fa-copyright',
			  'fa fa-at' => 'fa fa-at',
			  'fa fa-eyedropper' => 'fa fa-eyedropper',
			  'fa fa-paint-brush' => 'fa fa-paint-brush',
			  'fa fa-birthday-cake' => 'fa fa-birthday-cake',
			  'fa fa-area-chart' => 'fa fa-area-chart',
			  'fa fa-pie-chart' => 'fa fa-pie-chart',
			  'fa fa-line-chart' => 'fa fa-line-chart',
			  'fa fa-lastfm' => 'fa fa-lastfm',
			  'fa fa-lastfm-square' => 'fa fa-lastfm-square',
			  'fa fa-toggle-off' => 'fa fa-toggle-off',
			  'fa fa-toggle-on' => 'fa fa-toggle-on',
			  'fa fa-bicycle' => 'fa fa-bicycle',
			  'fa fa-bus' => 'fa fa-bus',
			  'fa fa-ioxhost' => 'fa fa-ioxhost',
			  'fa fa-angellist' => 'fa fa-angellist',
			  'fa fa-cc' => 'fa fa-cc',
			  'fa fa-ils' => 'fa fa-ils',
			  'fa fa-meanpath' => 'fa fa-meanpath',
			  'fa fa-buysellads' => 'fa fa-buysellads',
			  'fa fa-connectdevelop' => 'fa fa-connectdevelop',
			  'fa fa-dashcube' => 'fa fa-dashcube',
			  'fa fa-forumbee' => 'fa fa-forumbee',
			  'fa fa-leanpub' => 'fa fa-leanpub',
			  'fa fa-sellsy' => 'fa fa-sellsy',
			  'fa fa-shirtsinbulk' => 'fa fa-shirtsinbulk',
			  'fa fa-simplybuilt' => 'fa fa-simplybuilt',
			  'fa fa-skyatlas' => 'fa fa-skyatlas',
			  'fa fa-cart-plus' => 'fa fa-cart-plus',
			  'fa fa-cart-arrow-down' => 'fa fa-cart-arrow-down',
			  'fa fa-diamond' => 'fa fa-diamond',
			  'fa fa-ship' => 'fa fa-ship',
			  'fa fa-user-secret' => 'fa fa-user-secret',
			  'fa fa-motorcycle' => 'fa fa-motorcycle',
			  'fa fa-street-view' => 'fa fa-street-view',
			  'fa fa-heartbeat' => 'fa fa-heartbeat',
			  'fa fa-venus' => 'fa fa-venus',
			  'fa fa-mars' => 'fa fa-mars',
			  'fa fa-mercury' => 'fa fa-mercury',
			  'fa fa-transgender' => 'fa fa-transgender',
			  'fa fa-transgender-alt' => 'fa fa-transgender-alt',
			  'fa fa-venus-double' => 'fa fa-venus-double',
			  'fa fa-mars-double' => 'fa fa-mars-double',
			  'fa fa-venus-mars' => 'fa fa-venus-mars',
			  'fa fa-mars-stroke' => 'fa fa-mars-stroke',
			  'fa fa-mars-stroke-v' => 'fa fa-mars-stroke-v',
			  'fa fa-mars-stroke-h' => 'fa fa-mars-stroke-h',
			  'fa fa-neuter' => 'fa fa-neuter',
			  'fa fa-genderless' => 'fa fa-genderless',
			  'fa fa-facebook-official' => 'fa fa-facebook-official',
			  'fa fa-pinterest-p' => 'fa fa-pinterest-p',
			  'fa fa-whatsapp' => 'fa fa-whatsapp',
			  'fa fa-server' => 'fa fa-server',
			  'fa fa-user-plus' => 'fa fa-user-plus',
			  'fa fa-user-times' => 'fa fa-user-times',
			  'fa fa-bed' => 'fa fa-bed',
			  'fa fa-viacoin' => 'fa fa-viacoin',
			  'fa fa-train' => 'fa fa-train',
			  'fa fa-subway' => 'fa fa-subway',
			  'fa fa-medium' => 'fa fa-medium',
			  'fa fa-y-combinator' => 'fa fa-y-combinator',
			  'fa fa-optin-monster' => 'fa fa-optin-monster',
			  'fa fa-opencart' => 'fa fa-opencart',
			  'fa fa-expeditedssl' => 'fa fa-expeditedssl',
			  'fa fa-battery-full' => 'fa fa-battery-full',
			  'fa fa-battery-three-quarters' => 'fa fa-battery-three-quarters',
			  'fa fa-battery-half' => 'fa fa-battery-half',
			  'fa fa-battery-quarter' => 'fa fa-battery-quarter',
			  'fa fa-battery-empty' => 'fa fa-battery-empty',
			  'fa fa-mouse-pointer' => 'fa fa-mouse-pointer',
			  'fa fa-i-cursor' => 'fa fa-i-cursor',
			  'fa fa-object-group' => 'fa fa-object-group',
			  'fa fa-object-ungroup' => 'fa fa-object-ungroup',
			  'fa fa-sticky-note' => 'fa fa-sticky-note',
			  'fa fa-sticky-note-o' => 'fa fa-sticky-note-o',
			  'fa fa-cc-jcb' => 'fa fa-cc-jcb',
			  'fa fa-cc-diners-club' => 'fa fa-cc-diners-club',
			  'fa fa-clone' => 'fa fa-clone',
			  'fa fa-balance-scale' => 'fa fa-balance-scale',
			  'fa fa-hourglass-o' => 'fa fa-hourglass-o',
			  'fa fa-hourglass-start' => 'fa fa-hourglass-start',
			  'fa fa-hourglass-half' => 'fa fa-hourglass-half',
			  'fa fa-hourglass-end' => 'fa fa-hourglass-end',
			  'fa fa-hourglass' => 'fa fa-hourglass',
			  'fa fa-hand-rock-o' => 'fa fa-hand-rock-o',
			  'fa fa-hand-paper-o' => 'fa fa-hand-paper-o',
			  'fa fa-hand-scissors-o' => 'fa fa-hand-scissors-o',
			  'fa fa-hand-lizard-o' => 'fa fa-hand-lizard-o',
			  'fa fa-hand-spock-o' => 'fa fa-hand-spock-o',
			  'fa fa-hand-pointer-o' => 'fa fa-hand-pointer-o',
			  'fa fa-hand-peace-o' => 'fa fa-hand-peace-o',
			  'fa fa-trademark' => 'fa fa-trademark',
			  'fa fa-registered' => 'fa fa-registered',
			  'fa fa-creative-commons' => 'fa fa-creative-commons',
			  'fa fa-gg' => 'fa fa-gg',
			  'fa fa-gg-circle' => 'fa fa-gg-circle',
			  'fa fa-tripadvisor' => 'fa fa-tripadvisor',
			  'fa fa-odnoklassniki' => 'fa fa-odnoklassniki',
			  'fa fa-odnoklassniki-square' => 'fa fa-odnoklassniki-square',
			  'fa fa-get-pocket' => 'fa fa-get-pocket',
			  'fa fa-wikipedia-w' => 'fa fa-wikipedia-w',
			  'fa fa-safari' => 'fa fa-safari',
			  'fa fa-chrome' => 'fa fa-chrome',
			  'fa fa-firefox' => 'fa fa-firefox',
			  'fa fa-opera' => 'fa fa-opera',
			  'fa fa-internet-explorer' => 'fa fa-internet-explorer',
			  'fa fa-television' => 'fa fa-television',
			  'fa fa-contao' => 'fa fa-contao',
			  'fa fa-500px' => 'fa fa-500px',
			  'fa fa-amazon' => 'fa fa-amazon',
			  'fa fa-calendar-plus-o' => 'fa fa-calendar-plus-o',
			  'fa fa-calendar-minus-o' => 'fa fa-calendar-minus-o',
			  'fa fa-calendar-times-o' => 'fa fa-calendar-times-o',
			  'fa fa-calendar-check-o' => 'fa fa-calendar-check-o',
			  'fa fa-industry' => 'fa fa-industry',
			  'fa fa-map-pin' => 'fa fa-map-pin',
			  'fa fa-map-signs' => 'fa fa-map-signs',
			  'fa fa-map-o' => 'fa fa-map-o',
			  'fa fa-map' => 'fa fa-map',
			  'fa fa-commenting' => 'fa fa-commenting',
			  'fa fa-commenting-o' => 'fa fa-commenting-o',
			  'fa fa-houzz' => 'fa fa-houzz',
			  'fa fa-vimeo' => 'fa fa-vimeo',
			  'fa fa-black-tie' => 'fa fa-black-tie',
			  'fa fa-fonticons' => 'fa fa-fonticons',
			  'fa fa-reddit-alien' => 'fa fa-reddit-alien',
			  'fa fa-edge' => 'fa fa-edge',
			  'fa fa-credit-card-alt' => 'fa fa-credit-card-alt',
			  'fa fa-codiepie' => 'fa fa-codiepie',
			  'fa fa-modx' => 'fa fa-modx',
			  'fa fa-fort-awesome' => 'fa fa-fort-awesome',
			  'fa fa-usb' => 'fa fa-usb',
			  'fa fa-product-hunt' => 'fa fa-product-hunt',
			  'fa fa-mixcloud' => 'fa fa-mixcloud',
			  'fa fa-scribd' => 'fa fa-scribd',
			  'fa fa-pause-circle' => 'fa fa-pause-circle',
			  'fa fa-pause-circle-o' => 'fa fa-pause-circle-o',
			  'fa fa-stop-circle' => 'fa fa-stop-circle',
			  'fa fa-stop-circle-o' => 'fa fa-stop-circle-o',
			  'fa fa-shopping-bag' => 'fa fa-shopping-bag',
			  'fa fa-shopping-basket' => 'fa fa-shopping-basket',
			  'fa fa-hashtag' => 'fa fa-hashtag',
			  'fa fa-bluetooth' => 'fa fa-bluetooth',
			  'fa fa-bluetooth-b' => 'fa fa-bluetooth-b',
			  'fa fa-percent' => 'fa fa-percent',
			  'fa fa-gitlab' => 'fa fa-gitlab',
			  'fa fa-wpbeginner' => 'fa fa-wpbeginner',
			  'fa fa-wpforms' => 'fa fa-wpforms',
			  'fa fa-envira' => 'fa fa-envira',
			  'fa fa-universal-access' => 'fa fa-universal-access',
			  'fa fa-wheelchair-alt' => 'fa fa-wheelchair-alt',
			  'fa fa-question-circle-o' => 'fa fa-question-circle-o',
			  'fa fa-blind' => 'fa fa-blind',
			  'fa fa-audio-description' => 'fa fa-audio-description',
			  'fa fa-volume-control-phone' => 'fa fa-volume-control-phone',
			  'fa fa-braille' => 'fa fa-braille',
			  'fa fa-assistive-listening-systems' => 'fa fa-assistive-listening-systems',
			  'fa fa-american-sign-language-interpreting' => 'fa fa-american-sign-language-interpreting',
			  'fa fa-deaf' => 'fa fa-deaf',
			  'fa fa-glide' => 'fa fa-glide',
			  'fa fa-glide-g' => 'fa fa-glide-g',
			  'fa fa-sign-language' => 'fa fa-sign-language',
			  'fa fa-low-vision' => 'fa fa-low-vision',
			  'fa fa-viadeo' => 'fa fa-viadeo',
			  'fa fa-viadeo-square' => 'fa fa-viadeo-square',
			  'fa fa-snapchat' => 'fa fa-snapchat',
			  'fa fa-snapchat-ghost' => 'fa fa-snapchat-ghost',
			  'fa fa-snapchat-square' => 'fa fa-snapchat-square',
			  'fa fa-pied-piper' => 'fa fa-pied-piper',
			  'fa fa-first-order' => 'fa fa-first-order',
			  'fa fa-yoast' => 'fa fa-yoast',
			  'fa fa-themeisle' => 'fa fa-themeisle',
			  'fa fa-google-plus-official' => 'fa fa-google-plus-official',
			  'fa fa-font-awesome' => 'fa fa-font-awesome',
			  'fa fa-handshake-o' => 'fa fa-handshake-o',
			  'fa fa-envelope-open' => 'fa fa-envelope-open',
			  'fa fa-envelope-open-o' => 'fa fa-envelope-open-o',
			  'fa fa-linode' => 'fa fa-linode',
			  'fa fa-address-book' => 'fa fa-address-book',
			  'fa fa-address-book-o' => 'fa fa-address-book-o',
			  'fa fa-address-card' => 'fa fa-address-card',
			  'fa fa-address-card-o' => 'fa fa-address-card-o',
			  'fa fa-user-circle' => 'fa fa-user-circle',
			  'fa fa-user-circle-o' => 'fa fa-user-circle-o',
			  'fa fa-user-o' => 'fa fa-user-o',
			  'fa fa-id-badge' => 'fa fa-id-badge',
			  'fa fa-id-card' => 'fa fa-id-card',
			  'fa fa-id-card-o' => 'fa fa-id-card-o',
			  'fa fa-quora' => 'fa fa-quora',
			  'fa fa-free-code-camp' => 'fa fa-free-code-camp',
			  'fa fa-telegram' => 'fa fa-telegram',
			  'fa fa-thermometer-full' => 'fa fa-thermometer-full',
			  'fa fa-thermometer-three-quarters' => 'fa fa-thermometer-three-quarters',
			  'fa fa-thermometer-half' => 'fa fa-thermometer-half',
			  'fa fa-thermometer-quarter' => 'fa fa-thermometer-quarter',
			  'fa fa-thermometer-empty' => 'fa fa-thermometer-empty',
			  'fa fa-shower' => 'fa fa-shower',
			  'fa fa-bath' => 'fa fa-bath',
			  'fa fa-podcast' => 'fa fa-podcast',
			  'fa fa-window-maximize' => 'fa fa-window-maximize',
			  'fa fa-window-minimize' => 'fa fa-window-minimize',
			  'fa fa-window-restore' => 'fa fa-window-restore',
			  'fa fa-window-close' => 'fa fa-window-close',
			  'fa fa-window-close-o' => 'fa fa-window-close-o',
			  'fa fa-bandcamp' => 'fa fa-bandcamp',
			  'fa fa-grav' => 'fa fa-grav',
			  'fa fa-etsy' => 'fa fa-etsy',
			  'fa fa-imdb' => 'fa fa-imdb',
			  'fa fa-ravelry' => 'fa fa-ravelry',
			  'fa fa-eercast' => 'fa fa-eercast',
			  'fa fa-microchip' => 'fa fa-microchip',
			  'fa fa-snowflake-o' => 'fa fa-snowflake-o',
			  'fa fa-superpowers' => 'fa fa-superpowers',
			  'fa fa-wpexplorer' => 'fa fa-wpexplorer',
			  'fa fa-meetup' => 'fa fa-meetup',
		),
		'description' => 'View any Icon on Font Awesome.com',
	) );
	$box->add_group_field( $group_side_tabs, array(
		'name' => 'Tab Link',
		'id'   => 'tab_link_url',
		'type' => 'text_url'
	) );
	$box->add_group_field( $group_side_tabs, array(
		'name' => 'Tab Color',
		'id'   => 'tab_color',
		'type' => 'colorpicker'
	) );
	
	
	$box->add_field( array(
		'name' 					=> 'Navigation',
		'id'   					=> 'nav',
		'type' 					=> 'title',
	));
	
	$box->add_field( array(
		'name' 					=> 'Navigation Style',
		'desc'					=> 'Choose the style of navigation',
		'id'   					=> 'nav_style',
		'type' => 'select',
		'options'          => array(
			'header-style-a' => 'Style A',
			'header-style-b' => 'Style B',
			'header-style-c' => 'Style C',
		),
		'default' => 'header-style-a'
	));
	
	$box->add_field( array(
		'name' 					=> 'Scroll Behavior',
		'desc'					=> 'Choose how you would like the navigation change once scrolled down the page',
		'id'   					=> 'scroll_style',
		'type' => 'select',
		'options'          => array(
			'full' => 'Full Version (stays the same)',
			'slim' => 'Slim Version',
			'no-stick' => 'Do Not Stick Nav to Top',
		),
		'default' => 'slim'
	));
	
	$box->add_field( array(
		'name' 					=> 'Module Specific',
		'id'   					=> 'module_title',
		'type' 					=> 'title',
	));
	
	$box->add_field( array(
		'name' 					=> 'Headline Style',
		'desc'					=> 'Bold or Skinny Headline Style',
		'id'   					=> 'headline_style',
		'type' => 'select',
		'options'          => array(
			'headline-bold' => 'Bold',
			'headline-skinny' => 'Skinny',
		),
		'default' => 'headline_skinny'
	));
	
	$box->add_field( array(
		'name' 					=> 'Headline Case',
		'desc'					=> 'Uppercase or Lowercase Headline Style',
		'id'   					=> 'headline_case',
		'type' => 'select',
		'options'          => array(
			'uppercase' => 'Uppercase',
			'none' => 'Lowercase',
		),
		'default' => 'uppercase'
	));
	
}

add_action( 'cmb2_admin_init', 'cmb2_appearance_options' );



function cmb2_form_options() {
	
	$box = new_cmb2_box( array(
		'id'           	=> 'form_info',
		'title'       	=> 'Form',
		'object_types' 	=> array( 'options-page' ),
		'option_key'    => 'form_info',
		'parent_slug'  => 'practice_info',
	));
	
	$box->add_field( array(
		'name' 					=> 'Dashboard Account ID',
		'id'   					=> 'form_account_id',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'Email address to send form to',
		'id'   					=> 'form_to',
		'type' 					=> 'text_email',
	));
	
	$box->add_field( array(
		'name' 					=> 'Email address to cc (optional)',
		'id'   					=> 'form_cc',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'Full URL to redirect user to after submitting form',
		'id'   					=> 'form_redirect',
		'type' 					=> 'text',
	));
	
	$box->add_field( array(
		'name' 					=> 'reCaptcha Unique Site Key (optional)',
		'id'   					=> 'form_recaptcha',
		'type' 					=> 'text',
	));
	
}

add_action( 'cmb2_admin_init', 'cmb2_form_options' );



?>