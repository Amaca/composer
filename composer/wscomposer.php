<?php
/**
 * Plugin Name: ACF WS Visual Composer
 * Plugin URI: http://www.websolute.it
 * Description: Visual composer for Wordpress through ACF plugin
 * Version: 1.0.0
 * Author: Websolute
 * Author URI: http://www.websolute.it
 * License: GPL2
 */


if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('WScomposer') ) :

class WScomposer {

    function __construct() {
		//
	}

    // Main Class Constructor
    function initialize() {
        
        // Include helpers
        require_once 'api/helpers.php';

        // Include Classes test
        require_once 'core/setup.php';
        require_once 'core/settings.php';
        require_once 'core/views.php';

        // actions
		add_action('init',	array($this, 'init'), 5);
		add_action('wp_enqueue_scripts',	array($this, 'register_assets'), 5);
        //add_action('init',	array($this, 'register_assets'), 5);
    }

    function init() {
        //
    }

    /*--------------------------------------------------
    Register Assets
    --------------------------------------------------*/
    function register_assets() {
        $options = get_option( 'WScomposer_include');

        // Including jQuery 3.1.1
        if (isset($options['jQuery'])) {
            if ($options['jQuery']) {
                wp_register_script( 'jquery-js',
                'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js', false, '3.1.1', true );
                wp_enqueue_script( 'jquery-js' );
            }
        }

        // Including jQuery Easing 1.4.1
        if (isset($options['jQuery Easing'])) {
            if ($options['jQuery Easing']) {
                wp_register_style( 'jquery-easing',
                'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js');
                wp_enqueue_style( 'jquery-easing' );
            }
        }

        // Including Slick Carousel 1.6.0
        if (isset($options['slickCarousel'])) {
            if ($options['slickCarousel']) {
                //css
                wp_register_style( 'slick-css',
                plugin_dir_url( __FILE__ ) . 'dist/css/slick.css');
                wp_enqueue_style( 'slick-css' );

                wp_register_style( 'slick-theme-css',
                plugin_dir_url( __FILE__ ) . 'dist/css/slick-theme.css');
                wp_enqueue_style( 'slick-theme-css' );

                //js
                wp_register_script( 'slick-js',
                'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js', false, '1.6.0', true );
                wp_enqueue_script( 'slick-js' );
            }
        }

        // Including Bootstrap 3.3.7
        if (isset($options['Bootstrap'])) {
            if ($options['Bootstrap']) {
                
                //css
                wp_register_style( 'bootstrap-css',
                'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
                wp_enqueue_style( 'bootstrap-css' );

                //js
                wp_register_script( 'slick-js',
                'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', false, '1.6.0', true );
                wp_enqueue_script( 'slick-js' );
            }
        }

        // Includin WS composer main css
        wp_register_style( 'wscomposer-css',
        plugin_dir_url( __FILE__ ) . 'dist/css/wscomposer.min.css');
        wp_enqueue_style( 'wscomposer-css' );

    }
}

/*--------------------------------------------------
Inizialize WScomposer Class
--------------------------------------------------*/
function WScomposer() {
	global $WScomposer;
	if( !isset($WScomposer) ) {
		$WScomposer = new WScomposer();
		$WScomposer->initialize();
	}
	return $WScomposer;
}

WScomposer();


endif; // class_exists check

?>