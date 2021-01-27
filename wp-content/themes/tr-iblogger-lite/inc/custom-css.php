<?php // custom css 

function tr_iblogger_lite_custom_css() {
/* 
	For header image
*/
if(has_header_image()){
		$custom_css_banner = "#head{ 
			    				background-image: url(" . esc_url( get_header_image() ) . ");
			    				background-position: center center;
			    				background-size: cover;
			    				background-repeat: no-repeat;
			    				margin-bottom:0;
			    	 		}";
    	wp_add_inline_style( 'tr-iblogger-lite-template', $custom_css_banner ); 
    }
/* 
	For menu bar down if admin bar showing
*/
	if( is_admin_bar_showing() ){
		$menubar_down = ".sticky{
								 top: 32px ! important; 
								}
								@media (min-width: 601px) and (max-width: 767px){
									.sticky{
									 	top: 45px ! important; 
									} 
								}
								@media (max-width: 600px){
									.sticky{
									 	top: 0 ! important; 
									} 
								}";
		wp_add_inline_style( 'tr-iblogger-lite-template', $menubar_down );
	}

}
add_action( 'wp_enqueue_scripts', 'tr_iblogger_lite_custom_css' );

?>