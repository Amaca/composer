<?php

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('WSviews') ) :

class WSviews
{
    function __construct() {
        add_filter('the_content',  array($this, 'the_wscomp_content'), 5, 1 );
    }

    public static function init() {
        //
    }



    public function the_wscomp_content($content) {

        global $post;

        $options = get_option( 'WScomposer_settings');

        global $location;
        $chosenTypes = array();
        $chosenTemplates = array();

        foreach ($location as $loc) {
              foreach ($loc as $l) {

                  if ($l['param'] == 'post_type') {
                      array_push($chosenTypes, $l['value']);
                  } else if ($l['param'] == 'page_template') {
                      array_push($chosenTemplates, $l['value']);
                  }
              }
        }

        if (in_the_loop()) {
            
            if ( (is_page_template($chosenTemplates) && (!empty($chosenTemplates)) ) || ( is_singular($chosenTypes) && (!empty($chosenTypes)) ) ) {
                
                echo '<div class="wscomposer">';

                $fields = get_fields();
                $rows = $fields['ws-composer'];

                foreach ($rows as $row) {
                    if ($row['col'] == 'Una colonna') { 
                ?>
                
                <!-- 1 column -->
                <section class="ws-col-1 <?php if($row['col-css']) { echo $row['col-css']; } ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 box">
                                <?php
                        $components = $row['col-1'];
                        acf_component_loader($components, $row);
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /1 column -->
   
                <?php 
                    }

                    if ($row['col'] == 'Due colonne') {
                ?>

                <!-- 2 columns -->
                <section class="ws-col-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 box">
                                <?php
                        $components = $row['col-2-1'];
                        acf_component_loader($components, $row);
                                ?>
                            </div>
                            <div class="col-md-6 box">
                                <?php
                        $components = $row['col-2-2'];
                        acf_component_loader($components, $row);
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /2 columns -->

                <?php
                    }

                    if ($row['col'] == 'Tre colonne') {
                ?>

                <!-- 3 columns -->
                <section class="ws-col-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-4 box">
                                <?php
                        $components = $row['col-3-1'];
                        acf_component_loader($components, $row);
                                ?>
                            </div>
                            <div class="col-sm-6 col-md-4 box">
                                <?php
                        $components = $row['col-3-2'];
                        acf_component_loader($components, $row);
                                ?>
                            </div>
                            <div class="col-sm-6 col-md-4 box">
                                <?php
                        $components = $row['col-3-3'];
                        acf_component_loader($components, $row);
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /3 columns -->

                <?php
                    }
                }
                echo '</div>';

            } else {

                return $content;
                
            }

        } else {

            return $content;

        }
    }
}

/*--------------------------------------------------
Inizialize WSviews Class
--------------------------------------------------*/
WScomposer()->views = new WSviews();


endif; // class_exists check

?>