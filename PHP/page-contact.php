<?php get_header(); ?>


<div class="main-content-wrapper main-content-spaced contact-container">

    <h1><?php echo get_field('header_text'); ?></h1>

    <?php echo get_field('google_form'); ?>  

    <div class="editor-styled">
        <?php the_field('page_content'); ?>
    </div>
  
</div>

<?php get_footer(); ?>