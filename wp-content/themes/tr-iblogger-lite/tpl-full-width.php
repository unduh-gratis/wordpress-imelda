<?php
/**
 * Template Name: Page Full Width
 *
 * This is the template that displays page full width.
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
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
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
				</div><!-- /.end of col-md-12 -->
			</div><!-- /.end of row -->
		</div>
	</div><!-- /.end of container -->
</section><!-- /#end of post-section -->

<?php
get_footer();
