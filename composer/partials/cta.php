<?php
// Options

$text = $component[$prefix . 'cta-text'];
$textSize = $component[$prefix . 'cta-size'];
$url = $component[$prefix . 'cta-url'];
$target = $component[$prefix . 'cta-target'];
$color = $component[$prefix . 'cta-color'];
$colorUrl = $component[$prefix . 'cta-color-url'];

$border = $component[$prefix . 'cta-border'];
$borderThick = $component[$prefix . 'cta-border-thick'];
$borderColor = $component[$prefix . 'cta-border-color'];
$borderRadius = $component[$prefix . 'cta-border-radius'];

$style = 'style="';

    if ($textSize) {
        $style .= 'font-size: ' . $textSize . 'px; ';
    }

    if ($color) {
        $style .= 'background-color: ' . $color . '; ';
    }

    if ($colorUrl) {
        $style .= 'color: ' . $colorUrl . '; ';
    }

    if ($border) {
        if ($borderThick) {
            $style .= 'border: solid ' . $borderThick . 'px ';
            $style .= $borderColor ? $borderColor . '; ' : '#ffffff; ';
        }
        if ($borderRadius) {
            $style .= 'border-radius: ' . $borderRadius . 'px; ';
        }
    }

$style .= '"';

?> 
<!-- CTA -->
<div class="cta">
    <a href="<?php echo $url; ?>" target="<?php echo $target; ?>" <?php echo $style; ?>><?php echo $text; ?></a>
</div>
<!-- /CTA-->