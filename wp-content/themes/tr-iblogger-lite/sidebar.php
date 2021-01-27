<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tr-iblogger-lite
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<div class="<?php tr_iblogger_lite_sidebar_layout(); ?> text-center" id="sidebar">
			<?php dynamic_sidebar('sidebar'); ?>
	</div><!-- /.end of col-md-4 -->
</aside><!-- #secondary -->
