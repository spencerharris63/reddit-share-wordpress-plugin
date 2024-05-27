<?php
class Reddit_Share_Plugin_Test extends WP_UnitTestCase {

    public function test_reddit_share_icon_added() {
        // Create a post
        $post_id = $this->factory->post->create(array('post_title' => 'Test Post', 'post_content' => 'Test Content'));

        // Get the post content
        $post = get_post($post_id);

        // Apply the_content filter to the post content
        $filtered_content = apply_filters('the_content', $post->post_content);

        // Check if the Reddit share icon HTML is present in the filtered content
        $this->assertStringContainsString('class="reddit-share-container"', $filtered_content);
        $this->assertStringContainsString('class="reddit-share-icon"', $filtered_content);
        $this->assertStringContainsString('Enter subreddit', $filtered_content);
    }

    public function test_enqueue_scripts() {
        // Enqueue the scripts
        do_action('wp_enqueue_scripts');

        // Check if the script and style are enqueued
        $this->assertTrue(wp_script_is('reddit-share-script', 'enqueued'));
        $this->assertTrue(wp_style_is('reddit-share-style', 'enqueued'));
    }
}
