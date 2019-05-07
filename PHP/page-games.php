<?php get_header(); ?>




<div class="main-content-wrapper main-content-spaced">

    <h1>Our Games</h1>
  


    <div class="games-outer-container">
      <div class="games-years">
          <?php 
          
            $terms = get_terms(
                array(
                    'taxonomy' => 'game_year',
                    'hide_empty' => false,
                    'orderby' => 'slug',
                    'order' => 'desc'
                )
             );
             $i = 0;
             foreach($terms as $term) {
                 $slg = $term->slug;
                 $classes = "games-year";
                 if ($i == 0) {
                     $classes .= " games-year-selected";
                 }
                 $i++;
                 ?>

                    <div class="<?php echo $classes; ?>" year="<?php echo $slg ?>"><?php echo $slg ?></div>

                 <?php
             }
          
          
          
          ?>
      </div>
      <div id="games-container" class="games-container-loading">

      </div>
    </div>

  </div>



<div id="games-modal" class="games-modal-invisible">
  
  <div class="games-modal-container">

  
    <div class="games-modal-inner">
      <span class="games-modal-close">X</span>
        <div id="games-modal-content">
          
        </div>
    </div>
  
  </div>

</div>



<template id="loading">
  <img src="<?php echo get_template_directory_uri()?>/images/loading.gif">
</template>




<?php get_footer(); ?>