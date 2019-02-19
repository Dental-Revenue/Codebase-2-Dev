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


function cmb2_mega_menu_options() {
	
	$box = new_cmb2_box( array(
		'id'           	=> 'mega_menu_info',
		'title'       	=> 'Mega Menu',
		'object_types' 	=> array( 'options-page' ),
		'option_key'    => 'mega_menu_info',
		'parent_slug'  	=> 'practice_info',
	));
	
	//create boxes based on what is in the navigation
	$menu_slug = 'primary-navigation';
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_slug ] ) ) {
		$menu = get_term( $locations[ $menu_slug ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		foreach( $menu_items as $menu_item ) {
			//Need to check for has_children 
			if ( !$menu_item->menu_item_parent ) {
				
				$box->add_field( array(
					'name' 					=> 'Menu Item: '.$menu_item->title,
					'id'   					=> 'mega-title-'.$menu_item->ID,
					'type' 					=> 'title',
				));
				
				$box->add_field( array(
					'name' 					=> 'Headline',
					'id'   					=> 'mega-headline-'.$menu_item->ID,
					'type' 					=> 'text',
				));
				
				$box->add_field( array(
					'name' 					=> 'Description',
					'id'   					=> 'mega-desc-'.$menu_item->ID,
					'type' 					=> 'text',
				));
				
				$box->add_field( array(
					'name' 					=> 'Picture',
					'id'   					=> 'mega-file-'.$menu_item->ID,
					'type' 					=> 'text',
				));
				
				
			}	
		}
	}
 
	
}

add_action( 'cmb2_admin_init', 'cmb2_mega_menu_options' );

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
			'fas fa-book' => 'Book',
			'fas fa-calendar-alt' => 'Calendar',
			'fas fa-user-md' => 'Doctor',
			'fas fa-first-aid' => 'First Aid',
			'fab fa-wpforms' => 'Form',
			'fas fa-th' => 'Grid',
			'fas fa-heart' => 'Heart',
			'fas fa-hostpital' => 'Hospital',
			'fas fa-images' => 'Images',
			'fas fa-info-circle' => 'Info Circle',
			'fas fa-arrow-left' => 'Left Arrow',
			'fas map-marker-alt' => 'Map Pin',
			'fas fa-file-medical-alt' => 'Medical File',
			'fas fa-money-check-alt' => 'Money Card',
			'fas fa-user-nurse' => 'Nurse',
			'fab fa-paypal' => 'Paypal',
			'fas fa-file-pdf' => 'PDF',
			'fas fa-phone' => 'Phone',
			'fas fa-arrow-right' => 'Right Arrow',
			'fas fa-shopping-bag' => 'Shopping Bag',
			'fas fa-comment' => 'Speech Bubble',
			'fas fa-tooth' => 'Tooth'		
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
		'name' 					=> 'Notification Message',
		'desc'					=> 'Put a phrase in to activate the notification bar.',
		'id'   					=> 'nav_notification',
		'type' => 'wysiwyg',
		'options' => array('teeny' => true)
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