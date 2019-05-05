<?php 


function hgd_meta() { ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php }
add_action('wp_head', 'hgd_meta');

function hgd_scripts() {
    wp_enqueue_style( 'Main-Styles', get_stylesheet_uri() );
    //wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'hgd_scripts' );

add_theme_support( 'title-tag' );



function hgd_menus() {
    register_nav_menus(
        array(
        'header-menu' => __( 'Header Menu' ),
        'footer-menu' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'hgd_menus' );