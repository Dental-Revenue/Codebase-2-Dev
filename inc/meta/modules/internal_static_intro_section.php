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
    'name' => 'Paragraph',
    'id' => $prefix.'paragraph',
    'type' => 'wysiwyg',
    'options' => array(
        'textarea_rows' => 5
    )
));
$box->add_field( array(
    'name' => 'Display Paragraph on Mobile?',
    'id'   => $prefix.'paragraph_mobile',
    'type' => 'select',
    'options'          => array(
        'yes' => 'Yes',
        'no' => 'No',
    ),
    'default' => 'yes',
));
$box->add_field( array(
    'name' => 'Learn More Link',
    'desc' => 'enter url',
    'id' => $prefix.'link',
    'type' => 'text',
));


?>