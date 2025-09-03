<?php
/*
Plugin Name: Sumprec Player - Audio
Description: A music player addon for the Sumprec Player plugin.
Version: 1.0
Author: Your Name
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Enqueue scripts and styles
function sumprec_player_audio_scripts() {
    wp_enqueue_style('sumprec-player-audio-css', plugins_url('player.css', __FILE__));
    wp_enqueue_script('sumprec-player-audio-js', plugins_url('player.js', __FILE__), array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'sumprec_player_audio_scripts');

// Add player HTML to the footer
function sumprec_player_audio_footer() {
    ?>
    <div class="sumprec-player">
        <div class="player-controls">
            <button id="prev-btn"><i class="fas fa-backward"></i></button>
            <button id="play-pause-btn"><i class="fas fa-play"></i></button>
            <button id="next-btn"><i class="fas fa-forward"></i></button>
        </div>
        <div class="player-progress">
            <div class="progress-bar-container">
                <div class="progress-bar"></div>
            </div>
        </div>
        <div class="player-info">
            <span id="current-time">0:00</span>
            <span id="duration">0:00</span>
        </div>
        <div class="player-volume">
            <i class="fas fa-volume-down"></i>
            <input type="range" id="volume-slider" min="0" max="1" step="0.1" value="1">
        </div>
    </div>
    <?php
}
add_action('wp_footer', 'sumprec_player_audio_footer');