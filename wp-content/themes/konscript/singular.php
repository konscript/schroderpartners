<?php
/**
 * Singular Template (singular.php)
 *
 * WordPress currently supports custom post types displayed on the singular post level. This template
 * is a catchall template for the singular views of these posts. It should only be used as a backup or if
 * your custom post type doesn't require a custom structure. The template hierarchy for singular views
 * of post types is like so: $post_type-$template.php, $post_type-$slug.php, $post_type-$id.php,
 * $post_type.php, and singular.php.
 */

get_header(); ?>
	<div id="content" class="hfeed content">
		<?php do_atomic( 'breadcrumb' ); // breadcrumb trail ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
				<?php do_atomic( 'entry_header' ); ?>
				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<p class="page-links pages">' . __( 'Pages:', hybrid_get_textdomain() ), 'after' => '</p>' ) ); ?>
				</div><!-- .entry-content -->
				<?php do_atomic( 'entry_footer' ); ?>
			</div>

		<?php endwhile; ?>
		<?php else : ?>

			<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

		<?php endif; ?>

		<?php get_template_part( 'loop-nav' ); ?>
	</div><!-- .content .hfeed -->
<?php get_footer(); // Loads the footer.php template. ?>