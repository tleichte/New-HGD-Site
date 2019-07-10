<!-- BEGIN HEADER -->
<!doctype html>
<html lang="en">
  <head>
    <!-- <title><?php echo get_bloginfo('name'); ?></title> -->
    <?php wp_head(); ?>
  </head>
  <body>

        <header>
          <div class="header main-content-wrapper">
            <div class="header-logo-container">
              <a href="<?php echo get_home_url(); ?>">
                  <img class="header-logo" src="<?php echo get_template_directory_uri(); ?>/images/header-logo.svg">
              </a>
            </div>
            <div class="header-mobile-hamburger">
              <img src="<?php echo get_template_directory_uri(); ?>/images/hamburger.png">
            </div>

            <nav class="header-nav">
              <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
            </nav>
          </div>
        </header>