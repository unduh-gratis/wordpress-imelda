<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package tr-iblogger-lite
 */

get_header();

tr_iblogger_lite_breadcrumb(); //for show breadcrumb
?>
	<section id="primary" class="content-area">
		<div id="main" class="container">
			<div class="row">
				<div class="<?php tr_iblogger_lite_content_layout(); ?>">
					<?php
					if ( have_posts() ) : ?>
						<header class="page-header">
							<h1 class="page-title"><?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'tr-iblogger-lite' ), '<span>' . get_search_query() . '</span>' );
							?></h1>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						tr_iblogger_lite_pagination(); 

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				</div><!-- .col-md-8 -->
				<?php get_sidebar(); ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- #primary -->

<?php
get_footer();
