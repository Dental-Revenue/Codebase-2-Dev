<?php

//PRACTICE INFO

function site_ops_practice_name($echo = true){
	$option = get_option('practice_info'); 
	if(!empty($option['practice_name'])){if($echo){echo $option['practice_name'];}else{return $option['practice_name'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_logo($echo = true, $id = false){
	$option = get_option('practice_info'); 
	if($id){
		if(!empty($option['practice_img'])){if($echo){echo $option['practice_img_id'];}else{return $option['practice_img_id'];}}else{if($echo){echo '';}else{return '';}}
	} else {
		if(!empty($option['practice_img'])){if($echo){echo $option['practice_img'];}else{return $option['practice_img'];}}else{if($echo){echo '';}else{return '';}}
	}
}

function site_ops_doc_1($echo = true){
	$option = get_option('practice_info'); 
	if(!empty($option['doc_name_1'])){if($echo){echo $option['doc_name_1'];}else{return $option['doc_name_1'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_doc_2($echo = true){
	$option = get_option('practice_info'); 
	if(!empty($option['doc_name_2'])){if($echo){echo $option['doc_name_2'];}else{return $option['doc_name_2'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_doc_3($echo = true){
	$option = get_option('practice_info'); 
	if(!empty($option['doc_name_3'])){if($echo){echo $option['doc_name_3'];}else{return $option['doc_name_3'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_address($echo = true){
	$option = get_option('practice_info'); 
	if(!empty($option['street_address'])){if($echo){echo $option['street_address'];}else{return $option['street_address'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_city($echo = true){
	$option = get_option('practice_info'); 
	if(!empty($option['city'])){if($echo){echo $option['city'];}else{return $option['city'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_state($echo = true){
	$option = get_option('practice_info'); 
	if(!empty($option['state'])){if($echo){echo $option['state'];}else{return $option['state'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_zip($echo = true){
	$option = get_option('practice_info'); 
	if(!empty($option['zip'])){if($echo){echo $option['zip'];}else{return $option['zip'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_new_patient_phone($echo = true){
	$option = get_option('practice_info'); 
	if(!empty($option['new_patient_phone'])){if($echo){echo $option['new_patient_phone'];}else{return $option['new_patient_phone'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_current_patient_phone($echo = true){
	$option = get_option('practice_info'); 
	if(!empty($option['current_patient_phone'])){if($echo){echo $option['current_patient_phone'];}else{return $option['current_patient_phone'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_google_map($echo = true){
	$option = get_option('practice_info'); 
	if(!empty($option['google_map'])){if($echo){echo $option['google_map'];}else{return $option['google_map'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_company_hours($echo = true){
	$option = get_option('practice_info'); 
	if(!empty($option['company_hours'])){if($echo){echo $option['company_hours'];}else{return $option['company_hours'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_google_review_url($echo = true){
	$option = get_option('practice_info'); 
	if(!empty($option['google_review_url'])){if($echo){echo $option['google_review_url'];}else{return $option['google_review_url'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_google_place_id($echo = true){
	$option = get_option('practice_info'); 
	if(!empty($option['google_place_id'])){if($echo){echo $option['google_place_id'];}else{return $option['google_place_id'];}}else{if($echo){echo '';}else{return '';}}
}

//SOCIAL INFO

function site_ops_facebook($echo = true){
	$option = get_option('social_info'); 
	if(!empty($option['facebook_link'])){if($echo){echo $option['facebook_link'];}else{return $option['facebook_link'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_twitter($echo = true){
	$option = get_option('social_info'); 
	if(!empty($option['twitter_link'])){if($echo){echo $option['twitter_link'];}else{return $option['twitter_link'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_linkedin($echo = true){
	$option = get_option('social_info'); 
	if(!empty($option['linkedin_link'])){if($echo){echo $option['linkedin_link'];}else{return $option['linkedin_link'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_instagram($echo = true){
	$option = get_option('social_info'); 
	if(!empty($option['instagram_link'])){if($echo){echo $option['instagram_link'];}else{return $option['instagram_link'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_google_plus($echo = true){
	$option = get_option('social_info'); 
	if(!empty($option['google_plus_link'])){if($echo){echo $option['google_plus_link'];}else{return $option['google_plus_link'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_youtube($echo = true){
	$option = get_option('social_info'); 
	if(!empty($option['youtube_link'])){if($echo){echo $option['youtube_link'];}else{return $option['youtube_link'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_yelp($echo = true){
	$option = get_option('social_info'); 
	if(!empty($option['yelp_link'])){if($echo){echo $option['yelp_link'];}else{return $option['yelp_link'];}}else{if($echo){echo '';}else{return '';}}
}

//TRACKING INFO

function site_ops_thank_you_conversion($echo = true){
	$option = get_option('tracking_info'); 
	if(!empty($option['thank_you_conversion'])){if($echo){echo $option['thank_you_conversion'];}else{return $option['thank_you_conversion'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_gtm_id($echo = true){
	$option = get_option('tracking_info'); 
	if(!empty($option['gtm_id'])){if($echo){echo $option['gtm_id'];}else{return $option['gtm_id'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_convirza_id($echo = true){
	$option = get_option('tracking_info'); 
	if(!empty($option['convirza_id'])){if($echo){echo $option['convirza_id'];}else{return $option['convirza_id'];}}else{if($echo){echo '';}else{return '';}}
}

//APPEARANCE INFO

function site_ops_brand_color($echo = true){
	$option = get_option('appearance_info'); 
	if(!empty($option['main_color'])){if($echo){echo $option['main_color'];}else{return $option['main_color'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_heading_font($echo = true){
	$option = get_option('appearance_info'); 
	if(!empty($option['heading_font'])){if($echo){echo $option['heading_font'];}else{return $option['heading_font'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_body_font($echo = true){
	$option = get_option('appearance_info'); 
	if(!empty($option['body_font'])){if($echo){echo $option['body_font'];}else{return $option['body_font'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_buttons_style($echo = true){
	$option = get_option('appearance_info'); 
	if(!empty($option['buttons_style'])){if($echo){echo $option['buttons_style'];}else{return $option['buttons_style'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_page_head_img($echo = true, $id = false){
	$option = get_option('appearance_info'); 
	if($id){
		if(!empty($option['page_head_img'])){if($echo){echo $option['page_head_img_id'];}else{return $option['page_head_img_id'];}}else{if($echo){echo '';}else{return '';}}
	} else {
		if(!empty($option['page_head_img'])){if($echo){echo $option['page_head_img'];}else{return $option['page_head_img'];}}else{if($echo){echo '';}else{return '';}}
	}
}

function site_ops_headline_style($echo = true){
	$option = get_option('appearance_info'); 
	if(!empty($option['headline_style'])){if($echo){echo $option['headline_style'];}else{return $option['headline_style'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_headline_case($echo = true){
	$option = get_option('appearance_info'); 
	if(!empty($option['headline_case'])){if($echo){echo $option['headline_case'];}else{return $option['headline_case'];}}else{if($echo){echo '';}else{return '';}}
}

//FORM INFO

function site_ops_dashboard_account_id($echo = true){
	$option = get_option('form_info'); 
	if(!empty($option['form_account_id'])){if($echo){echo $option['form_account_id'];}else{return $option['form_account_id'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_form_to_email($echo = true){
	$option = get_option('form_info'); 
	if(!empty($option['form_to'])){if($echo){echo $option['form_to'];}else{return $option['form_to'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_dashboard_cc_email($echo = true){
	$option = get_option('form_info'); 
	if(!empty($option['form_cc'])){if($echo){echo $option['form_cc'];}else{return $option['form_cc'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_form_redirect_url($echo = true){
	$option = get_option('form_info'); 
	if(!empty($option['form_redirect'])){if($echo){echo $option['form_redirect'];}else{return $option['form_redirect'];}}else{if($echo){echo '';}else{return '';}}
}

function site_ops_recaptcha($echo = true){
	$option = get_option('form_info'); 
	if(!empty($option['form_recaptcha'])){if($echo){echo $option['form_recaptcha'];}else{return $option['form_recaptcha'];}}else{if($echo){echo '';}else{return '';}}
}

?>