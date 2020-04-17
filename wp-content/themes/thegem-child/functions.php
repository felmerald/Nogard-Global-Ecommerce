<?php
// call the parent theme style
function my_theme_enqueue_styles() {
    $thegem_style = 'thegem-style';
    wp_enqueue_style( $thegem_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style('child-style',
    get_stylesheet_directory_uri() .'/style.css',
    array($thegem_style),
    wp_get_theme()->get('Version')
    );
}
// add out custom jQuery Script
add_action( 'wp_enqueue_scripts', 'add_my_script' );
function add_my_script(){
	wp_register_script(
		'child-theme-script',
		get_stylesheet_directory_uri().'/js/function.js',
		array('jquery')
	);
	wp_enqueue_script('child-theme-script');
}
