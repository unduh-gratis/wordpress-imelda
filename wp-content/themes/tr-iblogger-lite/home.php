<?php
/**
 * Template Name: Blog Page
 * 
 * The template for displaying blog page
 *
 * If you create a page name 'blog' it show by this page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tr-iblogger-lite
 */

get_header();

tr_iblogger_lite_breadcrumb(); //for show breadcrumb
?>

	<section id="blog">
		<div class="container">
			<div class="blog-area">
				<div class="row">
					<div class="<?php tr_iblogger_lite_content_layout(); ?>">
						<div class="blog-content text-center">
						<?php 
						if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
					    elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
					    else { $paged = 1; }

						$blog_posts = new WP_Query( array(
							'post_type' => 'post',
							'paged' => $paged
						) ); 

						if($blog_posts->have_posts()): while($blog_posts->have_posts()): $blog_posts->the_post(); 
							
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile; ?>

							<div class="pagination">
								<?php 
								$GLOBALS['wp_query']->max_num_pages = $blog_posts->max_num_pages;
								 the_posts_pagination(array(
									'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
									'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
									));  ?>
							</div>

						<?php else : 
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