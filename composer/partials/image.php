<?php
// Opzioni

$url = $component[$prefix . 'image-url'];
$caption = $component[$prefix . 'image-caption'];
?>

<!-- Image Item -->
<div class="image-item">
    <div class="image-wrapper">
        <img class="img" src="<?php echo $url; ?>" />
        <?php if($caption) { ?>
            <div class="caption"><?php echo $caption; ?></div>
        <?php } ?>
    </div>
</div>
<!-- /Image Item -->