<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tr-iblogger-lite
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



	<!-- ========== start of head section ========== -->
	<header id="head">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-4">
					<div class="logo">
						<?php the_custom_logo(); ?>
						<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
						endif; ?>
					</div><!-- /.end of logo -->
				</div><!-- /.end of col-md-3 -->
				<div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-8">
	
				</div><!-- /.end of col-md-8 -->
			</div><!-- /.end of row -->
		</div><!-- /.end of container -->
	</header><!-- /#end of head section -->

	<!-- ========== start of menu section ========== -->
	<div id="menu">
		<div class="menu-area">
			<nav class="navbar navbar-default">
			  	<div class="container">
				    <div class="navbar-header">
				      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        	<span class="sr-only"></span>
				        	<span class="icon-bar"></span>
				        	<span class="icon-bar"></span>
				        	<span class="icon-bar"></span>
				      	</button>
				    </div><!-- /.end of navbar-header -->
			        	<?php 
			        		wp_nav_menu( array(
				                // 'menu'              => 'primarymenu',
				                'theme_location'    => 'primarymenu',
				                //'depth'             => 2,
				                'container'         => 'div',
				                'container_class'   => 'collapse navbar-collapse',
				                'container_id'      => 'bs-example-navbar-collapse-1',
				                'menu_class'        => 'nav navbar-nav',
				                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				                'walker'            => new WP_Bootstrap_Navwalker())
				            );

			        	 ?>
			    	</div><!-- /.end of row -->
			  	</div><!-- /.end container -->
			</nav><!-- /.end of navbar navbar-default -->
		</div><!-- /.end of menu-area -->
	</div><!-- /#end of menu section -->
