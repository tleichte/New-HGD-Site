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
            <nav class="header-nav">
              <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
              <!-- <ul>
                <li>
                  <a href="index.html">Home</a>
                </li>
                <li>
                  <a href="about.html">About</a>
                </li>
                <li>
                  <a href="games.html">Games</a>
                </li>
                <li>
                  <a href="sponsors.html">Sponsors</a>
                </li>
                <li>
                  <a href="contact.html">Contact</a>
                </li>
              </ul> -->
            </nav>
          </div>
        </header>