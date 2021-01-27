<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
					<div class="<?php tr_iblogger_lite_content_layout(); ?>">
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
					<?php get_sidebar(); ?>
				</div><!-- /.end of row -->
			</div>
		</div><!-- /.end of container -->
	</section><!-- /#end of post-section -->

<?php
get_footer();
