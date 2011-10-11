<?php get_header(); ?>

<div id="contentwide">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


	<?
		$homepage = "/";
		$currentpage = $_SERVER['REQUEST_URI'];
		if($homepage==$currentpage) {
		echo "<div id=\"subpages\" style=\"min-height:550px; border:none; margin-right:8px;\">" ;
			include "homepagenav.php" ;
		echo "</div>";
		}
		else {
			list_subpages_andreas01() ;
		}
	?>

	<?php //list_subpages_andreas01(); ?> <?php // This generates the subpage menu. If you don't want to use it, delete this line. ?>

	<div class="post">
		<h2><?php the_title(); ?></h2>
		<?php the_content('<p class="serif">Read more &raquo;</p>'); ?>
		<?php // link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
		<?php // edit_post_link('Edit this page','<p>','</p>'); ?>

		<?php endwhile; endif; ?>
	</div>

</div>

<?php get_footer(); ?>