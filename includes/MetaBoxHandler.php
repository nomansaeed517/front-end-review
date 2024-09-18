<?php

namespace FrontEndReview;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class MetaBoxHandler {

    public function __construct() {
        add_action('add_meta_boxes', [$this, 'add_review_meta_boxes']);
        add_action('save_post', [$this, 'save_review_meta_boxes'], 10, 2);
    }

    // Add meta box to the review post type
    public function add_review_meta_boxes() {
        add_meta_box('review_details_meta_box', 'Review Details', [$this, 'render_review_meta_boxes'], 'review', 'normal', 'high');
    }

    // Render the meta box fields in the admin
    public function render_review_meta_boxes($post) {
        $name = get_post_meta($post->ID, 'review_name', true);
        $dob = get_post_meta($post->ID, 'review_dob', true);
        $company = get_post_meta($post->ID, 'review_company', true);

        wp_nonce_field('save_review_details', 'review_details_nonce');
        ?>
        <p>
            <label for="review_name">Name</label>
            <input type="text" id="review_name" name="review_name" value="<?php echo esc_attr($name); ?>" class="widefat">
        </p>
        <p>
            <label for="review_dob">Date of Birth</label>
            <input type="date" id="review_dob" name="review_dob" value="<?php echo esc_attr($dob); ?>" class="widefat">
        </p>
        <p>
            <label for="review_company">Company</label>
            <input type="text" id="review_company" name="review_company" value="<?php echo esc_attr($company); ?>" class="widefat">
        </p>
        <?php
    }

    // Save the custom meta box data
    public function save_review_meta_boxes($post_id, $post) {
        if (!isset($_POST['review_details_nonce']) || !wp_verify_nonce($_POST['review_details_nonce'], 'save_review_details')) {
            return $post_id;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        if ($post->post_type != 'review' || !current_user_can('edit_post', $post_id)) {
            return $post_id;
        }

        $name = sanitize_text_field($_POST['review_name']);
        $dob = sanitize_text_field($_POST['review_dob']);
        $company = sanitize_text_field($_POST['review_company']);

        update_post_meta($post_id, 'review_name', $name);
        update_post_meta($post_id, 'review_dob', $dob);
        update_post_meta($post_id, 'review_company', $company);
    }
}
