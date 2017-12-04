<?php
/*
Plugin Name: Infobahn Event Speaker
Plugin URI: https://www.infobahn.co.jp
Description: this plugin for event CMS made infobahn.inc
Version: 1.0
Author URI: https://www.infobahn.co.jp
*/

defined( 'ABSPATH' ) or die( '-1' );

function speakers_enqueue() {
	wp_enqueue_style( 'speaker', plugin_dir_url( __FILE__ ) . 'assets/style.css' );
	wp_enqueue_script( 'speaker', plugin_dir_url( __FILE__ ) . 'assets/pop.js' );
}
add_action( 'wp_enqueue_scripts', 'speakers_enqueue' );

function speakers_register_module( $ThemifyBuilder ) {
	$ThemifyBuilder->register_directory( 'templates', plugin_dir_path( __FILE__ ) . '/templates' );
	$ThemifyBuilder->register_directory( 'modules', plugin_dir_path( __FILE__ ) . '/modules' );
}
add_action( 'themify_builder_setup_modules', 'speakers_register_module' );
