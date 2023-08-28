<?php
$box->add_field( array(
    'name' => 'Overlap',
    'desc' => 'Enter a negative number, in any CSS unit (ex. -4rem, -4px, -4vh)',
    'classes' => 'double-rule',
    'id' => $prefix.'overlap',
    'type' => 'text'
));
$box->add_field( array(
    'name' => 'Bottom Margin',
    'desc' => 'Enter a negative number, in any CSS unit (ex. -4rem, -4px, -4vh)',
    'classes' => 'double-rule',
    'id' => $prefix.'bottom_margin',
    'type' => 'text'
));
$box->add_field(
    array(
        'name'    => 'Padding',
        'desc'    => 'Set the vertical padding for this module',
        'id'      => $prefix.'sis_padding',
        'type'    => 'text',
        'deafult' => '0'
    )
);
$box->add_field( array(
    'name' => 'Left Content Type',
    'desc' => 'e.g. Text/Image, Google Maps/360 Tour, YouTube/Vimeo/Video Link, Form, Custom',
    'id' => $prefix.'left_content_type',
    'type' => 'select',
    'options'          => array(
        'text' => 'Text',
        'image' => 'Image',
        'iframe' => 'Google Maps/360 Tour',
        'youtube' => 'YouTube/Vimeo/Video Link',
        'form' => 'Form',
        'custom' => 'Custom',
    ),
    'default' => 'text-image',
));
$box->add_field( array(
    'name' => 'Left Image',
    'id'   => $prefix.'left_image',
    'type' => 'file',
    'options' => array('url' => false),
    'desc' => 'The image for the left side. If there is also a video, this will be the poster image.',
    'query_args' => array(
        'type' => array('image/gif', 'image/jpeg', 'image/png')
    )
));
$box->add_field( array(
    'name' => 'Left Image Alt',
    'id' => $prefix.'left_image_alt',
    'type' => 'text',
));
$box->add_field( array(
    'name' => 'Left Side Embed Link or Code',
    'desc' => '
    Example Formats<br>
    <b>Google Maps:</b> Embed it with the iframe tag included.<br>
    <b>The ideal size for a Google Map is 1200x900<br>
    <b>360 Tour:</b> https://www.google.com/maps/embed?pb=!4v1572635860965!6m8!1m7!1sCAoSLEFGMVFpcE1OZUMxZ2VRaWlpZnpoSG12d29rUm5Ia0lHZGxOR1llV1UxQm8y!2m2!1d39.91738318164618!2d-86.15893386304379!3f0!4f0!5f0.7820865974627469<br>
    <b>Youtube:</b> https://www.youtube.com/watch?v=Bt6Lc-ZtK40<br>
    <b>Vimeo:</b> https://vimeo.com/356488179<br>
    <b>Video Link:</b> https://domain.com/full-url-to-video-file.mp4<br>
    <b>Custom:</b> &lt;div class=&quot;wistia_embed wistia_async_x5b4h31rfr&quot;&gt;&lt;/div&gt;&lt;script src=&quot;//fast.wistia.com/embed/medias/x5b4h31rfr.jsonp&quot; async /&gt;&lt;script src=&quot;//fast.wistia.com/assets/external/E-v1.js&quot; async /&gt;<br>
    <b>Videos used here will not autoplay; to autoplay a video, it must be an mp4 or webm file.
    ',
    'id' => $prefix.'left_embed',
    'type' => 'textarea_code',
));
$box->add_field( array(
    'name' => 'Left Video (webm)',
    'id' => $prefix.'left_video_webm',
    'type' => 'file'
));
$box->add_field( array(
  'name' => 'Left Video (mp4)',
  'id' => $prefix.'left_video_mp4',
  'type' => 'file'
));
$box -> add_field(
    array(
        'name' => 'Left Text Background Color',
        'desc' => '
        Example Formats<br>
        <b>Translucent Black:</b> 0,0,0,0.2<br>
        <b>Solid White:</b> 255,255,255,1<br>
        <b>Half-Translucent Blue:</b> 0,0,255,0.5<br>
        Codes must be in this format, with four number and three commas. For the last value,<br>
        0 is completely transparent and 1 is completely solid.<br>
        Default is solid white.',
        'id' => $prefix.'left_rgba',
        'type' => 'text',
        'default' => '255,255,255,1'
    )
);
$box->add_field( array(
    'name' => 'Left Title',
    'id' => $prefix.'left_title',
    'type' => 'text',
));
$box->add_field( array(
    'name' => 'Left Subtitle',
    'id' => $prefix.'left_subtitle',
    'type' => 'text',
));
$box->add_field( array(
    'name' => 'Left Side Excerpt',
    'id' => $prefix.'left_excerpt',
    'type' => 'wysiwyg',
));
$box->add_field( array(
    'name' => 'Left Phone Number?',
    'id'   => $prefix.'left_display_phone',
    'type' => 'select',
    'options'          => array(
        'yes' => 'Yes',
        'no' => 'No',
    ),
    'default' => 'no',
));
$box->add_field( array(
    'name' => 'Left Display Address?',
    'id'   => $prefix.'left_display_address',
    'type' => 'select',
    'options'          => array(
        'yes' => 'Yes',
        'no' => 'No',
    ),
    'default' => 'no',
));
$box->add_field( array(
    'name' => 'Left Button Text',
    'id'   => $prefix.'left_btn_text',
    'type' => 'text',
));
$box->add_field( array(
    'name' => 'Left Button URL',
    'id'   => $prefix.'left_btn_url',
    'type' => 'text',
));
$box->add_field( array(
    'name' => 'Left Form Logo',
    'id'   => $prefix.'left_logo',
    'type' => 'file'
));
$box->add_field( array(
    'name' => 'Right Side Content Type',
    'desc' => 'e.g. Text/Image, Google Maps/360 Tour, YouTube/Vimeo/Video Link, Form, Custom',
    'id' => $prefix.'right_content_type',
    'type' => 'select',
    'options'          => array(
        'text' => 'Text',
        'image' => 'Image',
        'iframe' => 'Google Maps/360 Tour',
        'youtube' => 'YouTube/Vimeo/Video Link',
        'form' => 'Form',
        'custom' => 'Custom',
    ),
    'default' => 'text',
));
$box->add_field( array(
    'name' => 'Right Image',
    'id'   => $prefix.'right_image',
    'type' => 'file',
    'options' => array('url' => false),
    'desc' => 'The image for the right side. If there is also a video, this will be the poster image.',
    'query_args' => array(
        'type' => array('image/gif', 'image/jpeg','image/png')
    )
));
$box->add_field( array(
    'name' => 'Right Image Alt',
    'id' => $prefix.'right_image_alt',
    'type' => 'text',
));
$box->add_field( array(
    'name' => 'Right Side Embed Link or Code',
    'desc' => '
    <b>Google Maps:</b> Embed it with the iframe tag included.<br>
    <b>The ideal size for a Google Map is 1200x900<br>
    <b>360 Tour:</b> https://www.google.com/maps/embed?pb=!4v1572635860965!6m8!1m7!1sCAoSLEFGMVFpcE1OZUMxZ2VRaWlpZnpoSG12d29rUm5Ia0lHZGxOR1llV1UxQm8y!2m2!1d39.91738318164618!2d-86.15893386304379!3f0!4f0!5f0.7820865974627469<br>
    <b>Youtube:</b> https://www.youtube.com/watch?v=Bt6Lc-ZtK40<br>
    <b>Vimeo:</b> https://vimeo.com/356488179<br>
    <b>Video Link:</b> https://domain.com/full-url-to-video-file.mp4<br>
    <b>Custom:</b> &lt;div class=&quot;wistia_embed wistia_async_x5b4h31rfr&quot;&gt;&lt;/div&gt;&lt;script src=&quot;//fast.wistia.com/embed/medias/x5b4h31rfr.jsonp&quot; async /&gt;&lt;script src=&quot;//fast.wistia.com/assets/external/E-v1.js&quot; async /&gt;<br>
    <b>Videos used here will not autoplay; to autoplay a video, it must be an mp4 or webm file.
    ',
    'id' => $prefix.'right_embed',
    'type' => 'textarea_code',
));
$box->add_field( array(
    'name' => 'Right Video (webm)',
    'id' => $prefix.'right_video_webm',
    'type' => 'file'
));
$box->add_field( array(
  'name' => 'Right Video (mp4)',
  'id' => $prefix.'right_video_mp4',
  'type' => 'file'
));
$box -> add_field(
    array(
        'name' => 'Right Text Background Color',
        'desc' => '
        Example Formats<br>
        <b>Translucent Black:</b> 0,0,0,0.2<br>
        <b>Solid White:</b> 255,255,255,1<br>
        <b>Half-Translucent Blue:</b> 0,0,255,0.5<br>
        Codes must be in this format, with four number and three commas. For the last value,<br>
        0 is completely transparent and 1 is completely solid.',
        'id' => $prefix.'right_rgba',
        'type' => 'text',
        'default' => '255,255,255,1'
    )
);
$box->add_field( array(
    'name' => 'Right Title',
    'id' => $prefix.'right_title',
    'type' => 'text',
));
$box->add_field( array(
    'name' => 'Right Subtitle',
    'id' => $prefix.'right_subtitle',
    'type' => 'text',
));
$box->add_field( array(
    'name' => 'Right Side Excerpt',
    'id' => $prefix.'right_excerpt',
    'type' => 'wysiwyg',
));
$box->add_field( array(
    'name' => 'Right Phone Number?',
    'id'   => $prefix.'right_display_phone',
    'type' => 'select',
    'options'          => array(
        'yes' => 'Yes',
        'no' => 'No',
    ),
    'default' => 'no',
));
$box->add_field( array(
    'name' => 'Right Display Address?',
    'id'   => $prefix.'right_display_address',
    'type' => 'select',
    'options'          => array(
        'yes' => 'Yes',
        'no' => 'No',
    ),
    'default' => 'no',
));
$box->add_field( array(
    'name' => 'Right Button Text',
    'id'   => $prefix.'right_btn_text',
    'type' => 'text',
));
$box->add_field( array(
    'name' => 'Right Button URL',
    'id'   => $prefix.'right_btn_url',
    'type' => 'text',
));
$box->add_field( array(
    'name' => 'Right Form Logo',
    'id'   => $prefix.'right_logo',
    'type' => 'file'
));
?>