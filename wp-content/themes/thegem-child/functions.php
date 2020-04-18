<?php
// created by: felmeraldb@gmail.com

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
// create theme settings using ACF
if(function_exists('acf_add_options_page')){
    
    acf_add_options_page(array(
        'page_title'    =>  'Theme General Settings',
        'menu_title'    =>  'Theme Settings',
        'menu_slug'     =>  'theme-general-settings',
        'capability'    =>  'edit_posts',
        'redirect'      =>  false
    ));
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
    ));
}
// remove theme updates & notifications
    function remove_core_updates(){
        global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
    }
    add_filter('pre_site_transient_update_themes','remove_core_updates'); 

    add_action('admin_menu','wphidenag');
    function wphidenag() {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }

