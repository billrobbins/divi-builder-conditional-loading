<?php

/**
 * Plugin Name:       Divi Builder Conditional Style & Script Loading
 * Plugin URI:        
 * Description:       Only loads styles and scripts from the Divi Builder plugin when the builder is used on the current page
 * Version:           1.0.0
 * Author:            3 Sons Development
 * Author URI:        https://3sonsdevelopment.com
 */
 
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}
	
	if ( ! class_exists( 'ET_Builder_Plugin' ) ) {
		exit; // Exit if page builder plugin class is not present
	}


// remove divi scripts except on front page
	function ts_conditional_divi_scripts() {
		
		if ( 'on' != get_post_meta( get_the_ID(), '_et_pb_use_builder', true ) ) {
			
			wp_dequeue_script( 'et-builder-modules-global-functions-script' );
			wp_dequeue_script( 'google-maps-api' );
			wp_dequeue_script( 'divi-fitvids' );
			wp_dequeue_script( 'waypoints' );
			wp_dequeue_script( 'magnific-popup' );
			wp_dequeue_script( 'hashchange' );
			wp_dequeue_script( 'salvattore' );
			wp_dequeue_script( 'easypiechart' );
			wp_dequeue_script( 'fittext' );
			wp_dequeue_script( 'et-jquery-touch-mobile' );
			wp_dequeue_script( 'et-builder-modules-script' );
		
		}
		
	}
	add_action( 'wp_print_scripts', 'ts_conditional_divi_scripts', 100 );

// remove divi styles except front page
	function ts_conditional_divi_styles() {
		
		if ( 'on' != get_post_meta( get_the_ID(), '_et_pb_use_builder', true ) ) {
	
			wp_dequeue_style( 'et-builder-modules-style' );
			wp_dequeue_style( 'magnific-popup' );
		
		}
		
	}
	add_action( 'wp_print_styles', 'ts_conditional_divi_styles', 100 );