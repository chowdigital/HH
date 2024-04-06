<?php
function wpb_add_custom_meta_box() {
    add_meta_box(
        'wpb_post_logo', // ID of the meta box
        'Post Logo', // Title of the meta box
        'wpb_post_logo_callback', // Callback function that will echo the HTML of the meta box
        'post', // The screen or post type where you want the meta box to appear
        'side', // The context within the screen where the boxes should display
        'high' // The priority within the context where the boxes should show
    );
}
add_action('add_meta_boxes', 'wpb_add_custom_meta_box');

function wpb_post_logo_callback($post) {
    wp_nonce_field('wpb_save_post_logo_data', 'wpb_post_logo_meta_box_nonce');
    $value = get_post_meta($post->ID, '_wpb_post_logo', true);
    echo '<p><button type="button" id="wpb_post_logo_upload_btn" class="button">Upload Logo</button></p>';
    echo '<p><input type="text" id="wpb_post_logo_url" name="wpb_post_logo_url" value="' . esc_attr($value) . '" style="width:100%;" /></p>';
}

function wpb_post_logo_upload_js() {
    ?><script>
jQuery(document).ready(function($) {
    var mediaUploader;
    $('#wpb_post_logo_upload_btn').click(function(e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Logo',
            button: {
                text: 'Choose Logo'
            },
            multiple: false
        });
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#wpb_post_logo_url').val(attachment.url);
        });
        mediaUploader.open();
    });
});
</script><?php
}
add_action('admin_footer', 'wpb_post_logo_upload_js');


function wpb_save_post_logo($post_id) {
    // Check if our nonce is set.
    if (!isset($_POST['wpb_post_logo_meta_box_nonce'])) {
        return;
    }
    // Verify that the nonce is valid.
    if (!wp_verify_nonce($_POST['wpb_post_logo_meta_box_nonce'], 'wpb_save_post_logo_data')) {
        return;
    }
    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Check the user's permissions.
    if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    // Make sure that it is set.
    if (!isset($_POST['wpb_post_logo_url'])) {
        return;
    }
    // Sanitize user input.
    $my_data = sanitize_text_field($_POST['wpb_post_logo_url']);
    // Update the meta field in the database.
    update_post_meta($post_id, '_wpb_post_logo', $my_data);
}
add_action('save_post', 'wpb_save_post_logo');


?>