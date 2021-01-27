<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tr-iblogger-lite
 */

get_header();

?>

	<section id="blog">
		<div class="container">
			<div class="blog-area">
				<div class="row">
					<div class="<?php tr_iblogger_lite_content_layout(); ?>">
						<div class="blog-content text-center">
						<?php if(have_posts()): while(have_posts()): the_post(); 
							
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile; 

						  	tr_iblogger_lite_pagination(); 

						 else : 
							get_template_part( 'template-parts/content', 'none' );
					
						 endif; ?>	

						</div><!-- /.end of blog-content -->
					</div><!-- /.end of col-md-8 -->
					<?php get_sidebar(); ?>
				</div><!-- /.end of row -->
			</div><!-- /.end of blog-area -->
		</div><!-- /.end of container -->
	</section><!-- /#end of blog section -->

<?php
get_footer();