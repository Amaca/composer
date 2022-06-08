<?php

/*---------------------------------------------------
DEBUG Print inline
--------------------------------------------------*/
function print_inline($object) {
    echo '<pre>';
    print_r($object);
    echo '</pre>';
}


/*---------------------------------------------------
DEBUG Fixed console
--------------------------------------------------*/
function console($object) {
    echo '<div style="position: fixed; background: #444; right: 0; bottom: 50px;  z-index: 999999; color: #ffffff; padding: 20px; opacity: 0.9">';
    print_inline($object);
    echo '</div>';
}


/*---------------------------------------------------
Remap Post Types Array
--------------------------------------------------*/
function remapPostTypesArray() {
    $options = get_option( 'WScomposer_settings');
    $choosenPostTypes = array();

    foreach ($options as $postType => $value) {
        array_push($choosenPostTypes, $postType);
    }
    return $choosenPostTypes;
}


/*---------------------------------------------------
Include partial lines through ACF
--------------------------------------------------*/
function acf_component_loader($components, $row) {

    if ($components) {

        foreach ( $components as $component) {
            
            foreach ($component as $key=>$singleField) {

                if (strpos($key, '1-1') !== false) {
                    $prefix = '1-1-';
                }
                if (strpos($key, '2-1') !== false) {
                    $prefix = '2-1-';
                } 
                if (strpos($key, '2-1') !== false) {
                    $prefix = '2-1-';
                } 
                if (strpos($key, '2-2') !== false) {
                    $prefix = '2-2-';
                } 
                if (strpos($key, '3-1') !== false) {
                    $prefix = '3-1-';
                } 
                if (strpos($key, '3-2') !== false) {
                    $prefix = '3-2-';
                } 
                if (strpos($key, '3-3') !== false) {
                    $prefix = '3-3-';
                }
                 
            }

            include( plugin_dir_path( __FILE__ ) . '../partials/' . $component['acf_fc_layout'] .'.php');
        }

    } else {
        echo '<p style="text-align: center; margin-top: 50px;"><strong>' . __( 'Nessun Componente selezionato', 'WScomposer' ) . '</strong></p>';
    }    
}

?>