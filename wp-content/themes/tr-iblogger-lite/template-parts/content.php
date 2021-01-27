<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tr-iblogger-lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="thumbnail text-center">
		<a href="<?php the_permalink(); ?>" class="new-dishes-img">
			<?php if(has_post_thumbnail()){
	    			the_post_thumbnail( 'blog-full-width' , array('class' => 'img-responsive') );
	    		} 
    		?>
		</a>
		<div class="caption">
			<div class="blog-text">
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				
				<div class="horizontal-line"></div><!-- /.end of first-horizontal-line -->

		        <div class="blog-list">
					<ul class="list-inline">
						<li><i class="fa fa-calendar"></i>  <?php echo get_the_date(get_option( 'date_format' )); ?></li>
					</ul><!-- /.end of list-inline -->
				</div><!-- /.end of blog-list -->

				<div class="horizontal-line"></div><!-- /.end of first-horizontal-line -->
				<?php the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tr-iblogger-lite' ),
						'after'  => '</div>',
					) ); 

				?>
			</div><!-- /.end of blog-text -->
		</div><!-- /.end of caption -->
	</div><!-- /.end of thumbnail -->
</article><!-- #post-<?php the_ID(); ?> -->
