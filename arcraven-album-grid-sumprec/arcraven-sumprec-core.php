<?php
/*
Plugin Name: Arcraven Sumprec Core
Description: A custom plugin to add label core funcionality to elementor theme
Version: 0.0.9
Author: Yassine Rakibi - Arcraven
Author URI: https://arcraven.com/
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 6.6
Requires at least: PHP: 7.4
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Enqueue additional styles
add_action('wp_enqueue_scripts', function () {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');

    // Enqueue custom styles
    wp_enqueue_style('album-grid-style', plugins_url('css/style.css', __FILE__));
});


// Register the widget
add_action('elementor/widgets/widgets_registered', function () {
    require_once __DIR__ . '/widgets/album-grid-widget.php';
    require_once __DIR__ . '/widgets/artist-grid-widget.php';
    require_once __DIR__ . '/widgets/tracks-grid-widget.php';

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor_Album_Grid_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor_Artists_Grid_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor_Tracks_Grid_Widget());

    
});