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
		'default'				=> 'Mid-Atlantic Dental Studio'
	));
	
	$box->add_field( array(
		'name' 					=> 'Practice Logo',
		'id'   					=> 'practice_img',
		'type' => 'file',
		'options' => array('url' => false),
		'query_args' => array(
			'type' => array('image/gif','image/jpeg','image/png')
		),
		'attributes'  => array(
			'required'    => 'required',
		),
		'default'				=> get_template_directory_uri().'/assets/images/layout/default-logo.jpg'
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
		'default'				=> '3500 Boston Street Suite 421'
	));
	
	$box->add_field( array(
		'name' 					=> 'City',
		'id'   					=> 'city',
		'type' 					=> 'text',
		'default'				=> 'Baltimore'
	));
	
	$box->add_field( array(
		'name' 					=> 'State',
		'id'   					=> 'state',
		'type' 					=> 'text',
		'desc'					=> 'All caps, two letter abbreviation. Ex MD',
		'default'				=> 'MD'
	));
	
	$box->add_field( array(
		'name' 					=> 'Zip Code',
		'id'   					=> 'zip_code',
		'type' 					=> 'text',
		'default'				=> '21224'
	));
	
	$box->add_field( array(
		'name' 					=> 'New Patient Number',
		'id'   					=> 'new_patient_phone',
		'type' 					=> 'text',
		'attributes'  => array(
			'required'    => 'required',
		),
		'default'				=> '555-555-5555'
	));
	
	$box->add_field( array(
		'name' 					=> 'Current Patient Number',
		'id'   					=> 'current_patient_phone',
		'type' 					=> 'text',
		'default'				=> '444-444-4444'
	));
	
	$box->add_field( array(
		'name' 					=> 'Google Map',
		'id'   					=> 'google_map',
		'type' 					=> 'textarea',
		'desc'					=> 'Copy/Paste Google Map embed iframe here',
		'sanitization_cb' => false,
		'default'				=> '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3101.855715091177!2d-76.48322958464746!3d38.97296247955894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c803f40fba8ec9%3A0xed2615b8c0e64e5f!2sDental%20Revenue!5e0!3m2!1sen!2sus!4v1625243096578!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'
		));
	
		$box->add_field( array(
			'name' 					=> 'Google Map (Embed URL)',
			'id'   					=> 'google_map_embed_url',
			'type' 					=> 'textarea',
			'desc'					=> 'Copy/Paste Google Map embed url here',
			'default'				=> 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3101.855715091177!2d-76.48322958464746!3d38.97296247955894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c803f40fba8ec9%3A0xed2615b8c0e64e5f!2sDental%20Revenue!5e0!3m2!1sen!2sus!4v1625243096578!5m2!1sen!2sus'
	));
	
	$box->add_field( array(
		'name' 					=> 'Company Hours',
		'id'   					=> 'company_hours',
		'type' 					=> 'textarea',
		'desc'					=> 'Separate lines with a line break',
		'default'				=> 'Monday
9am-5pm
Tuesday
9am-5pm
Wednesday
9am-5pm
Thursday
9am-5pm
Friday
9am-5pm
Saturday-Sunday
Closed'
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
		'type' 					=> 'textarea',
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
	$parent_children_array = getMenuItemsFromLocation($menu_slug);

	foreach($parent_children_array as $top_level_item){
		if(!empty($top_level_item->children)){
			$box->add_field( array(
				'name' 					=> 'Menu Item: '.$top_level_item->name,
				'id'   					=> 'mega-title-'.$top_level_item->id,
				'type' 					=> 'title',
			));
			
			$box->add_field( array(
				'name' 					=> 'Headline',
				'id'   					=> 'mega-headline-'.$top_level_item->id,
				'type' 					=> 'text',
			));
			
			$box->add_field( array(
				'name' 					=> 'Description',
				'id'   					=> 'mega-desc-'.$top_level_item->id,
				'type' 					=> 'textarea',
			));
			
			$box->add_field( array(
				'name' 					=> 'Button Title',
				'id'   					=> 'mega-button-title-'.$top_level_item->id,
				'type' 					=> 'text',
			));
			
			$box->add_field( array(
				'name' 					=> 'Button URL',
				'id'   					=> 'mega-button-url-'.$top_level_item->id,
				'type' 					=> 'text_url',
			));
			
			$box->add_field( array(
				'name' 					=> 'Picture',
				'id'   					=> 'mega-file-'.$top_level_item->id,
				'type' 					=> 'file',
				'query_args' 		=> array(
					'type' => array(
						'image/jpeg',
						'image/png',
						'image/gif'
					)
				)
			));
			
			$box->add_field( array(
				'name' 					=> 'Menu Orientation',
				'id'   					=> 'mega-orientation-'.$top_level_item->id,
				'type' => 'radio_inline',
				'options'          => array(
					'side' => 'Side By Side',
					'top-bottom' => 'Top and Bottom',
				),
				'default' => 'side'
			));
			
		}
	}

}

/**
 * This function displays the columns on the Smart Gallery page in the admin dashboard
 *
 * @param mixed $columns The array of columns
 * 
 * @return void
 * 
 * @since 1.1.12
 */
function customPostsColumns( $columns )
{
    $columns = array(
        'cb' => $columns['cb'],
        'description' => __('Description'),
        'headshot' => __('Headshot'),
        'before' => __('Before'),
        'after' => __('After'),
        'tags' => __('Tags')
    );
    return $columns;
}
add_filter('manage_gallery_posts_columns', 'customPostsColumns');

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
		'default'				=> '#dd9933'
	));
	
	$box->add_field( array(
		'name' 					=> 'Heading Font',
		'desc'					=> 'Name of a Google Font',
		'id'   					=> 'heading_font',
		'type' 					=> 'text',
		'default'				=> 'Raleway'
	));
	
	$box->add_field( array(
		'name' 					=> 'Body Font',
		'desc'					=> 'Name of a Google Font',
		'id'   					=> 'body_font',
		'type' 					=> 'text',
		'default'				=> 'Karla'
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
			'closed'			=> true
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
			'header-style-d' => 'Style D',
			'header-style-e' => 'Style E',
		),
		'default' => 'header-style-a'
	));

	$box->add_field( array(
		'name' 					=> 'Navigation Color',
		'id'   					=> 'nav_color',
		'type' 					=> 'colorpicker',
		'default'				=> '#ffffff',
		'options' => array('alpha' => true),
	));
	
	$box->add_field( array(
		'name' 					=> 'CTA button text',
		'desc'					=> 'Text in CTA buttons. Default: Schedule Appointment',
		'id'   					=> 'cta_text',
		'type' 					=> 'text',
		'default'				=> 'Schedule Appointment'
	));
	
	$box->add_field( array(
		'name' 					=> 'CTA button url',
		'desc'					=> 'URL in CTA button. Default: /schedule-appointment/',
		'id'   					=> 'cta_url',
		'type' 					=> 'text',
		'default'				=> '/schedule-appointment/'
	));
	
	$box->add_field( array(
		'name' 					=> 'CTA button popup',
		'desc'					=> 'Instead of CTA button url, open as a popup form? Note: Only works on Navigation Style F (for now)',
		'id'   					=> 'cta_popup',
		'type' => 'select',
		'options'          => array(
			'popup' => 'Yes, open as a popup form',
			'no' => 'No, use CTA button url instead',
		),
		'default' => 'popup'
	));

	$box->add_field( array(
		'name'    => 'Optional Header Items',
		'desc'    => 'Logo, Navigation and New Patent # are required items.',
		'id'      => 'header_items',
		'type'    => 'multicheck_inline',
		'options' => array(
			'current_patient' => 'Current Patient #',
			'address' => 'Physical Address',
			'cta' => 'CTA Button',
		),
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
		'options' => array('teeny' => true,'textarea_rows' =>4)
	));
	
	$box->add_field( array(
		'name' 					=> 'Notification Message End Date',
		'desc'					=> 'When do you want the notification to end? Leave blank to have no end date.',
		'id'   					=> 'nav_notification_timestamp',
		'type' => 'text_date_timestamp'
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
