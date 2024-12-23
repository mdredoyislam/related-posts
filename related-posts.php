<?php

/**
 * Plugin Name: Related Posts
 * Plugin URI: https://redoyit.com/plugins/related-posts
 * Description: Display related posts under the content of each post based on the current post's category.
 * Version: 1.0.0
 * Author: Redoy Islam
 * Author URI: https://redoyit.com
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: related-posts
 */

if (! defined('ABSPATH')) {
    return;
}

class Related_Posts
{

    private static $instance;

    private function __construct()
    {

        $this->define_constants();

        $this->load_classes();

        $this->init_hooks();
    }

    public static function get_instance()
    {
        if (self::$instance) {
            return self::$instance;
        }

        self::$instance = new self();

        return self::$instance;
    }

    private function define_constants()
    {
        define('RELATED_POSTS_PLUGIN_PATH', plugin_dir_path(__FILE__));
        define('RELATED_POSTS_PLUGIN_URL', plugin_dir_url(__FILE__));
    }

    private function load_classes()
    {

        require_once RELATED_POSTS_PLUGIN_PATH . 'includes/Class_Related_Posts.php';
        new Class_Related_Posts\Class_Related_Posts();
    }

    private function init_hooks()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
    }

    public function enqueue_assets()
    {
        wp_enqueue_style('related-post-style', RELATED_POSTS_PLUGIN_URL . 'assets/css/style.css');
    }
}

Related_Posts::get_instance();
