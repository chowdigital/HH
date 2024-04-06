<?php
// Add Meta Box
function custom_venues_info_add_meta_box() {
    // We'll check the post category inside the callback function to ensure we have the correct $post object
    add_meta_box(
        'custom_venues_info_meta_box', // Unique ID for the meta box
        'Venue Information', // Title of the meta box
        'custom_venues_info_meta_box_callback', // Callback function
        'post', // Post type
        'normal', // Context (where on the screen)
        'high' // Priority
    );
}
add_action('add_meta_boxes', 'custom_venues_info_add_meta_box');

// Meta Box Display Callback
function custom_venues_info_meta_box_callback($post) {
    // Now, we check if the post has the 'venues' category
    if (!has_category('venues', $post->ID)) {
        echo 'This meta box is only available for posts in the "Venues" category.';
        return; // Exit if not in the specified category
    }

    wp_nonce_field('custom_venues_info_save_data', 'custom_venues_info_meta_box_nonce');

    // Retrieve existing values from post meta
    $location = get_post_meta($post->ID, '_custom_venues_location', true);
    $standing_capacity = get_post_meta($post->ID, '_custom_venues_standing_capacity', true);
    $seated_capacity = get_post_meta($post->ID, '_custom_venues_seated_capacity', true);
    $size = get_post_meta($post->ID, '_custom_venues_size', true);
    $key_features = get_post_meta($post->ID, '_custom_venues_key_features', true);

    // HTML for the fields
    echo '<label for="custom_venues_location">Location:</label>';
    echo '<input type="text" id="custom_venues_location" name="custom_venues_location" value="' . esc_attr($location) . '" style="width:100%;"/><br/>';

    echo '<label for="custom_venues_standing_capacity">Standing Capacity:</label>';
    echo '<input type="number" id="custom_venues_standing_capacity" name="custom_venues_standing_capacity" value="' . esc_attr($standing_capacity) . '" style="width:100%;"/><br/>';

    echo '<label for="custom_venues_seated_capacity">Seated Capacity:</label>';
    echo '<input type="number" id="custom_venues_seated_capacity" name="custom_venues_seated_capacity" value="' . esc_attr($seated_capacity) . '" style="width:100%;"/><br/>';

    echo '<label for="custom_venues_size">Size (sqft):</label>';
    echo '<input type="number" id="custom_venues_size" name="custom_venues_size" value="' . esc_attr($size) . '" style="width:100%;"/><br/>';

    echo '<label for="custom_venues_key_features">Key Features:</label>';
    echo '<textarea id="custom_venues_key_features" name="custom_venues_key_features" style="width:100%;">' . esc_textarea($key_features) . '</textarea>';
}

function custom_venues_info_save_post($post_id) {
    if (!isset($_POST['custom_venues_info_meta_box_nonce']) ||
        !wp_verify_nonce($_POST['custom_venues_info_meta_box_nonce'], 'custom_venues_info_save_data') ||
        (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) ||
        !current_user_can('edit_post', $post_id)) {
        return;
    }

    // Sanitize and save the data
    update_post_meta($post_id, '_custom_venues_location', sanitize_text_field($_POST['custom_venues_location']));
    update_post_meta($post_id, '_custom_venues_standing_capacity', sanitize_text_field($_POST['custom_venues_standing_capacity']));
    update_post_meta($post_id, '_custom_venues_seated_capacity', sanitize_text_field($_POST['custom_venues_seated_capacity']));
    update_post_meta($post_id, '_custom_venues_size', sanitize_text_field($_POST['custom_venues_size']));
    update_post_meta($post_id, '_custom_venues_key_features', sanitize_textarea_field($_POST['custom_venues_key_features']));
}
add_action('save_post', 'custom_venues_info_save_post');