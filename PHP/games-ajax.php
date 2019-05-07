<?php 


function get_games_list($year) {

    $args = array(
        'post-type' => 'games_posts',
        'category_name' => $year
    )

    $query = new WP_Query($args);

    while ($query->have_posts()): the_post();
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




?>