<?php 
function test_theme_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');

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

function create_hero_section_cpt() {
    $labels = array(
        'name'               => 'Hero Sections',
        'singular_name'      => 'Hero Section',
        'menu_name'          => 'Hero Sections',
        'name_admin_bar'     => 'Hero Section',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Hero Section',
        'new_item'           => 'New Hero Section',
        'edit_item'          => 'Edit Hero Section',
        'view_item'          => 'View Hero Section',
        'all_items'          => 'All Hero Sections',
        'search_items'       => 'Search Hero Sections',
        'not_found'          => 'No Hero Sections found.',
        'not_found_in_trash' => 'No Hero Sections found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'hero-sections'),
        'supports'           => array('title', 'editor', 'thumbnail'),
        'show_in_rest'       => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-format-image',
    );

    register_post_type('hero_section', $args);
}

add_action('init', 'create_hero_section_cpt');


function create_Services_post_type() {
    register_post_type('services',
        array(
            'labels' => array(
                'name' => __('Service Section'),
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array('title', 'editor',),
            'menu_position' => 6,
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_Services_post_type');

function create_cta_post_type() {
    register_post_type('cta',
        array(
            'labels' => array(
                'name' => __('CTA'),
                'singular_name' => __('CTA')
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array('title', 'editor','thumbnail'),
            'menu_position' => 6,
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_cta_post_type');


function create_ServiceItems_post_type() {
    register_post_type('service-items',
        array(
            'labels' => array(
                'name' => __('Services-Items'),
                'singular_name' => __('Services-Item')
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array('title',),
            'menu_position' => 3,
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_ServiceItems_post_type');

function enqueue_custom_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-script', get_template_directory_uri() . '//custom-script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// Register Custom Post Type for Carousel
function create_carousel_post_type() {
    $args = array(
        'public' => true,
        'label'  => 'Carousels',
        'supports' => array('title', 'thumbnail'),
        'menu_icon' => 'dashicons-format-gallery',
        'has_archive' => true,
        'rewrite' => array('slug' => 'carousels'),
    );
    register_post_type('carousel', $args);
}
add_action('init', 'create_carousel_post_type');

function handle_form_submission() {
    // Check for nonce or other security checks if needed
    
    // Sanitize and process form data
    $name = sanitize_text_field($_POST['name']);
    $phone = sanitize_text_field($_POST['phone']);
    $email = sanitize_email($_POST['email']);
    $interest = sanitize_text_field($_POST['interest']);
    $other = sanitize_text_field($_POST['other']);

    // Process the form data (e.g., save to database, send email)
    
    // Redirect or display a success message
    wp_redirect(home_url('/thank-you')); // Replace with your desired redirect URL
    exit;
}
add_action('admin_post_submit_form', 'handle_form_submission');
add_action('admin_post_nopriv_submit_form', 'handle_form_submission');


?>