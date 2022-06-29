<?/**
 * Smart Gallery Lightbox
 *
 * This function creates the lightbox and options for the smart gallery template selection. This uses an in-house framework
 * that was built for us several years ago, so references to new_cmb2_box and the like are references to that.
 *
 * @since 1.1.12
 */

function smartGalleryMeta()
{
    $prefix = 'sg_';
    $box = new_cmb2_box(
        array(
        'id' => $prefix.'info',
        'title' => 'Gallery Options',
        'object_types' => array( 'page' ),
        'show_on' => array( 'key' => 'page-template', 'value' => 'page-templates/template-smart-gallery.php'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        )
    );    
    $box->add_field(
        array(
        'name'             => esc_html__('Columns', 'cmb2'),
        'desc'             => esc_html__('Choose how many columns the gallery should be', 'cmb2'),
        'id'               => $prefix . 'select',
        'type'             => 'select',
        'show_option_none' => false,
        'options'          => array(
            'one'   => esc_html__('One', 'cmb2'),
            'two'   => esc_html__('Two', 'cmb2'),
            'three' => esc_html__('Three', 'cmb2'),
            'four'  => esc_html__('Four', 'cmb2'),
            'six'   => esc_html__('Six', 'cmb2')
            ),
        )
    );  
}
add_action('cmb2_admin_init', 'smartGalleryMeta');
?>