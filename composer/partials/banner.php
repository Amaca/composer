<?php
// Options

$imgUrl = $component[$prefix . 'banner-img'];
$txtOn = $component[$prefix . 'banner-switch-txt'];
if ($txtOn) {
    $txt = $component[$prefix . 'banner-txt'];
    $pos = $component[$prefix . 'banner-pos'];

    if ($pos == 'Sinistra') {
        $pos = 'align-left';
    } else if ($pos == 'Destra') {
        $pos = 'align-right';
    } else {
        $pos = '';
    }
}
?>

<!-- Banner -->
<div class="banner">
    <div class="content <?php if ($txtOn) { echo 'titled'; } ?>" style="background-image: url(<?php echo $imgUrl; ?>)">
        <?php if ($txtOn) { ?>
            <h3 <?php if ($pos) { echo 'class="'. $pos .'"'; } ?>><?php echo $txt; ?></h3>
        <?php } ?>
    </div>
</div>
<!-- /Banner -->