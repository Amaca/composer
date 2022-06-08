<?php
// Options
//print_inline ($row);

$txt = $component[$prefix . 'title-txt'];
$size = $component[$prefix . 'title-size'];
$color = $component[$prefix . 'title-color'];

if ($color) {
    $color = 'color:' . $color . ';';
}

$align = $component[$prefix . 'title-align'];
if ($align == 'Sinistra') {
    $align = 'left';
} else if ($align == 'Centro') {
    $align = 'center';
} else if ($align == 'Destra') {
    $align = 'right';
}

$tag = $component[$prefix . 'title-h'];
if ($tag == 'default') {
    $tag = 'div';
}

$styles = $component[$prefix . 'title-style'];
$textStyle = '';
if ($styles) {
    foreach ($styles as $style) {
        if ($style == 'Grassetto') {
            $textStyle .= 'font-weight: bold; ';
        }
        if ($style == 'Corsivo') {
            $textStyle .= 'font-style: italic; ';
        }
    }
} else {
    $textStyle = '';
}

?>

<!-- Title -->
<div class="title">
    <?php
    $html = '<' . $tag . ' style="font-size:' . $size . 'px; text-align: ' . $align . '; ' . $textStyle . ' ' . $color . '">';
    $html .= $txt;
    $html .= '</' . $tag . '>';
    echo $html;

    ?>
</div>
<!-- /Title-->