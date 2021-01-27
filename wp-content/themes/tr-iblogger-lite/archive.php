<?php
/**
 * The template for displaying archive pages
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
						<?php if(have_posts()): ?>
							<header class="page-header">
								<?php
									if(is_author()){
										get_template_part( 'template-parts/author-information');
									}else{
									the_archive_title( '<h1 class="page-title">', '</h1>' );
									the_archive_description( '<div class="archive-description">', '</div>' );
								} ?>
							</header><!-- .page-header -->

						<?php  while(have_posts()): the_post(); 
							
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
