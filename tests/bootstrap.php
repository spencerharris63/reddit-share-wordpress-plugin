<?php
// Load the WordPress test environment
require_once dirname( __FILE__ ) . '/../../wordpress-develop/tests/phpunit/includes/functions.php';

// Manually load your plugin file
function _manually_load_plugin() {
    require dirname( __FILE__ ) . '/../reddit-share-plugin.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

// Start up the WordPress testing environment
require dirname( __FILE__ ) . '/../../wordpress-develop/tests/phpunit/includes/bootstrap.php';
