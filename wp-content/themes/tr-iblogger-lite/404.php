<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package tr-iblogger-lite
 */

get_header(); 

tr_iblogger_lite_breadcrumb(); //for show breadcrumb
?>

<section id="error" class="text-center">
	<div class="container">
		<div class="row">
			<div class="<?php tr_iblogger_lite_content_layout(); ?>">
				<div class="error-content">
					<h3><?php esc_html_e('404 ERROR' , 'tr-iblogger-lite'); ?></h3>
					<p><?php esc_html_e('Sorry the page you looking for could not be found' , 'tr-iblogger-lite' ); ?></p>
					<a href="<?php echo esc_url( home_url() ) ?>"><?php esc_html_e( 'go to home page' , 'tr-iblogger-lite' ); ?></a>
					<p class="or"><?php esc_html_e( 'or' , 'tr-iblogger-lite' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div><!-- /.col-md-8 -->
			<?php get_sidebar(); ?>
		</div><!-- /.row -->		
	</div><!-- /.container -->
</section><!-- /#error -->

<?php
get_footer();
