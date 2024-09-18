<?php

namespace FrontEndReview;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class AjaxHandler {

    public function __construct() {
        add_action('wp_ajax_submit_review', [$this, 'handle_review_submission']);
        add_action('wp_ajax_nopriv_submit_review', [$this, 'handle_review_submission']);
    }

    public function handle_review_submission() {
        check_ajax_referer('review_nonce', 'nonce');

        // Sanitize and validate input
        $title = sanitize_text_field($_POST['title']);
        $description = sanitize_textarea_field($_POST['description']);
        $name = sanitize_text_field($_POST['name']);
        $dob = sanitize_text_field($_POST['dob']);
        $company = sanitize_text_field($_POST['company']);

        if (empty($title) || empty($description) || empty($name) || empty($dob) || empty($company)) {
            wp_send_json_error(['message' => 'All fields are required']);
        }

        // Create a new post of type 'review'
        $post_id = wp_insert_post([
            'post_title' => $title,
            'post_content' => $description,
            'post_type' => 'review',
            'post_status' => 'pending',
        ]);

        if ($post_id) {
            // Save the custom fields
            update_post_meta($post_id, 'review_name', $name);
            update_post_meta($post_id, 'review_dob', $dob);
            update_post_meta($post_id, 'review_company', $company);

            wp_send_json_success(['message' => 'Review submitted successfully!']);
        } else {
            wp_send_json_error(['message' => 'Failed to submit review']);
        }
    }
}
