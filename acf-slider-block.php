<?php
/*
Plugin Name: ACF Slider Block
Description: A standalone distributable ACF 6.0 block that provides a slider.
Version: 2.0
Author: Liam Gladdy
*/

// We register the block on init, earlier than acf/init, so we can make sure we ask ACF to load this block's fields.
add_action( 'init', 'register_acf_block', 5 );
function register_acf_block() {
	wp_register_script( 'slick', plugin_dir_url( __FILE__ ) . 'slick/slick.js', array( 'jquery' ), '1.8.1', true );
	register_block_type( __DIR__ );
}

// Register our block's fields into ACF.
add_action(
	'acf/include_fields',
	function() {
		$path                     = __DIR__ . '/fields/acf-fields.json';
		$field_json               = json_decode( file_get_contents( $path ), true );
		$field_json['location']   = array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/slider',
				),
			),
		);
		$field_json['local']      = 'json';
		$field_json['local_file'] = $path;
		acf_add_local_field_group( $field_json );
	}
);
