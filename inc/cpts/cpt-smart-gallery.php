<?/**
 * Smart Gallery Custom Post Type
 *
 * This function populates the columns in the Smart Gallery section of the admin dashboard.
 *
 * @since 1.1.12
 */

 /**
 * @param string  $column  The name of the column
 * @param integer $post_id The id of the gallery post
 * 
 * @return void
 */
function galleryColumn( $column, $post_id )
{
    $picture = get_post($post_id);
    switch ($column) {
    case 'headshot':
        echo '<img src="' . wp_get_attachment_image_src($picture->headshot)[0] . '" />';
        break;
    case 'before':
        echo '<img src="' . wp_get_attachment_image_src($picture->before_image)[0] . '" />';
        break;
    case 'after':
        echo '<img src="' . wp_get_attachment_image_src($picture->after_image)[0] . '" />';
        break;
    case 'description':
        echo $picture->description;
        break;
    case 'tags':
        echo '<ul class="tags-list">\n';
        foreach ($picture->tags as $tag) {
            echo '<li class="admin-tag">' . $tag . '</li>\n';
        }
        echo '</ul>';
        break;
    }
}
add_action('manage_posts_custom_column', 'galleryColumn', 10, 2);
?>