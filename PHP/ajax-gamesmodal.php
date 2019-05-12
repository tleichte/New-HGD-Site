<?php 
    global $post;
    $post = get_post($_POST['game']);
    setup_postdata( $post );
?>

<p class="games-modal-title">
    <?php echo get_the_title(); ?>
</p>
<p class="games-modal-year">
    <?php echo get_the_terms(get_the_ID(), 'game_year')[0]->name; ?>
</p>


<?php 
    $Ids = get_field("trailer_ytids");
    $screenshots = get_field("screenshots");
    $numIds = 0;
    if (is_array($Ids)) {
        $numIds = count($Ids);
    }
    
    $numScreenshots = 0;
    if (is_array($screenshots)) {
        $numScreenshots = count($screenshots);
    }

    if ($numIds > 0 || $numScreenshots > 0) {
?>
        <div class="games-modal-gallery-display">
            <div class="games-modal-gallery-display-image">
            </div>
        </div>

        <div class="games-modal-gallery">
<?php 
            if ($numIds > 0) {
                while (have_rows("trailer_ytids")) {
                    the_row();
?>
                    <div
                        class="games-modal-gallery-image"
                        gallery-type="trailer"
                        gallery-trailer-id="<?php echo get_sub_field("youtube_id"); ?>"
                    >
                        <img src="http://img.youtube.com/vi/<?php echo get_sub_field("youtube_id"); ?>/0.jpg">
                        <div class="games-modal-trailer-overlay">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/play-icon.png">
                        </div>
                    </div>
<?php 
                }
            }
            if ($numScreenshots > 0) {
                foreach($screenshots as $screenshot) {
?>
                    <div 
                        class="games-modal-gallery-image"
                        gallery-type="image"
                        gallery-image-url="<?php echo $screenshot['url']; ?>"
                    >
                        <img src="<?php echo $screenshot['sizes']['medium']; ?>">
                    </div>
<?php
                }
            }
?>
        </div>
<?php 
    }
    else { 
?>
        <div class="games-modal-nogallery">
            <img src="<?php echo get_field("cover_image")['url'];?>">
        </div>
<?php
    }
?>

<div class="games-modal-description">
    <div class="games-modal-developers">
        <div class="games-modal-developers-title">
            <?php echo get_field("team_name");?>
        </div>
<?php 
        while (have_rows("team_members")) {
            the_row();
?>
            <div class="games-modal-developer">
                <?php echo get_sub_field("member_name"); ?>
                <span class="games-modal-developer-role">
                    <?php echo get_sub_field("member_role"); ?>
                </span>
            </div>
<?php 
        }
?>
    </div>
    <div class="games-modal-description-text">
<?php
        $descr = get_field("description");
        if (strlen(trim($descr)) > 0) {
?>
            <span>Description</span>
            <?php echo nl2br($descr); ?>
<?php 
        }
        $download_link = get_field("download_link");
        if (strlen(trim($download_link)) > 0) {
?>
            <div>
                <a href="<?php echo get_field("download_link"); ?>" target="_blank">
                <button>Download &darr;</button>
                </a>
            </div>
<?php 
        }
?>
    </div>
</div>
