<?php 
    $args = array(
        'post_type' => 'games_posts',
        'orderby' => 'title',
        'order' => 'ASC',
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
        while ($query->have_posts()) {
            $query->the_post();
?>
            <div class="games-game" game="<?php echo get_the_ID(); ?>">
                <div class="games-game-image">
                    <img src="<?php echo get_field("cover_image")['url'];?>">
                </div>
                <p class="games-game-title"><?php echo get_the_title(); ?></p>
                <p class="games-game-team"><?php echo get_field("team_name"); ?></p>
            </div>
<?php
        }
    }
?>