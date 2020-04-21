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

    // replace default search to advance woo search
    function thegem_menu_item_search($items, $args){
        if($args->theme_location == 'primary' && thegem_get_option('header_layout') !== 'overlay' && !thegem_get_option('hide_search_icon')) {
            $items .= '<li class="menu-item menu-item-search"><a href="#"></a>
            <div class="minisearch">
            "'.do_shortcode("[aws_search_form]").'"
            </div>
            </li>';
        }
        return $items;
    }
    add_filter('wp_nav_menu_items', 'thegem_menu_item_search', 10, 2);

    function thegem_menu_item_hamburger_widget($items, $args){
        if($args->theme_location == 'primary' && thegem_get_option('header_layout') == 'fullwidth_hamburger'){

            ob_start();
            thegem_print_socials('rounded');
            $socials = ob_get_clean();

            $items .= '<li class="menu-item menu-item-widgets">
            <div class="vertical-minisearch">
            "'.do_shortcode("[aws_search_form]").'"
            </div>
            <div class="menu-item-socials socials-colored">'. $socials .'</div>
            </li>';
        }
        return $items;
    }
    add_filter('wp_nav_menu_items', 'thegem_menu_item_hamburger_widget', 100, 2);
    if(!function_exists('thegem_serch_form_vertical_header')) {
        function thegem_serch_form_vertical_header($form)
        {
            return '<div class="vertical-minisearch">
            "'.do_shortcode("[aws_search_form]").'"
            </div>';
        }
    }

    function responsive_stylesheet(){
        wp_enqueue_style('responsive-style',get_stylesheet_directory_uri().'/css/responsive-style.css', false, '1.0', 'all');
    }
    add_action( 'wp_enqueue_scripts', 'responsive_stylesheet' );
