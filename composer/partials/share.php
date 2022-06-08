<?php
// Opzioni

$share = $component[$prefix. 'share-intro'];
$align = $component[$prefix. 'share-align'];

if ($align == 'Sinistra') {
    $align = 'align-left';
} else if($align == 'Centro') {
    $align = 'align-center';
} else if ($align == 'Destra') {
    $align = 'align-right';
}
?>

<!-- Share -->
<div class="share <?php if ($align) { echo $align; }?>">
    <?php if ($share) { ?><div class="intro"><?php echo $share; ?></div><?php } ?>
    <div class="icons a2a_kit a2a_kit_size_32 a2a_default_style">
        <a class="a2a_button_facebook ico" data-toggle="tooltip" data-placement="top" title="Condividi su Facebook"></a>
        <a class="a2a_button_twitter ico" data-toggle="tooltip" data-placement="top" title="Condividi su Twitter"></a>
        <a class="a2a_button_google_plus ico" data-toggle="tooltip" data-placement="top" title="Condividi su Google+"></a>
        <a class="a2a_button_pinterest ico" data-toggle="tooltip" data-placement="top" title="Condividi su Pinterest"></a>
    </div>
</div>
<!-- /Share -->