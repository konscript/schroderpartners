<?php
/**
 * Header Template (header.php)
 *
 * The header template is generally used on every page of your site. Nearly all other
 * templates call it somewhere near the top of the file. It is used mostly as an opening
 * wrapper, which is closed with the footer.php file. It also executes key functions needed
 * by the theme, child themes, and plugins. 
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
	
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<title><?php hybrid_document_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/stylesheet/compiled/main.css" type="text/css" media="all" />
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/javascript/main.js"></script>
	<?php wp_head(); // wp_head ?>
	
</head>
<body class="bp <?php hybrid_body_class(); ?>">

	<div id="body-wrapper">
		<div id="header-container">
			<div id="header">
				<?php do_atomic( 'header' ); // hybrid_header ?>
				<?php get_template_part( 'menu', 'primary' ); ?>
			</div><!-- #header -->
		</div><!-- #header-container -->

		<div id="content-container">