<?php

$theme = array(		
		'theme_name' => 'U:optimized',
		'theme_slug' =>'ultimatum-optimized',
);
require_once( get_template_directory() . '/wonderfoundry/wonderworks.php' );

/** Proper way to enqueue child theme style **/

function child_scripts() {
	wp_enqueue_style( 'style.css', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'child_scripts' );

/** Optimize Ultimatum 
Remove the two lines per asset, where you would like to keep those assets. 
Each asset is registered with 'false' value to prevent other assets dependent on them from not loading. **/

function deregister_ultimatum_assets() {
		/* Remove CSS Styles */
		wp_deregister_style( 'open-sans' ); /* WordPress default */
		wp_register_style( 'open-sans', false );
		wp_deregister_style( 'ult-fawesome' ); /* FontAwesome */
		wp_register_style( 'ult-fawesome', false );
		wp_deregister_style( 'prettyphoto' ); /* Modal popup windows */
		wp_register_style( 'prettyphoto', false );
		wp_deregister_style( 'social-icon-font' ); 
		wp_register_style( 'social-icon-font', false );
		wp_deregister_style( 'ult-sliders' ); 
		wp_register_style( 'ult-sliders', false );
		wp_deregister_style( 'ult-menus' ); 
		wp_register_style( 'ult-menus', false );
		/* Remove Scripts */
		wp_deregister_script( 'bootstrap' ); /* Responsive framework */
		wp_register_script( 'bootstrap', false );
		wp_deregister_script( 'jquery-fitvids' ); 
		wp_register_script( 'jquery-fitvids', false );
		wp_deregister_script( 'jquery-prettyphoto' ); 
		wp_register_script( 'jquery-prettyphoto', false );
		wp_deregister_script( 'holder' ); /* Generates image placeholders */ 
		wp_register_script( 'holder', false );
		wp_deregister_script( 'ultimatum-js' ); /* Generates overlays in galleries */
		wp_register_script( 'ultimatum-js', false );
	}

add_action('wp_enqueue_scripts', 'deregister_ultimatum_assets', 100);
