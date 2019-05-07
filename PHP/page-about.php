<?php get_header() ?>



<?php 

    $main_image = get_field("main_image");
    $main_paragraph = get_field("main_paragraph");

    $advisor_name = get_field("advisor_name");
    $advisor_image = get_field("advisor_image");
    $advisor_description = get_field("advisor_description");
    $advisor_link = get_field("advisor_link");

    $management_title = get_field("management_title");

?>


<div class="main-content-wrapper main-content-spaced about-container">

  <h1>About Us</h1>

  <img height=500 width=100% src="<?php echo $main_image['url']?>">

  <div class="about-paragraph">
    <?php echo $main_paragraph; ?>
  </div>
  

  <h2 class="about-management-title"><?php echo $management_title; ?></h2>

  <div class="about-management">


    <?php 

        $args = array(
            'post_type' => 'management',
        );
        $management_query = new WP_Query($args);


        while ($management_query->have_posts()):
            $management_query->the_post(); 

            $image = get_field("photo");
            $default_image = get_field("default_photo");
            $name = get_field("name");
            $m_title = get_the_title();
    ?>

    <div class="about-manager">
      <div class="about-manager-image-container">
        <img src="<?php 
            if ($image) {
                echo $image['url'];
            }
            else {
                echo $default_image['url'];
            }
        ?>">
      </div>
      <div class="about-manager-name"><?php echo $name; ?></div>
      <div class="about-manager-title"><?php echo $m_title; ?></div>
    </div>

    <?php endwhile; ?>
  </div>

  

  <div class="about-advisor">
    <div class="about-advisor-image">
      <img src="<?php echo $advisor_image['url']; ?>">
    </div>
    <div class="about-advisor-description">
        <h3><?php echo $advisor_name; ?> - Faculty Advisor</h3>
        <div class="about-advisor-description-text">
            <?php echo $advisor_description; ?>
        </div>
        <a href="<?php echo $advisor_link; ?>" target="_blank">
        <button>View Full MTU Profile</button>
      </a>
    </div>
  </div>

</div>









<?php get_footer() ?>