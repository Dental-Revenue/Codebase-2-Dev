<?php   

$box->add_field( array(
	'name' => 'Heading',
	'id' => $prefix.'heading',
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
	'name' => 'Embed Type',
	'desc' => 'e.g. YouTube, Vimeo, Video Link, Google Maps, 360 Tour, Custom',
	'id' => $prefix.'embedtype',
	'type' => 'select',
	'options'          => array(
		'youtube' => 'YouTube/Vimeo/Video Link',
		'iframe' => 'Google Maps/360 Tour',
		'image' => 'Image',
		'custom' => 'Custom',
	),
	'default' => 'youtube',
));

$box->add_field( array(
	'name' => 'Embed Link/Code',
	'desc' => '
	Example Formats<br>
	<b>Youtube:</b> https://www.youtube.com/watch?v=Bt6Lc-ZtK40<br>
	<b>Vimeo:</b> https://vimeo.com/356488179<br>
	<b>Video Link:</b> https://domain.com/full-url-to-video-file.mp4<br>
	<b>Google Maps:</b> https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12240.29188323585!2d-86.15893386304379!3d39.91738318164618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886b532b7cbe9af7%3A0x7c785cd4f68a817e!2sTarget!5e0!3m2!1sen!2sus!4v1620894529642!5m2!1sen!2sus<br>
	<b>360 Tour:</b> https://www.google.com/maps/embed?pb=!4v1572635860965!6m8!1m7!1sCAoSLEFGMVFpcE1OZUMxZ2VRaWlpZnpoSG12d29rUm5Ia0lHZGxOR1llV1UxQm8y!2m2!1d39.91738318164618!2d-86.15893386304379!3f0!4f0!5f0.7820865974627469<br>
	<b>Image:</b> https://cb2startercopy.wpengine.com/wp-content/uploads/2021/05/thumbnail.png<br>
	<b>Custom:</b> &lt;div class=&quot;wistia_embed wistia_async_x5b4h31rfr&quot;&gt;&lt;/div&gt;&lt;script src=&quot;//fast.wistia.com/embed/medias/x5b4h31rfr.jsonp&quot; async /&gt;&lt;script src=&quot;//fast.wistia.com/assets/external/E-v1.js&quot; async /&gt;
	',
	'id' => $prefix.'link',
	'type' => 'textarea_code',
));

$box->add_field( array(
	'name' => 'Description',
	'desc' => 'enter additional text',
	'id' => $prefix.'additional-text',
	'type' => 'text',
));

$box->add_field( array(
	'name' => 'Button Text',
	'id'   => $prefix.'btntext',
	'type' => 'text',
));
$box->add_field( array(
	'name' => 'Link to...',
	'id'   => $prefix.'btnlink',
	'type' => 'text',
));

$box->add_field( array(
	'name' => 'Image that will be used as the thumbnail',
	'id' => $prefix.'static_embed_image',
	'type' => 'file',
	'desc' => 'Upload an image that is 560px (width) and 315px (height) or 16:9 ratio for best results.',
));

?>