<?php
/**
 * Hello Elementor Child theme functions and definitions
 */

function hello_elementor_child_enqueue_styles() {
	// Enqueue parent styles
	wp_enqueue_style( 'hello-elementor-parent-style', get_template_directory_uri() . '/style.css' );

	// Enqueue child styles
	wp_enqueue_style( 'hello-elementor-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'hello-elementor-parent-style' ), '1.0.0' );

	// Enqueue Quantico font from Google Fonts
	wp_enqueue_style( 'isn-quantico-font', 'https://fonts.googleapis.com/css2?family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap', array(), null );
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles' );

/**
 * Custom settings or adjustments for ISN Nutrition design
 */
function isn_child_theme_setup() {
    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
}
add_action( 'after_setup_theme', 'isn_child_theme_setup' );
