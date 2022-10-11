<?php	

$box->add_field( array(
	'name' => 'Side Image',
	'id'   => $prefix.'image',
	'type' => 'file',
	'options' => array('url' => false),
	'desc' => 'If this is an embed, this image will be used as the thumbnail.',
	'query_args' => array(
		'type' => array('image/gif','image/jpeg','image/png')
	)
));
$box->add_field( array(
	'name' => 'Side Image Type',
	'desc' => 'e.g. Image, Google Maps, 360 Tour, YouTube, Vimeo, Video Link, Custom',
	'id' => $prefix.'embedtype',
	'type' => 'select',
	'options'          => array(
		'image' => 'Image',
		'iframe' => 'Google Maps/360 Tour',
		'youtube' => 'YouTube/Vimeo/Video Link',
		'custom' => 'Custom',
	),
	'default' => 'image',
));
$box->add_field( array(
	'name' => 'Side Embed Link or Code',
	'desc' => '
	Example Formats<br>
	<b>Google Maps:</b> https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12240.29188323585!2d-86.15893386304379!3d39.91738318164618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886b532b7cbe9af7%3A0x7c785cd4f68a817e!2sTarget!5e0!3m2!1sen!2sus!4v1620894529642!5m2!1sen!2sus<br>
	<b>360 Tour:</b> https://www.google.com/maps/embed?pb=!4v1572635860965!6m8!1m7!1sCAoSLEFGMVFpcE1OZUMxZ2VRaWlpZnpoSG12d29rUm5Ia0lHZGxOR1llV1UxQm8y!2m2!1d39.91738318164618!2d-86.15893386304379!3f0!4f0!5f0.7820865974627469<br>
	<b>Youtube:</b> https://www.youtube.com/watch?v=Bt6Lc-ZtK40<br>
	<b>Vimeo:</b> https://vimeo.com/356488179<br>
	<b>Video Link:</b> https://domain.com/full-url-to-video-file.mp4<br>
	<b>Custom:</b> &lt;div class=&quot;wistia_embed wistia_async_x5b4h31rfr&quot;&gt;&lt;/div&gt;&lt;script src=&quot;//fast.wistia.com/embed/medias/x5b4h31rfr.jsonp&quot; async /&gt;&lt;script src=&quot;//fast.wistia.com/assets/external/E-v1.js&quot; async /&gt;
	',
	'id' => $prefix.'embed',
	'type' => 'textarea_code',
));
$box->add_field( array(
	'name' => 'Side Image Alt',
	'id' => $prefix.'side_image_alt',
	'type' => 'text',
));
$box->add_field( array(
	'name' => 'Side Image Position: Left or Right?',
	'id'   => $prefix.'side_image_left_right',
	'type' => 'select',
	'options'          => array(
		'left' => 'Left',
		'right' => 'Right',
	),
	'default' => 'left',
));
$box->add_field( array(
	'name' => 'Side Content Heading',
	'id' => $prefix.'headline',
	'type' => 'text',
));
$box->add_field(
	array(
		'name' => 'Subtitle',
		'id' => $prefix.'subtitle',
		'type' => 'text',
	)
);
$box->add_field( array(
	'name' => 'Replace Side Content with Form?',
	'id'   => $prefix.'display_form',
	'type' => 'select',
	'options'          => array(
		'yes' => 'Yes, Display Form and Hide Side Content Below',
		'no' => 'No',
	),
	'default' => 'no',
));
$box->add_field( array(
	'name' => 'Side Content',
	'id' => $prefix.'content',
	'type' => 'wysiwyg',
));
$box->add_field( array(
	'name' => 'Display Phone Number?',
	'id'   => $prefix.'display_phone',
	'type' => 'select',
	'options'          => array(
		'yes' => 'Yes',
		'no' => 'No',
	),
	'default' => 'yes',
));
$box->add_field( array(
	'name' => 'Display Address?',
	'id'   => $prefix.'display_address',
	'type' => 'select',
	'options'          => array(
		'yes' => 'Yes',
		'no' => 'No',
	),
	'default' => 'yes',
));
$box->add_field( array(
	'name' => 'Button Text',
	'id'   => $prefix.'btn_text',
	'type' => 'text',
));
$box->add_field( array(
	'name' => 'Button URL',
	'id'   => $prefix.'btn_url',
	'type' => 'text',
));
$box->add_field( array(
	'name' => 'Text Align',
	'id'   => $prefix.'text_align',
	'type' => 'select',
	'options'          => array(
		'left' => 'Left',
		'center' => 'Center',
		'right' => 'Right',
	),
	'default' => 'left',
));
$box->add_field( array(
	'name' => 'Text Padding',
	'id'   => $prefix.'text_padding',
	'type' => 'text',
    'attributes' => array(
        'type' => 'number',
    ),
	'default' => '5',
	'desc' => 'percent padding % (default is 5%)',

));

?>