<?php
function lavender_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'lavender-style', get_stylesheet_directory_uri() . '/main.css', array( 'parent-style' ) );
}
add_action( 'wp_enqueue_scripts', 'lavender_enqueue_styles' );

function lavender_customize_register($wp_customize) {
    $wp_customize->remove_control('sixteen_center_logo');

    $wp_customize->add_section('sixteen_blog_layouts_sec', array(
        'title' => __('Blog Layouts', 'sixteen'),
        'priority' => 10,
        'panel' => 'sixteen_designs_panel',
    ));

    $wp_customize->add_setting('sixteen_blog_layouts', array(
        'default' => 'sixteen',
        'sanitize' => 'sixteen_sanitize_blog_layout',
    ));

    function sixteen_sanitize_blog_layout( $input ) {
        if ( array_key_exists($input, 'sixteen', 'grid') )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control('sixteen_blog_layouts', array(
        'settings' => 'sixteen_blog_layouts',
        'section' => 'sixteen_blog_layouts_sec',
        'label' => __('Select Blog Layout', 'sixteen'),
        'type' => 'select',
        'choices' =>  array(
            'sixteen' => __('Sixteen', 'sixteen'),
            'grid' => __('Basic', 'sixteen'),
        )
    ));
}
add_action('customize_register', 'lavender_customize_register', 15 );

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses sixteen_header_style()
 * @uses sixteen_admin_header_style()
 * @uses sixteen_admin_header_image()
 */
function lavender_custom_header_setup() {
    add_theme_support( 'custom-header', apply_filters( 'sixteen_custom_header_args', array(
        'default-image'          => get_stylesheet_directory_uri().'/images/header.jpg',
        'default-text-color'     => '#fff',
        'height'				 => 400,
        'width'					 => 1600,
        'flex-height'            => true,
        'wp-head-callback'       => 'sixteen_header_style',
        'admin-head-callback'    => 'sixteen_admin_header_style',
        'admin-preview-callback' => 'sixteen_admin_header_image',
    ) ) );
    register_default_headers( array(
            'default-image'    => array(
                'url'            => '%2$s/images/header.jpg',
                'thumbnail_url'    => '%2$s/images/header.jpg',
                'description'    => __('Default Header Image', 'sixteen')
            )
        )
    );
}
add_action( 'after_setup_theme', 'lavender_custom_header_setup', 10 );

/*
** Function to Get Theme Layout 
*/
function sixteen_get_blog_layout(){
    $ldir = 'layouts/content';
    if (get_theme_mod('sixteen_blog_layouts') ) :
        get_template_part( $ldir , get_theme_mod('sixteen_blog_layouts') );
    else :
        get_template_part( $ldir ,'grid');
    endif;
}
add_action('sixteen_blog_layout', 'sixteen_get_blog_layout', 11);