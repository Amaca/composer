<?php
//Options
$tabs = $component[$prefix . 'tab-main'];
$uniqueID = uniqid();
?>

<!-- Tabs -->
<div id="<?php echo 'tabs-' . $uniqueID; ?>" class="tabs">

    <ul class="nav nav-tabs" role="tablist" style="height: auto;">
        <?php $i = 0; ?>
        <?php foreach ($tabs as $tab) { ?>
        <li role="presentation" <?php if ($i == 0) {echo 'class="active"'; } ?>>
            <?php $tabAnchor = strtolower (str_replace(" ","", $tab[$prefix . 'tab-title'])); ?>
            <a href="#<?php echo $tabAnchor . '-' . $uniqueID; ?>" role="tab" data-toggle="tab">
                <?php echo $tab[$prefix . 'tab-title']; ?>
            </a>
        </li>
        <?php $i++; ?>
        <?php } ?>

    </ul>

    <div class="tab-content">

        <?php foreach ($tabs as $tab) { ?>
        <?php $tabAnchor = strtolower (str_replace(" ","", $tab[$prefix . 'tab-title'])); ?>

        <div role="tabpanel" class="tab-pane" id="<?php echo $tabAnchor . '-' . $uniqueID; ?>">
            <div class="description">
                <?php echo $tab[$prefix . 'tab-txt']; ?>
            </div>
        </div>

        <?php } ?>

    </div>

</div>


<script>
    jQuery(document).ready(function () {
        $('#<?php echo 'tabs-' . $uniqueID; ?> [data-toggle=tab]').click(function () {
            var $p = $(this).parent(),
                $id = $($(this).attr('href'));

            if ($p.is('.active')) {
                $p.removeClass('active');
                $id.hide();
            } else {
                $(' #<?php echo 'tabs-' . $uniqueID; ?> li.active').removeClass('active');
                $(' #<?php echo 'tabs-' . $uniqueID; ?> .tab-pane').hide();

                $p.addClass('active');
                $id.show();
            }
            return false;
        });
    });
</script>
<!-- /Tabs -->