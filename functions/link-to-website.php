<?php
function custom_url_add_meta_box() {
    add_meta_box(
        'custom_url_meta_box', // Updated ID of the meta box
        'Website URL', // Updated title of the meta box
        'custom_url_meta_box_callback', // Updated callback function
        'post', // The screen or post type where you want the meta box to appear
        'side', // The context within the screen where the boxes should display
        'high' // The priority within the context where the boxes should show
    );
}
add_action('add_meta_boxes', 'custom_url_add_meta_box');

function custom_url_meta_box_callback($post) {
    wp_nonce_field('custom_url_save_data', 'custom_url_meta_box_nonce');
    $url_value = get_post_meta($post->ID, '_custom_url', true);
    echo '<p><label for="custom_url">Website URL:</label><input type="text" id="custom_url" name="custom_url" value="' . esc_attr($url_value) . '" style="width:100%;" placeholder="https://example.com"></p>';
}

function custom_url_save_post($post_id) {
    if (!isset($_POST['custom_url_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['custom_url_meta_box_nonce'], 'custom_url_save_data')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (!isset($_POST['custom_url'])) {
        return;
    }
    $sanitized_url = sanitize_text_field($_POST['custom_url']);
    update_post_meta($post_id, '_custom_url', $sanitized_url);
}
add_action('save_post', 'custom_url_save_post');
?>