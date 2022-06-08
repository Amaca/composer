<?php
// Options

$uniqueID = 'slider'. uniqid();

$dots = $component[$prefix . 'slider-dots'];
$dots = $dots ? 'true' : 'false';

$arrows = $component[$prefix . 'slider-arrows'];
$arrows = $arrows ? 'true' : 'false';

$type = $component[$prefix . 'slider-type'];
$type = $type == 'Dissolvenza' ? 'true' : 'false';

$timing = $component[$prefix . 'slider-timing'];

$autoplay = $component[$prefix . 'slider-autoplay'];
$autoplay = $autoplay ? 'true' : 'false';

$autoplaySpeed = $component[$prefix . 'slider-autoplay-speed'];

$adaptiveHeight = $component[$prefix . 'slider-adaptive'];
$adaptiveHeight = $adaptiveHeight ? 'true' : 'false';

$html = '';
if ($component[$prefix . 'slider-img']) {
    $images = $component[$prefix . 'slider-img'];
    ?>

    <!-- Slider -->
    <div class="slider">
        <div class="composer-gallery" id="<?php echo $uniqueID; ?>">
            <?php 
            foreach ($images as $image) {
                $html .= '<div class="item">';
                $html .= '<img src="' . $image['url'] . '">';
                $html .= '</div>';
            }
            echo $html;
            ?>
        </div>
    </div>

    <?php $uniqueID = '#' . $uniqueID; ?>
    <script>
    jQuery(document).ready(function () {
        $('<?php echo $uniqueID; ?>').slick({
            arrows: <?php echo $arrows; ?>,
            dots: <?php echo $dots; ?>,
            speed: <?php echo $timing; ?>,
            autoplay: <?php echo $autoplay; ?>,
            <?php if($autoplaySpeed){ ?>
            autoplaySpeed: <?php echo $autoplaySpeed; ?>,
            <?php } ?>
            fade: <?php echo $type; ?>,
            adaptiveHeight: <?php echo $adaptiveHeight; ?>
        });
    });
    </script>
    <!-- Slider -->

<?php

} else {

    echo '<p style="text-align: center; margin-top: 50px;"><strong>' . __( 'Nessuna Immagine Caricata', 'WScomposer' ) . '</strong></p>';
}

?>