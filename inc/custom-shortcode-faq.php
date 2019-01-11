<?php
function init_my_shortcode_button_faq() {

	$button_slug = 'faqs';
	$js_button_data = array(
		'qt_button_text' => __( 'Add FAQs', 'shortcode-button' ),
		'button_tooltip' => __( 'Add FAQs', 'shortcode-button' ),
		'icon'           => 'dashicons-info',
		'include_close'  => false, // Will wrap your selection in the shortcode
		'mceView'        => true, // Live preview of shortcode in editor. YMMV.
		'l10ncancel'     => __( 'Cancel', 'shortcode-button' ),
		'l10ninsert'     => __( 'Insert FAQs', 'shortcode-button' ),
	);

	// Optional additional parameters
	$additional_args = array(
		'cmb_metabox_config'   => 'shortcode_button_cmb_config_faq',
	);

	$button = new Shortcode_Button( $button_slug, $js_button_data, $additional_args );
}
// This hook, with this priority ensures the Shortcode_Button library is loaded.
add_action( 'shortcode_button_load', 'init_my_shortcode_button_faq', ( SHORTCODE_BUTTONS_LOADED + 1 ) );

/**
 * Return CMB2 config array
 *
 * @param  array  $button_data Array of button data
 *
 * @return array               CMB2 config array
 */
function shortcode_button_cmb_config_faq( $button_data ) {

	return array(
		'id'     => 'shortcode_'. $button_data['slug'],
		'fields' => array(
			array(
				'name'    => 'Title (optional)',
				'id'      => 'title',
				'type'    => 'text',
			),
			array(
				'title'		=> 'Questions/Answers',
				'id'      => 'faq_group',
				'type'    => 'group',
				'options'	=> array(
					'group_title'   => 'Question {#}', // since version 1.1.4, {#} gets replaced by row number
          'add_button'    => 'Add Question',
          'remove_button' => 'Remove Question',
          'sortable'      => true, // beta
          'closed'        => true, // true to have the groups closed by default
				),
				'fields'	=> array(
					array(
						'name'    => 'FAQ Question',
						'id'      => 'faq_question',
						'type'    => 'text',
					),
					array(
						'name'    => 'FAQ Answer',
						'id'      => 'faq_answer',
						'type'    => 'textarea',
					)
				)
			),
		),
		// keep this w/ a key of 'options-page' and use the button slug as the value
		'show_on' => array( 'key' => 'options-page', 'value' => $button_data['slug'] ),
	);

}

function add_my_shortcode_button_faq($atts, $content = ""){
	//ISSUE: shortcode function tries to convert all characters trailing a '/' as ascii chars. Newlines and returns that are generated by the shortcode function are not able to be identified to turn into true paragraph breaks.
	extract(shortcode_atts(array(
    'title' => '',
    'faq_group' => ''
  ), $atts));
  
  $faq_group = preg_replace(array('/\|~/','/~\|/','/\'/','/\s+/'),array('[',']','"',' '),$faq_group); //replaces |~,[ + ~|,] + '," + all whitespace,' ' + \r\n,^
	$faq_group_array = json_decode($faq_group, true);
	$output = '';
	$output .= '<div class="faq_shortcode_contain">';
	$output .= '<h2>'.$title.'</h2><div class="faq_accordion">';
	
	foreach($faq_group_array as $faq_group){
		//$output .= 'question: '.$faq_group['faq_question'].'<br/><br/>answer: '.$faq_group['faq_answer'].'<br/>';
		$output .= '<span data-accordion="question"><a href="#">'.$faq_group['faq_question'].'</a></span>';
		$output .= '<span data-accordion="answer">'.wpautop($faq_group['faq_answer']).'</span>';
	}
	
	$output .= '</div></div>';
/*
	ob_start();
  var_dump($faq_group_array);
  $result = ob_get_clean();
*/
/*
	$attsArray = $atts['faq_group'];
	ob_start();
  var_dump($attsArray);
  $result = ob_get_clean();
  return $result;
*/

  
  return htmlentities($atts['faq_group']);

  
	//return $faq_group_array[0];
	//return $output;
	
	
}

add_shortcode('faqs', 'add_my_shortcode_button_faq');



?>