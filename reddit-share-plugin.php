<?php
/*
Plugin Name: Reddit Share Plugin
Description: Adds a Reddit icon below blog posts to share the post title and URL on Reddit.
Version: 1.0
Author: Your Name
*/

// Enqueue necessary scripts and styles
function reddit_share_enqueue_scripts() {
    // Correct usage of plugin_dir_url and wp_enqueue functions
    wp_enqueue_script('reddit-share-script', plugin_dir_url(__FILE__) . 'reddit-share.js', array('jquery'), '1.0', true);
    wp_enqueue_style('reddit-share-style', plugin_dir_url(__FILE__) . 'reddit-share.css');
}
add_action('wp_enqueue_scripts', 'reddit_share_enqueue_scripts');

// Add Reddit share icon and subreddit input below blog posts
function add_reddit_share_icon($content) {
    if (is_single()) {
        // Escaping attributes properly
        $post_title = get_the_title();
        $post_url = get_permalink();

        // HTML inside PHP needs to be properly escaped and formatted
        $reddit_icon = '<div class="reddit-share-container">';
        $reddit_icon .= '<input type="text" id="reddit-subreddit" placeholder="Enter subreddit">';
        $reddit_icon .= '<div class="reddit-share-icon" data-title="' . esc_attr($post_title) . '" data-url="' . esc_url($post_url) . '">';
        $reddit_icon .= '<img src="' . plugin_dir_url(__FILE__) . 'reddit-icon.png" alt="Share on Reddit">';
        $reddit_icon .= '</div>';
        $reddit_icon .= '</div>';

        // Append the Reddit share icon to the content
        $content .= $reddit_icon;
    }
    return $content;
}
add_filter('the_content', 'add_reddit_share_icon');
?>
