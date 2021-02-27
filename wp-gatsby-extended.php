<?php
/*
Plugin Name: WP Gatsby (Extended)
Description: Extends WP Gatsby with custom GraphQL types.
Author: arshadcn
Author URI: https://arshadcn.com
Version: 0.0.1
*/

add_action( 'graphql_register_types', function () {
	register_graphql_object_type( 'CustomizerSettings', [
		'description' => __( 'Customizer Settings' ),
		'fields'      => [
			'backgroundColor'            => [
				'type'        => 'String',
				'description' => 'Background color',
			],
			'respectUserColorPreference' => [
				'type'        => 'String',
				'description' => 'Respect user color preference',
			],
		],
	] );

	register_graphql_field( 'RootQuery', 'CustomizerSettings', [
		'description' => __( 'Return the customizer settings' ),
		'type'        => 'CustomizerSettings',
		'resolve'     => function () {
			return [
				'backgroundColor'            => get_theme_mod( 'background_color', 'D1E4DD' ),
				'respectUserColorPreference' => get_theme_mod( 'respect_user_color_preference', false ),
			];
		},
	] );
} );

add_action( 'customize_save_after', function () {
	// Trigger an update when customizer settings are saved.
	$actionMonitor = new \WPGatsby\ActionMonitor\ActionMonitor();
	$monitor       = new \WPGatsby\ActionMonitor\Monitors\ActionMonitor( $actionMonitor );
	$monitor->trigger_non_node_root_field_update( [
		'title' => __( 'Update customizer settings.' ),
	] );
} );