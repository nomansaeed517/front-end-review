<?php
/**
 * Plugin Name: Front-End Review Plugin
 * Description: A plugin that allows users to submit reviews from the front end.
 * Version: 1.0
 * Author: Your Name
 * Text Domain: front-end-review
 */

// Prevent direct access.
if (!defined('ABSPATH')) exit;

define( 'FER_PL_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'FER_PL_DIR_URL', plugin_dir_url( __FILE__ ) );

// Autoload classes from the 'includes' folder.
spl_autoload_register(function ($class_name) {
    if (false !== strpos($class_name, 'FrontEndReview')) {
        $class_name = str_replace('FrontEndReview\\', '', $class_name);
        $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
        include FER_PL_DIR_PATH . 'includes/' . $class_name . '.php';
    }
});

// Initialize plugin components
function frontend_review_init() {
    // Initialize classes
    new FrontEndReview\CustomPostType();
    new FrontEndReview\EnqueueScripts();
    new FrontEndReview\AjaxHandler();
    new FrontEndReview\ShortcodeHandler();
    new FrontEndReview\MetaBoxHandler();
}

add_action('plugins_loaded', 'frontend_review_init');
