<?php
// Opzioni

$height = $component[$prefix .'spacer-height'];
if ($height != '40') {
    $height = 'style="min-height: ' . $height . 'px;"';
}

?>

<div class="spacer" <?php if($height != '40') { echo $height; } ?>></div>