<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tr-iblogger-lite
 */

?>

	<!-- ========== start of footer section ========== -->

	<footer id="footer">
		<!-- footer-top -->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<?php dynamic_sidebar('footer-1') ?>
					</div><!-- /.end of col-md-4 -->

					<div class="col-lg-4 col-md-4 col-sm-4">
						<?php dynamic_sidebar('footer-2') ?>
					</div><!-- /.end of col-md-4 -->

					<div class="col-lg-4 col-md-4 col-sm-4">
						<?php dynamic_sidebar('footer-3'); ?>
					</div><!-- /.end of col-md-4 -->
				</div><!-- /.end of row -->
				<?php 
		    		wp_nav_menu( array(
			             'menu'              => 'footermenu',
			             'theme_location'    => 'footermenu',
			             //'depth'             => 2,
			             'container'         => 'div',
			             'container_class'   => 'footer-menu text-center',
			             'container_id'      => '',
			             'menu_class'        => 'list-unstyled list-inline',
			             'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			             'walker'            => new WP_Bootstrap_Navwalker()
		         	) );

		    	 ?>
				</div><!-- /.end of footer-menu -->
			</div><!-- /.end of container -->
		</div><!-- /.end of footer-top -->

		<!-- footer-end -->
		<div class="footer-end text-center">
			<div class="container">
				<div class="footer-end-text">
					<p>
						<?php
							

							/* translators: 1: Theme name, 2: Theme author. */
							$copyright = sprintf( esc_html__( '&copy; %1$s All Rights Reserved by %2$s. Theme Developed by %3$s. Powered by %4$s', 'tr-iblogger-lite' ), '<span>'. date_i18n(__('Y','tr-iblogger-lite')) .'</span>' , '<a href="' . esc_url( home_url( '/' ) ) . '">'. get_bloginfo( 'name' ) .'</a>', '<a href="' . esc_url( 'https://www.themerally.com/' ) . '" target="blank" >Theme Rally</a>', '<a href="'. esc_url('https://wordpress.org/').'" target="blank" >WordPress</a>.');

							$copyright_noback = sprintf( esc_html__( '&copy; %1$s All Rights Reserved by %2$s. Theme Developed by %3$s. Powered by %4$s', 'tr-iblogger-lite' ), '<span>'. date_i18n(__('Y','tr-iblogger-lite')) .'</span>' , '<a href="' . esc_url( home_url( '/' ) ) . '">'. get_bloginfo( 'name' ) .'</a>', 'Theme Rally', '<a href="'. esc_url('https://wordpress.org/').'" target="blank" >WordPress</a>.');
							if(is_home() || is_front_page())
								echo wp_kses_post( get_theme_mod('footer_copyright', $copyright) );
							else
								echo wp_kses_post( get_theme_mod('footer_copyright', $copyright_noback) );	
						?>
					</p>
				</div><!-- /.end of footer-end-text -->
			</div><!-- /.end of container -->
		</div><!-- /.end of footer-end -->
	</footer><!-- /#end of footer section -->

	<!-- ========== start of scrolltop section ========== -->

	<?php if(get_theme_mod('footer_go_top_button', true) == true): ?>
		<button class="material-scrolltop" type="button"></button>
	<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
