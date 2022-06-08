<?php

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('WSsettings') ) {

    class WSsettings
    {
        function __construct() {
            add_action('admin_menu', array($this, 'initOptionsMenu') );
            add_action('admin_init', array($this, 'initPluginOptions')  );
            add_action('admin_init', array($this, 'initIncludeOptions') ); 
        }

        public function init() {
            //self::initOptionFields();
        }

        /*--------------------------------------------------
        Create Options Menu under Plugin WP Top Menu
        --------------------------------------------------*/
        function initOptionsMenu() {
            add_plugins_page(
              __( 'WS composer', 'WScomposer' ),       
              __( 'WS composer', 'WScomposer' ),      
              'administrator',
              'ws-composer-plugin',
              array($this, 'renderOptionsPage')
          );
        }

        /*--------------------------------------------------
        Renderize Settings Page
        --------------------------------------------------*/
        function renderOptionsPage() {
        ?>

        <div class="wrap">

            <div id="icon-themes" class="icon32"></div>
            <h2><?php _e( 'WS Composer', 'WScomposer' ); ?></h2>
            <?php settings_errors(); ?>
            
            <?php
            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'main_options';
            } else {
                $active_tab = 'main_options';
            }
            ?>

            <h2 class="nav-tab-wrapper">
                <a href="?page=ws-composer-plugin&tab=main_options" class="nav-tab <?php echo $active_tab == 'main_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Opzioni Principali', 'WScomposer' ); ?></a>
                <a href="?page=ws-composer-plugin&tab=include_options" class="nav-tab <?php echo $active_tab == 'include_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Inclusione Script', 'WScomposer' ); ?></a>
            </h2>

            <form method="post" action="options.php">
                <?php
                if( $active_tab == 'main_options' ) {
                    settings_fields( 'WScomposer_settings' );
                    do_settings_sections( 'WScomposer_settings' );
                } else {
                    settings_fields('WScomposer_include');
                    do_settings_sections('WScomposer_include');
                }
                submit_button();
                ?>
            </form>

        </div>

        <?php    
        }

        
        /*--------------------------------------------------
        Create settings sections
        --------------------------------------------------*/

        // Main Settings for Post Types and Template activations
        function initPluginOptions() {
            
            if( false == get_option( 'WScomposer_settings' ) ) {
                add_option( 'WScomposer_settings', apply_filters( 'WScomposerAddOption', $this->WScomposerAddOption() ) );
            } 

            add_settings_section(
                'mainSettingsSection',
                __( 'Opzioni Principali', 'WScomposer' ),
                array($this, 'settingsHeader'),
                'WScomposer_settings'
            );

            add_settings_field(
                'Scegli Post Type',
                __( 'Scegli Post Type', 'WScomposer' ),
                array($this, 'choosePostType'),
                'WScomposer_settings',
                'mainSettingsSection'
            );

            add_settings_field(
               'Scegli Template',
               __( 'Scegli Template', 'WScomposer' ),
               array($this, 'chooseTemplate'),
               'WScomposer_settings',
               'mainSettingsSection'
           );

            register_setting(
		        'WScomposer_settings',
		        'WScomposer_settings'
	        );
        }

        // Scripts to include options
        function initIncludeOptions() {
            
            if( false == get_option( 'WScomposer_include' ) ) {
                add_option( 'WScomposer_include', apply_filters( 'WScomposerAddOption', $this->WScomposerAddOption() ) );
            }

            add_settings_section(
               'includeScriptsSection',
               __( 'Includi Scripts', 'WScomposer' ),
               array($this, 'includeHeader'),
               'WScomposer_include'
           );

            add_settings_field(
                'Scegli Script',
                __( 'Script da includere', 'WScomposer' ),
                array($this, 'chooseScriptInclude'),
                'WScomposer_include',
                'includeScriptsSection'
            );

 
            register_setting(
		        'WScomposer_include',
		        'WScomposer_include'
	        );
        }

        /****************************************************************************/
        /*************** WScomposer_settings Callback functions *********************/
        /***************************************************************************/

        /*--------------------------------------------------
        Choose Post Type
        --------------------------------------------------*/
        function choosePostType() {
     
            $options = get_option( 'WScomposer_settings');
            $postTypesList = get_post_types( array('public' => true ));
            $checkboxClass = '';
            $optionType = 'post_type';
            $html = '<p>'. __( 'Scegli i <strong>tipi di post</strong> su cui vuoi attivare il WS composer:', 'WScomposer' ) .'</p></br>';

            foreach ($postTypesList as $postType) {

                if ($postType != 'attachment') {
                    if (!isset($options[$optionType][$postType])) {
                        $checkboxClass = '';
                        $options[$optionType][$postType] = 0;
                    } else {
                        $checkboxClass = 'checked="checked"';
                        $options[$optionType][$postType] = 1;
                    }
                    $html .= '<input type="checkbox" id="WScomponentCheckbox '. $postType .'" name="WScomposer_settings['. $optionType .']['. $postType .']" value="1"' . $checkboxClass . '/>';
                    $html .= '&nbsp;';
                    $html .= '<label for="WScomponentCheckbox '. $postType .'">' . $postType . '</label>';
                    $html .= '</br></br>';
                }

            }
            
            //print_inline($options);
            echo $html;
        }


        /*--------------------------------------------------
        Choose Template
        --------------------------------------------------*/
        function chooseTemplate() {

            $options = get_option( 'WScomposer_settings');
            $templateList = get_page_templates();
            $checkboxClass = '';
            $optionType = 'template';
            $html = '<p>'. __( 'Scegli i <strong>template</strong> su cui vuoi attivare il WS composer:', 'WScomposer' ) .'</p></br>';

            foreach ($templateList as $template => $value) {
                if (!isset($options[$optionType][$value])) {
                    $checkboxClass = '';
                    $options[$optionType][$value] = 0;
                } else { 
                    $checkboxClass = 'checked="checked"';
                    $options[$optionType][$value] = 1;
                }
                $html .= '<input type="checkbox" id="WScomponentCheckbox '. $template .'" name="WScomposer_settings['. $optionType .']['. $value .']" value="1"' . $checkboxClass . '/>';
                $html .= '&nbsp;';
                $html .= '<label for="WScomponentCheckbox '. $template .'">' . $template . '</label>';
                $html .= '</br></br>';
            }

            //print_inline($templateList);
            echo $html;
        }


        /*--------------------------------------------------
        Plugin Header
        --------------------------------------------------*/
        function settingsHeader() {
            echo '<p>' . __( 'Le impostazioni principali del WS Composer. Scegli dove mostrare il composer.', 'WScomposer' ) . '</p>';
        }

        /****************************************************************************/
        /*************** WScomposer_settings Callback functions *********************/
        /****************************************************************************/

        /*--------------------------------------------------
        Plugin Header
        --------------------------------------------------*/
        function includeHeader() {
            echo '<p>' . __( 'Scegli gli script da includere utilizzati da WS Composer. Se li hai gia inclusi nel tuo tema, puoi disattivarli', 'WScomposer' ) . '</p>';
        }


        /*--------------------------------------------------
        Choose Template
        --------------------------------------------------*/
        function chooseScriptInclude() {
            $options = get_option( 'WScomposer_include');
            $checkboxClass = '';
            $scriptList = array('jQuery','jQuery Easing','Bootstrap', 'slickCarousel' );
            $html = '';

            foreach ($scriptList as $script) {
                if (!isset($options[$script])) {
                    $checkboxClass = '';
                    $options[$script] = 0;
                } else {
                    $checkboxClass = 'checked="checked"';
                    $options[$script] = 1;
                }
                $html .= '<input type="checkbox" id="WScomponentCheckbox '. $script .'" name="WScomposer_include[' . $script . ']" value="1"' . $checkboxClass . '/>';
                $html .= '&nbsp;';
                $html .= '<label for="WScomponentCheckbox '. $script .'">' . $script . '</label>';
                $html .= '</br></br>';
            }

            echo $html;
        }


        /*******************************************************************/
        /***************** Various Settings functions **********************/
        /*******************************************************************/

        /*--------------------------------------------------
        Default options
        --------------------------------------------------*/
        function WScomposerAddOption() {
            $defaults = array(
                'WScomponentCheckbox'	=>	''
            );
            return apply_filters( 'WScomposerAddOption', $defaults );
        } 


        /*--------------------------------------------------
        Input Validation
        --------------------------------------------------*/
        function inputValidation( $input ) {
           $output = array();
            foreach( $input as $key => $value ) {
                if( isset( $input[$key] ) ) {
                     $output[$key] = strip_tags( stripslashes( $input[ $key ] ) );
                } 
            } 
            return apply_filters( 'inputValidation', $output, $input );
        } 
    }

/*--------------------------------------------------
Inizialize WSsettings Class
--------------------------------------------------*/
WScomposer()->settings = new WSsettings();


} // class_exists check

?>