
<footer id="footer">
    <div class="footer-return-to-top">
      <a href="#">
        <div class="footer-arrow">
          <span>&uarr;</span><br>
        Return to Top</div>
      </a>
    </div>


    <div class="footer-nav">
      <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
    </div>

    <div class="footer-social">
      <a href="https://www.facebook.com/groups/huskygames/" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/images/facebook.svg">
      </a>
      <a href="https://www.linkedin.com/groups/6535409/" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.svg">
      </a>
      <a href="https://github.com/HuskyGameDev" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/images/github.svg">
      </a>
    </div>


    

    <div class="footer-copyright">
      <a href="<?php echo wp_login_url(); ?>">&copy;</a> 2019 Husky Game Development
    </div>

    <div class="footer-mtu-background">
      <div class="footer-mtu main-content-wrapper">
        <a href="https://www.mtu.edu/" target="_blank">
          <img src="<?php echo get_template_directory_uri(); ?>/images/mtu-logo-g.png">
        </a>
        <div class="footer-mtu-eoe">
          Michigan Technological University is an Equal Opportunity Educational Institution/Equal Opportunity Employer, which includes providing equal opportunity for protected veterans and individuals with disabilities.
        </div>
      </div>
    </div>

  </footer>



  <?php wp_footer(); ?>

</body>
</html>
