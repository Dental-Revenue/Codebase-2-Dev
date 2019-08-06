<?php
$box->add_field(array(
    'name' => 'Title',
    'id' => $prefix . 'title',
    'type' => 'textarea_small',
    'desc' => 'Supports (Title){Subtitle}[Paragraph]'
));
$box->add_field(array(
    'name' => '# of Slides to Show',
    'id' => $prefix . 'num_slides',
    'type' => 'select',
    'options' => array(
        '3' => 'Three Logos',
        '4' => 'Four Logos',
        '5' => 'Five Logos'
    )
));
$box->add_field(array(
    'name' => 'Common Logos',
    'id' => $prefix . 'common_images',
    'type' => 'multicheck_inline',
    'options' => array(
        '/wp-content/themes/codebase-2/assets/images/layout/logo-ada.jpg' => 'ADA',
        '/wp-content/themes/codebase-2/assets/images/layout/logo-aacd.jpg' => 'AACD',
        '/wp-content/themes/codebase-2/assets/images/layout/logo-academy.jpg' => 'Academy of General Dentistry',
        '/wp-content/themes/codebase-2/assets/images/layout/logo-cerec.jpg' => 'CEREC',
        '/wp-content/themes/codebase-2/assets/images/layout/logo-invisalign.jpg' => 'Invisalign'
    )
));
$box->add_field(array(
    'name' => 'Custom Logos',
    'description' => 'Logo should be placed on 400x168 background',
    'id' => $prefix . 'images',
    'type' => 'file_list',
    'options' => array(
        'url' => false
    ),
    'query_args' => array(
        'type' => array(
            'image/gif',
            'image/jpeg',
            'image/png'
        )
    )
));
?>
