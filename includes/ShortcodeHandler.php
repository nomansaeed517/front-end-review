<?php

namespace FrontEndReview;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class ShortcodeHandler {

    public function __construct() {
        add_shortcode('review_form', [$this, 'render_review_form']);
    }

    public function render_review_form() {
        ob_start();
        ?>
        <form id="review-form">
            <label for="review-title">Title</label>
            <input type="text" id="review-title" name="title" required>

            <label for="review-description">Description</label>
            <textarea id="review-description" name="description" required></textarea>

            <label for="review-name">Name</label>
            <input type="text" id="review-name" name="name" required>

            <label for="review-dob">Date of Birth</label>
            <input type="date" id="review-dob" name="dob" required>

            <label for="review-company">Company</label>
            <input type="text" id="review-company" name="company" required>

            <input type="submit" value="Submit Review">
        </form>
        <?php
        return ob_get_clean();
    }
}
