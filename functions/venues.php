<?php
// Register the Meta Box
function custom_register_venues_meta_box() {
    add_meta_box(
        'venue_info', // ID of the meta box
        'Venue Information', // Title of the meta box
        'custom_display_venues_meta_box', // Callback function to display the meta box
        'post', // Post type where the meta box will appear
        'normal', // Position where the box will show ('normal', 'side', 'advanced')
        'high' // Priority of the meta box ('high', 'low')
    );
}
add_action('add_meta_boxes', 'custom_register_venues_meta_box');

// Display the Meta Box
function custom_display_venues_meta_box($post) {
    // Check for the 'venues' category
    if (!has_category('venues', $post->ID)) {
        echo 'This information is specific to posts in the "Venues" category.';
        return; // Exit if the post isn't in the 'venues' category
    }

    // Security field
    wp_nonce_field('custom_venues_meta_nonce', 'custom_venues_meta_nonce_field');

    // Get the current values if they exist
    $location = get_post_meta($post->ID, '_venue_location', true);
    $standing_capacity = get_post_meta($post->ID, '_venue_standing_capacity', true);
    $seated_capacity = get_post_meta($post->ID, '_venue_seated_capacity', true);
    $size = get_post_meta($post->ID, '_venue_size', true);
    $key_features = get_post_meta($post->ID, '_venue_key_features', true);

    // Display the form, using the current value if it exists
    ?>
<p>
    <label for="venue_location">Location:</label>
    <input type="text" id="venue_location" name="venue_location" value="<?php echo esc_attr($location); ?>"
        class="widefat">
</p>
<p>
    <label for="venue_standing_capacity">Standing Capacity:</label>
    <input type="number" id="venue_standing_capacity" name="venue_standing_capacity"
        value="<?php echo esc_attr($standing_capacity); ?>" class="widefat">
</p>
<p>
    <label for="venue_seated_capacity">Seated Capacity:</label>
    <input type="number" id="venue_seated_capacity" name="venue_seated_capacity"
        value="<?php echo esc_attr($seated_capacity); ?>" class="widefat">
</p>
<p>
    <label for="venue_size">Size (sqft):</label>
    <input type="number" id="venue_size" name="venue_size" value="<?php echo esc_attr($size); ?>" class="widefat">
</p>
<p>
    <label for="venue_key_features">Key Features:</label>
    <textarea id="venue_key_features" name="venue_key_features"
        class="widefat"><?php echo esc_textarea($key_features); ?></textarea>
</p>
<?php
}

// Save the Meta Box content
function custom_save_venues_meta_box($post_id) {
    // Check save status
    if (!isset($_POST['custom_venues_meta_nonce_field']) ||
        !wp_verify_nonce($_POST['custom_venues_meta_nonce_field'], 'custom_venues_meta_nonce') ||
        defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ||
        !current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save or Update Meta
    update_post_meta($post_id, '_venue_location', sanitize_text_field($_POST['venue_location']));
    update_post_meta($post_id, '_venue_standing_capacity', sanitize_text_field($_POST['venue_standing_capacity']));
    update_post_meta($post_id, '_venue_seated_capacity', sanitize_text_field($_POST['venue_seated_capacity']));
    update_post_meta($post_id, '_venue_size', sanitize_text_field($_POST['venue_size']));
    update_post_meta($post_id, '_venue_key_features', sanitize_textarea_field($_POST['venue_key_features']));
}
add_action('save_post', 'custom_save_venues_meta_box');