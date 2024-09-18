<?php

namespace FrontEndReview;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class CustomPostType {
    
    public function __construct() {
        add_action('init', [$this, 'register_review_post_type']);
    }

    public function register_review_post_type() {
        register_post_type('review', [
            'labels' => [
                'name' => __('Reviews', 'front-end-review'),
                'singular_name' => __('Review', 'front-end-review'),
            ],
            'public' => true,
            'supports' => ['title', 'editor'],
            'has_archive' => true,
            'rewrite' => ['slug' => 'reviews'],
        ]);
    }
}
