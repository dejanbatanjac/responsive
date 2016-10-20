<?php
/*
Plugin Name: Responsive
Plugin URI: http://programming-review.com/
Description: Can make your theme responsive without any effort
Author: Dejan Batanjac
Version: 1.0
Author URI: http://programming-review.com/
License: GPLv2 or later
  
*/

class Responsive {

	/*--------------------------------------------*
	 * Constants
	 *--------------------------------------------*/
	const name = 'responsive';
	const slug = 'responsive';
	
	/**
	 * [__construct makes sure jQuery h/b added]
	 */
	function __construct() {


		add_action( 'wp_enqueue_scripts', 'please_add_jquery' );
		function please_add_jquery() {    wp_enqueue_script( 'jquery' ); }		
		

		//hook to wp_head
		add_action('wp_head',array( &$this, 'draw_' ));		


	}

	/**
	 * [draw_ Scales with factor X]
	 * @return [bool] [true]
	 */
	function draw_(){
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
new Responsive();

?>
