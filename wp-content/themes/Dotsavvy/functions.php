<?php 
function test_theme_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');

}
add_action('after_setup_theme','test_theme_theme_support');



function test_theme_register_styles() {
    $version = wp_get_theme()->get( 'Version'   );
    wp_enqueue_style('testtheme-style', get_template_directory_uri() . "/Eric.css", array(), $version, 'all');
    wp_enqueue_style('testtheme-Tailwind', "https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" , array(), '2.2.19', 'all');

}

add_action('wp_enqueue_scripts', 'test_theme_register_styles');

function test_theme_menus(){
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items",
    );
    register_nav_menus($locations);
}

add_action('init','test_theme_menus');

function create_brand_post_type() {
    register_post_type('brand',
        array(
            'labels' => array(
                'name' => __('Brands'),
                'singular_name' => __('Brand')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'thumbnail'),
            'menu_position' => 5,
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_brand_post_type');


?>