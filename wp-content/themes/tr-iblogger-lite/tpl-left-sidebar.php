<?php
/**
 * Template Name: Page Left Sidebar
 *
 * This is the template that displays page left sidebar.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tr-iblogger-lite
 */

get_header(); 

tr_iblogger_lite_breadcrumb(); //for show breadcrumb
?>

<section id="post-section">
	<div class="container">
		<div class="page-content-section">
			<div class="row">
				<div class="col-md-4 col-sm-5 col-lg-4 col-xs-12 text-center">
					<?php dynamic_sidebar('sidebar'); ?>
				</div>
				<div class="col-md-8 col-sm-7 col-lg-8 col-xs-12">
					<div class="post-content">
						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
						?>
					</div><!-- /.end of post-content -->
				</div><!-- /.end of col-md-8 -->
			</div><!-- /.end of row -->
		</div>
	</div><!-- /.end of container -->
</section><!-- /#end of post-section -->

<?php
get_footer();
