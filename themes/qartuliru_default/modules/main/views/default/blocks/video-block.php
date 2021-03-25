<?php

?>
<div class="section-bg-video grunge-border">
    <div class="bg-overlay transparent-dark"></div>
    <div class="videobox">
        <video autoplay
               loop
               muted
               poster="<?php echo !empty($poster) ? $poster : ''; ?>">
            <source src="<?php echo  !empty($video)  ? $video : ''; ?>"
                    type="video/mp4">
        </video>
    </div>
    <div class="container content overlay-content white text-center"
         data-anima="fade-top"
         data-timeline="asc"
         data-time="1000">
        <?php  !empty($text)  ? $text : ''; ?>
    </div>
</div>