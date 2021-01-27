<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					<div class="blog-content">
					<?php while(have_posts()): the_post(); 

					get_template_part( 'template-parts/content', get_post_type() );
						
					 endwhile;

					 get_template_part('template-parts/author-information');  ?>
						
						<?php 
						 	if ( comments_open() || get_comments_number() ) :
						        comments_template();
						    endif;
						?>
					</div><!-- /.end of blog-content -->
				</div><!-- /.end of col-md-8 -->
				<?php  get_sidebar(); ?>
			</div><!-- /.end of row -->
		</div><!-- /.end of blog-area -->
	</div><!-- /.end of container -->
</section><!-- /#end of blog section -->
<?php
get_footer();
