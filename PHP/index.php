<?php get_header() ?>

    <div class="main-content-wrapper main-content-spaced editor-styled">

        <?php while(have_posts()): the_post(); the_content();?>
        <?php endwhile;?>
    </div>


<?php get_footer() ?>