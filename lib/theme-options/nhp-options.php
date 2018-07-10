<?php
if(!class_exists('NHP_Options')){
	require_once( dirname( __FILE__ ) . '/files/options.php' );
}


/*   OPTIONS   */

function setup_framework_options(){
$args = array();

$args['dev_mode'] = false;

//Add HTML before the form
$args['intro_text'] = __('<!--<p>This is the HTML which can be displayed before the form, it isnt required, but more info is always better. Anything goes in terms of markup here, any HTML.</p>-->', 'nhp-opts');

//Choose to disable the import/export feature
$args['show_import_export'] = false;

//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$args['opt_name'] = 'codebase';

//Custom menu title for options page - default is "Options"
$args['menu_title'] = __('Theme Options', 'nhp-opts');

//Custom Page Title for options page - default is "Options"
$args['page_title'] = __('Theme options', 'nhp-opts');

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
$args['page_slug'] = 'nhp_theme_options';

//custom page location - default 100 - must be unique or will override other items
$args['page_position'] = 127;

//Disable tabs from showing as sub menus
$args['allow_sub_menu'] = false;

$sections = array();



//get DS theme data
$theme_data = wp_get_theme();
$theme_name = $theme_data->get( 'Name' );
$theme_version = $theme_data->get( 'Version' );


				
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_019_cogwheel.png',
				'title' => __('General Settings', 'nhp-opts'),
				'desc' => __('<p class="description">Phone Numbers, Address, etc</p>', 'nhp-opts'),
				'fields' => array(
  				
        array(
						'id' => 'practice_name', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Name of Practice', 'nhp-opts'),
						),
						
        array(
						'id' => 'doctor_name', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Doctor Name', 'nhp-opts'),
						),
						
				array(
						'id' => 'doctor_name_two', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Doctor Name Version Two', 'nhp-opts'),
						),
						
				array(
						'id' => 'doctor_name_three', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Doctor Name Version Three', 'nhp-opts'),
						),
						
        array(
						'id' => 'street_address', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Street Address', 'nhp-opts'),
						'desc' => __('Include suite if applicable. Do not include city, state or zip.', 'nhp-opts'),
						),	
						
        array(
						'id' => 'city', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('City', 'nhp-opts'),
						),	
            
        array(
						'id' => 'state', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('State', 'nhp-opts'),
						'desc' => __('All caps, two letter abbreviation. Ex MD', 'nhp-opts'),
						),	
						
				array(
						'id' => 'zip_code', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Zip Code', 'nhp-opts'),
						),	
				
				array(
						'id' => 'new_patient_phone', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('New Patient Number', 'nhp-opts'),
						),
						
				array(
						'id' => 'current_patient_phone', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Current Patient Number', 'nhp-opts'),
						),
						
				array(
						'id' => 'google_map', //must be unique
						'type' => 'textarea', //builtin fields include:
						'title' => __('Google Map', 'nhp-opts'),
						'desc' => __('Copy/Paste Google Map embed iframe here', 'nhp-opts'),
						),	
						
				array(
						'id' => 'company_hours', //must be unique
						'type' => 'textarea', //builtin fields include:
						'title' => __('Company Hours', 'nhp-opts'),
						'desc' => __('Separate lines with a line break', 'nhp-opts'),
						),
						
        array(
						'id' => 'review_link', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Google Review URL', 'nhp-opts'),
						'validate' => 'url', //builtin validation includes: email|html|html_custom|no_html|js|numeric|url
						)
						
					)
				);
/*------------------------

	:: Social Settings
	
-------------------------*/				
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_003_user.png',
				'title' => __('Social Media Settings', 'nhp-opts'),
				'desc' => __('<p class="description">Facebook, Twitter, YouTube, etc</p>', 'nhp-opts'),
				'fields' => array(
				
				array(
						'id' => 'facebook_link', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Facebook URL', 'nhp-opts'),
						'validate' => 'url', //builtin validation includes: email|html|html_custom|no_html|js|numeric|url
						),
					
				array(
						'id' => 'twitter_link', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Twitter URL', 'nhp-opts'),
						'validate' => 'url', //builtin validation includes: email|html|html_custom|no_html|js|numeric|url
						),
					
				array(
						'id' => 'linkedin_link', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('LinkedIn URL', 'nhp-opts'),
						'validate' => 'url', //builtin validation includes: email|html|html_custom|no_html|js|numeric|url
						),
						
				array(
						'id' => 'googleplus_link', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Google+ URL', 'nhp-opts'),
						'validate' => 'url', //builtin validation includes: email|html|html_custom|no_html|js|numeric|url
						),
						
				array(
						'id' => 'instagram_link', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Instagram URL', 'nhp-opts'),
						'validate' => 'url', //builtin validation includes: email|html|html_custom|no_html|js|numeric|url
						),
						
        array(
						'id' => 'youtube_link', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Youtube URL', 'nhp-opts'),
						'validate' => 'url', //builtin validation includes: email|html|html_custom|no_html|js|numeric|url
						)				
						
					)
				);
				

//add yelp support (conditionally for ds1 and ds3)			
if( ($theme_name!='ds-1' && $theme_name!='ds-3') || ($theme_name=='ds-1' && version_compare($theme_version,  "1.1.4")>=0) || ($theme_name=='ds-3' && version_compare($theme_version,  "1.1.3")>=0) ){
  $newdata = array( 'id' => 'yelp_link', 'type' => 'text', 'title' => __('Yelp URL', 'nhp-opts'),'validate' => 'url' );
  array_push($sections[1]['fields'],$newdata); 
}


//add google reviews support			
if( ($theme_name=='ds-1' && version_compare($theme_version,  "1.1.14")>=0) || ($theme_name=='ds-2' && version_compare($theme_version,  "1.0.4")>=0) || ($theme_name=='ds-3' && version_compare($theme_version,  "1.1.13")>=0) ){
  $newdata = array( 'id' => 'google_place_id', 'type' => 'text', 'title' => __('Google Place ID', 'nhp-opts') );
  array_push($sections[0]['fields'],$newdata); 
}
				
				
/*------------------------

	:: SEO Settings
	
-------------------------*/				
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_040_stats.png',
				'title' => __('SEO & Conversion Settings', 'nhp-opts'),
				'desc' => __('<p class="description">Google Analytics</p>', 'nhp-opts'),
				'fields' => array(
				
				array(
						'id' => 'thank_you_conversion', //must be unique
						'type' => 'textarea', //builtin fields include:
						'title' => __('Thank You Page Conversion Code', 'nhp-opts'),
						'desc' => __('Copy/Paste code here', 'nhp-opts'),
						),
						
				array(
						'id' => 'gtm_id', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Google Tag Manager ID', 'nhp-opts'),
						'desc' => __('Just the ID, not the whole script', 'nhp-opts'),
						),
						
				array(
						'id' => 'convirza_id', //must be unique
						'type' => 'text', //builtin fields include:
						'title' => __('Convirza Tracking ID', 'nhp-opts'),
						'desc' => __('Just the ID, not the whole script', 'nhp-opts'),
						),
						
					)
				);
				

/*------------------------

	:: FORM Settings
	
-------------------------*/					
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_019_cogwheel.png',
				'title' => __('Form Settings', 'nhp-opts'),
				'desc' => __('<p class="description">Settings for all contact forms on site.</p>', 'nhp-opts'),
				'fields' => array(
				
				array(
						'id' => 'form_account_id',
						'type' => 'text',
						'title' => __('Dashboard Account ID', 'nhp-opts'),
						),
						
				array(
						'id' => 'form_to',
						'type' => 'text',
						'title' => __('Email address to send form to', 'nhp-opts'),
						),
						
				array(
						'id' => 'form_cc',
						'type' => 'text',
						'title' => __('Email address to cc (optional)', 'nhp-opts'),
						),
						
				array(
						'id' => 'form_redirect',
						'type' => 'text',
						'title' => __('Full URL to redirect user to after submitting form', 'nhp-opts'),
						),	
						
		    array(
						'id' => 'form_recaptcha',
						'type' => 'text',
						'title' => __('reCaptcha Unique Site Key (optional)', 'nhp-opts'),
						)								
					
					)
				);			
				
				
	$tabs = array();
	

			

	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}//function
add_action('init', 'setup_framework_options', 0);





?>