<?php
/**
 * Plugin Name: Responsive
 * Plugin URI: http://programming-review.com/
 * Description: Will make your theme responsive without any effort
 * Author: Dejan Batanjac
 * Version: 1.1.0
 * Author URI: https://programming-review.com/
 * License: GPLv2 or later
 */
if ( ! class_exists( 'Responsive' ) ) :
class Responsive {

  // Constants
  const NAME = 'responsive';
  const SLUG = 'responsive';

  //////////////////////////////////////////////////
  // Constructor makes sure jQuery will be added. //
  //////////////////////////////////////////////////
  function __construct() {

    add_action( 'wp_enqueue_scripts', 'add_jquery' );
    function add_jquery() {
      wp_enqueue_script( 'jquery' );
    }

    add_action( 'wp_head', array( &$this, 'draw_' ) );

  } // End constructor().

  ///////////////////////////////////
  // Main JavaScript resize script //
  ///////////////////////////////////
  function draw_() {
    ?>
    <script>

      jQuery(window).resize(function() {
        safescale();
      });
      jQuery(document).ready(function() {
        jQuery(window).trigger('resize');
        jQuery(window).trigger('resize');
      });

      function scale(factor_x){
        jQuery('html').css("transform","scale("+factor_x+","+factor_x+")");
        jQuery('html').css("-moz-transform","scale("+factor_x+","+factor_x+")");
        jQuery('html').css("-webkit-transform","scale("+factor_x+","+factor_x+")");
        jQuery('html').css("-o-transform","scale("+factor_x+","+factor_x+")");
      }

      function safescale(){

        factor_x = jQuery(window).width() / jQuery('body').width() ;

        jQuery("html").css({"position": "absolute", "margin": "0px", "padding": "0px"});
        jQuery("body").css({"position": "absolute", "margin": "0px", "padding": "0px"});
        scale(factor_x);
      }
    </script>

    <?php
    return true;
  }


} // end class
endif;

new Responsive();
