<?php
// Options
//$prefix = validateColumns($row);


$color = $component[$prefix . 'divisor-color'];
$width = $component[$prefix . 'divisor-width'];
$margin = $component[$prefix . 'divisor-margin'];

if ($color || $margin ) {
    $html = 'style="';
    $html .= $color ? 'background-color: ' . $color . '; ' : '';
    $html .= $margin ? 'margin-bottom: ' . $margin . 'px; ' : ' ';
    $html .= '"';
}
?>

<div class="divisor <?php echo ($width == 'Centrato') ? 'short' : 'full'; ?>" <?php if ($html) { echo $html; } ?>></div>