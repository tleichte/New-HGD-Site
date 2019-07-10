<?php 

function hgd_meta() { ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php }
add_action('wp_head', 'hgd_meta');

function hgd_scripts() {
    wp_enqueue_style( 'Main-Styles', get_stylesheet_uri() );
    if (is_page('Games')) {
        hgd_add_games_script();
    }
    wp_enqueue_script('header-script', get_template_directory_uri().'/scripts/header.js', array('jquery'), 1.0, true);
    //wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'hgd_scripts' );

add_theme_support( 'title-tag' );



function hgd_add_games_script() {
    wp_enqueue_script('games-script', get_template_directory_uri().'/scripts/games.js', array('jquery'), 1.0, true);
    wp_localize_script( 'games-script', 'games', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
}

add_action( 'wp_ajax_nopriv_ajax_gameslist', 'hgd_ajax_gameslist' );
add_action( 'wp_ajax_ajax_gameslist', 'hgd_ajax_gameslist' );

function hgd_ajax_gameslist() {
    include("ajax-gameslist.php");
    die();
}


add_action( 'wp_ajax_nopriv_ajax_gamemodal', 'hgd_ajax_gamemodal' );
add_action( 'wp_ajax_ajax_gamemodal', 'hgd_ajax_gamemodal' );

function hgd_ajax_gamemodal() {
    
    include("ajax-gamesmodal.php");

    die();
}






function hgd_menus() {
    register_nav_menus(
        array(
        'header-menu' => __( 'Header Menu' ),
        'footer-menu' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'hgd_menus' );





function hgd_editor_styles() {
    add_editor_style("editor-styles.css");
}
add_action ('init', 'hgd_editor_styles');



function hgd_mime_types($existing_mimes) {
    $existing_mimes['svg'] = 'image/svg+xml';
    return $existing_mimes;
}
add_filter('mime_types', 'hgd_mime_types');