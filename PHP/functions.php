<?php 

define( 'WP_DEBUG', true );


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

    $args = array(
        'post_type' => 'games_posts',
        'tax_query' => array(array(
            'taxonomy' => 'game_year',
            'field' => 'slug',
            'terms' => $_POST['year']
        ))
    );

    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        echo "No games to show.";
    }
    else {
        while ($query->have_posts()): $query->the_post();
        ?>

            <div class="games-game" game="<?php echo get_the_ID(); ?>">
                <div class="games-game-image">
                    <img src="<?php echo get_field("cover_image")['url'];?>">
                </div>
                <p class="games-game-title"><?php echo get_the_title(); ?></p>
                <p class="games-game-team"><?php echo get_field("team_name"); ?></p>
            </div>

        <?php
        endwhile;

    }

    die();
}


add_action( 'wp_ajax_nopriv_ajax_gamemodal', 'hgd_ajax_gamemodal' );
add_action( 'wp_ajax_ajax_gamemodal', 'hgd_ajax_gamemodal' );

function hgd_ajax_gamemodal() {
    global $post;
    $post = get_post($_POST['game']);
    setup_postdata( $post );

    ?>

    <p class="games-modal-title"><?php echo get_the_title(); ?></p>
    <p class="games-modal-year"><?php echo get_the_terms(get_the_ID(), 'game_year')[0]->name;?></p>
    
    <div class="games-modal-gallery-display">
      <div class="games-modal-gallery-display-image">
      </div>
    </div>
    
    <div class="games-modal-gallery">

      <?php 
        while (have_rows("trailer_ytids")): the_row();
      ?>

        <div class="games-modal-gallery-image" gallery-type="trailer" gallery-trailer-id="<?php echo get_sub_field("youtube_id"); ?>">
            <img src="http://img.youtube.com/vi/<?php echo get_sub_field("youtube_id"); ?>/0.jpg">
            <div class="games-modal-trailer-overlay">
            <img src="<?php echo get_template_directory_uri(); ?>/images/play-icon.png">
            </div>
        </div>

      <?php endwhile;?>

      <?php 
      
        $screenshots = get_field("screenshots");

        foreach($screenshots as $screenshot):
      
      ?>

        <div 
            class="games-modal-gallery-image"
            gallery-type="image"
            gallery-image-url="<?php echo $screenshot['url']?>"
        >
            <img src="<?php echo $screenshot['url']?>">
        </div>

      <?php endforeach; ?>

    </div>
    
    <div class="games-modal-description">
      
        <div class="games-modal-developers">
          <div class="games-modal-developers-title"><?php echo get_field("team_name");?></div>
          <?php 
            while (have_rows("team_members")): the_row();
          ?>

          <div class="games-modal-developer">
            <?php echo get_sub_field("member_name"); ?>
            <span class="games-modal-developer-role">
              <?php echo get_sub_field("member_role"); ?>
            </span>
          </div>

          <?php endwhile; ?>
        </div>


      <div class="games-modal-description-text">
        <span>Description</span>
        <?php echo nl2br(get_field("description"));?>
        <div>
        <a href="<?php echo get_field("download_link"); ?>" target="_blank">
          <button>Download &darr;</button>
        </a>
        </div>
      </div>

      

    </div>







    <?php


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