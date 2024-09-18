<?php

namespace FrontEndReview;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class EnqueueScripts {

    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_scripts']);
    }

    public function enqueue_frontend_scripts() {
        // Enqueue CSS for the form
        wp_enqueue_style('review-form-style', FER_PL_DIR_URL . 'assets/css/style.css');
        // Enqueue JS for the form
        wp_enqueue_script('review-ajax-script', FER_PL_DIR_URL . 'assets/js/ajax-script.js', ['jquery'], null, true);
        
        wp_localize_script('review-ajax-script', 'reviewAjax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('review_nonce'),
        ]);

    }
}
