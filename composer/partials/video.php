<?php

$ratio = $component[$prefix . 'video-ratio'];
$type = $component[$prefix . 'video-type'];

if ($ratio == '16:9') {
    $ratio = 'wide';
} else {
    $ratio = 'square';
}
?>

<!-- Video -->
<div class="video">
    <div class="embed-video <?php echo $ratio; ?>">
        <?php
        if ($type == 'Youtube') {
            $youtube = $component[$prefix . 'video-youtube'];
            $youtube = str_replace ("watch?v=", "embed/", $youtube);
            $html = '<iframe src="' . $youtube . '" frameborder="0" allowfullscreen></iframe>';
        } else if ($type == 'Vimeo') {
            $vimeo = $component[$prefix . 'video-vimeo'];
            $vimeo = str_replace ("vimeo.com", "player.vimeo.com/video", $vimeo);
            $html = '<iframe src="'. $vimeo . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        } else if ($type == 'Html5') {
            $cover = $component[$prefix . 'video-cover'];
            $html5 = $component[$prefix . 'video-html5'];
            $html = '<video controls poster="' . $cover . '">';
            $html .= '<source src="' . $html5 . '" type="video/mp4">';
            $html .= '</video>';
        }
        echo $html;
        ?>      
    </div>
</div>
<!-- /Video -->