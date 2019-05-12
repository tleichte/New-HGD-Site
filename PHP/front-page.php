<?php get_header("nospace"); ?>

<div class="home-video-container">
    <video autoplay muted loop id="home-video">
        <source src="<?php echo get_field("jumbotron_video")['url']; ?>" type="video/mp4">
    </video>
</div>

<div class="home-video-jumbotron">
    <div class="home-video-jumbotron-logo">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg">
    </div>
    <span>
        <?php echo get_field("jumbotron_description"); ?>
    </span>

    <a class="home-video-jumbotron-downarrow" href="#mission">&darr;</a>
</div>
<div style="background-color: white; max-width: 100%; position: relative;">
    
    

    <div class="main-content-wrapper home-mission">

        <span id="mission" class="scroll-header-offset"></span>

        <div class="home-mission-image">
        <img height=500 width=500>
        </div>
        <div class="home-mission-description">
            <h1><?php echo get_field("mission_title"); ?></h1>
            <div class="home-mission-description-mission">
                <?php echo get_field("mission_description"); ?>
            </div>
        </div>

    </div>

    <div class="home-about">

        <div class="home-about-bg-image" style="background-image: url(<?php echo get_field("group_photo")['url'];?>)"></div>

        <div class="home-about-container main-content-wrapper">
        <div class="home-about-image">
            <img height=500 width=500>
        </div>
        <div class="home-about-description">
            <h1><?php echo get_field("about_title"); ?></h1>
            <div class="home-about-description-text">
                <?php echo get_field("about_description"); ?>
            </div>
            <div class="home-about-description-button">
            <a href="<?php echo get_field("about_link")?>">
                <button>Learn More About HGD</button>
            </a>
            </div>
        </div>
        </div>
    </div>

    <div class="home-method main-content-wrapper">
        <h1><?php echo get_field("method_title"); ?></h1>
        <div class="home-method-description">
            <?php echo get_field("method_description"); ?>
            <!-- HGD has teams of ~6 develop a game over a 14 week semester using a full game dev cycle, from idea to design to end product. -->
        </div>
        <img class="home-method-image" src="<?php echo get_field("method_image")['url'];?>">
    </div>


    <div class="home-alumni main-content-wrapper">
    <h1>Notable Alumni</h1>

    <div class="home-alumni-container">
        

        <?php
            $args = array(
                'post_type' => 'alumni',
            );
            $query = new WP_Query($args);
        ?>

        <?php while($query->have_posts()) : $query->the_post(); 
                $image = get_field('project_image');
                $name = get_the_title();
        ?>

        <a href="#">
            <div class="home-alumni-post">
                <img src="<?php echo $image['url'] ?>">
                <div class="home-alumni-post-name">
                    <?php echo $name; ?>
                </div>
            </div>
        </a>
        
        <?php endwhile; ?>
        

    </div>



    </div>
    

</div>

<?php get_footer() ?>