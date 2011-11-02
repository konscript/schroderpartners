<?php
/**
 * Index Template
 *
 * This template should not be shown.  It is a placeholder. Specific templates for each type 
 * of content are available.
 */

get_header(); // Loads the header.php template. ?>

	<div id="content" class="hfeed content">

		<?php do_atomic( 'breadcrumb' ); // breadcrumb trail ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

				<?php do_atomic( 'entry_header' ); ?>

				<div class="entry-content">
					<?php the_content( sprintf( __( 'Continue reading %1$s', hybrid_get_textdomain() ), the_title( ' "', '"', false ) ) ); ?>
					<?php wp_link_pages( array( 'before' => '<p class="page-links pages">' . __( 'Pages:', hybrid_get_textdomain() ), 'after' => '</p>' ) ); ?>
				</div><!-- .entry-content -->

				<?php do_atomic( 'entry_footer' ); ?>

			</div><!-- .hentry -->

			<?php if ( is_singular() ) { ?>

				<?php comments_template( '/comments.php', true ); // Loads the comments.php template ?>

			<?php } ?>

			<?php endwhile; ?>

		<?php else: ?>

			<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

		<?php endif; ?>

		<?php get_template_part( 'loop-nav' ); ?>

	</div><!-- .content .hfeed -->

<?php get_footer(); // Loads the footer.php template. ?>