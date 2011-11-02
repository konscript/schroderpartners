<?php
/**
 * 404 Template (404.php)
 *
 * The 404 template is used when a reader visits an invalid URL on your site. By default,
 * the template will display a generic message. However, if the '404 Template' widget area
 * is active, its widgets will be displayed instead. This allows users to customize their error
 * pages in any way they want.
 *
 * @link http://codex.wordpress.org/Creating_an_Error_404_Page
 */

@header( 'HTTP/1.1 404 Not found', true, 404 );

get_header(); ?>

	<div id="content" class="hfeed content">

		<?php if ( is_active_sidebar( 'error-404-template' ) ) : ?>

			<div id="utility-404" class="sidebar utility">
				<?php dynamic_sidebar( 'error-404-template' ); ?>
			</div><!-- #utility-404 .utility -->

		<?php else: ?>

			<div id="post-0" class="<?php hybrid_entry_class(); ?>">
				<h1 class="error-404-title entry-title"><?php _e( 'Not Found', hybrid_get_textdomain() ); ?></h1>
				<div class="entry-content">
					<p>You tried going to <?php echo home_url( esc_url( $_SERVER['REQUEST_URI'] ) ); ?>, and it doesn't exist. All is not lost! You can search for what you're looking for.</p>
					<?php get_search_form(); // Loads the searchform.php template. ?>
				</div><!-- .entry-content -->
			</div><!-- .hentry -->

		<?php endif; ?>

	</div><!-- .content .hfeed -->

<?php get_footer(); ?>