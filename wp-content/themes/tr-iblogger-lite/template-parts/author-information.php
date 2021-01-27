<?php
/**
 * Template part for displaying author information
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tr-iblogger-lite
 */

?>
<div class="author-information">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-4">
			<div class="author-content text-center">
				<?php echo get_avatar( get_the_author_meta( 'ID' )); ?>
				<h4><?php the_author(); ?></h4>
				<?php $email = get_the_author_meta( 'user_email');
					$email = sanitize_email($email); ?>
				<p class="text-center"><?php esc_html_e('E-mail : ' , 'tr-iblogger-lite') ?><a href="mailto:<?php echo antispambot($email,1); ?>"><?php echo antispambot($email); ?></a></p>


				<div class="author-list">
					<ul class="list-inline">
					<?php if(get_the_author_meta('facebook')): ?>
						<li>
							<a href="<?php echo esc_url( get_the_author_meta('facebook') ); ?>">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif; ?>
					<?php if(get_the_author_meta('twitter')): ?>
						<li>
							<a href="<?php echo esc_url( get_the_author_meta('twitter') ); ?>">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif; ?>
					<?php if(get_the_author_meta('google-plus')): ?>
						<li>
							<a href="<?php echo esc_url( get_the_author_meta('google-plus') ); ?>">
								<i class="fa fa-google-plus" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif; ?>	
					<?php if(get_the_author_meta('pinterest')): ?>
						<li>
							<a href="<?php echo esc_url( get_the_author_meta('pinterest') ); ?>">
								<i class="fa fa-pinterest-p" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif; ?>
					<?php if(get_the_author_meta('instagram')): ?>
						<li>
							<a href="<?php echo esc_url( get_the_author_meta('instagram') ); ?>">
								<i class="fa fa-instagram" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif; ?>
					<?php if(get_the_author_meta('user_url')): ?>
						<li>
							<a href="<?php echo esc_url( get_the_author_meta('user_url') ); ?>">
								<i class="fa fa-globe" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif; ?>
					</ul><!-- /.end of list-inline -->
				</div><!-- /.end of author-list -->
			</div><!-- /.end of author-content -->
		</div><!-- end of col-md-3 -->
		<div class="col-lg-9 col-md-9 col-sm-8">
			<div class="author-text">
				<p><?php the_author_meta( 'description' ); ?></p>
			</div><!-- /.end of author-text -->
		</div><!-- /.end of col-md-9 -->
	</div><!-- /.end of row -->
</div><!-- /.end of author -->