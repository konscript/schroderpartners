<?php
/**
 * Main (main.php)
 * Put all your primary code logic here and use it in the templates. Branch out to other php-files if necessary.
 */

// http://codex.wordpress.org/Plugin_API/Action_Reference 
// add_action( 'action_hook_name','custom_function_name' );

// http://codex.wordpress.org/Plugin_API/Filter_Reference
// add_filter( 'filter_hook_name', 'custom_function_name' );

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'hybrid_theme_setup_theme' );

/**
 * Theme setup function.  This function adds support for theme features and defines the default theme
 * actions and filters.
 */
function hybrid_theme_setup_theme() {
	global $hybrid, $content_width;

	/* Get the theme prefix. */
	$prefix = hybrid_get_prefix();

	/* Add support for framework features. */
	add_theme_support( 'hybrid-core-menus', array( 'primary' ) );
	add_theme_support( 'hybrid-core-sidebars', array( 'primary' ) );
	add_theme_support( 'hybrid-core-widgets' );
	add_theme_support( 'hybrid-core-shortcodes' );
	add_theme_support( 'hybrid-core-post-meta-box' );
	add_theme_support( 'hybrid-core-theme-settings' );
	add_theme_support( 'hybrid-core-meta-box-footer' );
	add_theme_support( 'hybrid-core-drop-downs' );
	add_theme_support( 'hybrid-core-seo' );
	add_theme_support( 'hybrid-core-template-hierarchy' );
	add_theme_support( 'hybrid-core-deprecated' );

	/* Add support for framework extensions. */
	add_theme_support( 'breadcrumb-trail' );
	// add_theme_support( 'custom-field-series' );
	// add_theme_support( 'get-the-image' );
	// add_theme_support( 'post-stylesheets' );

	/* Add support for WordPress features. */
	add_theme_support( 'automatic-feed-links' );

	/* Register sidebars. */
	add_action( 'init', 'hybrid_theme_register_sidebars', 11 );

	/* Header actions. */
	add_action( "{$prefix}_header", 'site_title' );
	add_action( "{$prefix}_header", 'site_description' );

	/* Add the primary and secondary sidebars after the container. */
	add_action( "{$prefix}_sidebar_primary", 'sidebar_primary' );

	/* Add the breadcrumb trail and before content sidebar before the content. */
	add_action( "{$prefix}_breadcrumb", 'hybrid_breadcrumb' );

	/* Add the title, byline, and entry meta before and after the entry. */
	add_action( "{$prefix}_entry_header", 'hybrid_entry_title' );
	add_action( "{$prefix}_entry_header", 'hybrid_entry_byline' );
	add_action( "{$prefix}_entry_footer", 'hybrid_entry_meta' );

	/* Add the after content sidebar and navigation links after the content. */
	add_action( "{$prefix}_blog_footer", 'navigation_links' );

	/* Add the subsidiary sidebar and footer insert to the footer. */
	add_action( "{$prefix}_footer", 'footer_insert' );

	/* Add the comment avatar and comment meta before individual comments. */
	add_action( "{$prefix}_before_comment", 'hybrid_avatar' );
	add_action( "{$prefix}_before_comment", 'hybrid_comment_meta' );

	/* Add Hybrid theme-specific body classes. */
	add_filter( 'body_class', 'hybrid_theme_body_class' );
}

/**
 * Register additional sidebars that are not a part of the core framework and are exclusive to this
 * theme.
 */
function hybrid_theme_register_sidebars() {

	/* Register the 404 template sidebar. */
	register_sidebar(
		array(
			'id' => 'error-404-template',
			'name' => __( '404 Template', hybrid_get_textdomain() ),
			'description' => __( 'Replaces the default 404 error page content.', hybrid_get_textdomain() ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">',
			'after_widget' => '</div></div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
}

/**
 * Function for adding Hybrid theme <body> classes.
 */
function hybrid_theme_body_class( $classes ) {
	global $wp_query, $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome;

	/* Singular post classes (deprecated). */
	if ( is_singular() ) {

		if ( is_page() )
			$classes[] = "page-{$wp_query->post->ID}"; // Use singular-page-ID

		elseif ( is_singular( 'post' ) )
			$classes[] = "single-{$wp_query->post->ID}"; // Use singular-post-ID
	}

	/* Browser detection. */
	$browsers = array( 'gecko' => $is_gecko, 'opera' => $is_opera, 'lynx' => $is_lynx, 'ns4' => $is_NS4, 'safari' => $is_safari, 'chrome' => $is_chrome, 'msie' => $is_IE );
	foreach ( $browsers as $key => $value ) {
		if ( $value ) {
			$classes[] = $key;
			break;
		}
	}

	/* Hybrid theme widgets detection. */
	foreach ( array( 'primary', 'secondary', 'subsidiary' ) as $sidebar )
		$classes[] = ( is_active_sidebar( $sidebar ) ) ? "{$sidebar}-active" : "{$sidebar}-inactive";

	if ( in_array( 'primary-inactive', $classes ) && in_array( 'secondary-inactive', $classes ) && in_array( 'subsidiary-inactive', $classes ) )
		$classes[] = 'no-widgets';

	/* Return the array of classes. */
	return $classes;
}

/**
 * Displays the breadcrumb trail extension if it's supported.
 */
function hybrid_breadcrumb() {
	if ( current_theme_supports( 'breadcrumb-trail' ) )
		breadcrumb_trail( array( 'front_page' => false ) );
}

/**
 * Displays the post title.
 */
function hybrid_entry_title() {
	echo apply_atomic_shortcode( 'entry_title', '[entry-title]' );
}

/**
 * Default entry byline for posts.
 */
function hybrid_entry_byline() {

	$byline = '';

	if ( 'post' == get_post_type() && 'link_category' !== get_query_var( 'taxonomy' ) )
		$byline = '<p class="byline">' . __( 'By [entry-author] on [entry-published] [entry-edit-link before=" | "]', hybrid_get_textdomain() ) . '</p>';

	echo apply_atomic_shortcode( 'byline', $byline );
}

/**
 * Displays the default entry metadata.
 */
function hybrid_entry_meta() {

	$meta = '';

	if ( 'post' == get_post_type() )
		$meta = '<p class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms taxonomy="post_tag" before="| Tagged "] [entry-comments-link before="| "]', hybrid_get_textdomain() ) . '</p>';

	elseif ( is_page() && current_user_can( 'edit_page', get_the_ID() ) )
		$meta = '<p class="entry-meta">[entry-edit-link]</p>';

	echo apply_atomic_shortcode( 'entry_meta', $meta );
}

/**
 * Function for displaying a comment's metadata.
 */
function hybrid_comment_meta() {
	echo apply_atomic_shortcode( 'comment_meta', '<div class="comment-meta comment-meta-data">[comment-author] [comment-published] [comment-permalink before="| "] [comment-edit-link before="| "] [comment-reply-link before="| "]</div>' );
}

/**
 * Loads the loop-nav.php template with backwards compability for navigation-links.php.
 * @uses locate_template() Checks for template in child and parent theme.
 */
function navigation_links() {
	get_template_part( 'loop', 'nav' );
	//locate_template( array( 'navigation-links.php', 'loop-nav.php' ), true );
}

/**
 * Displays the footer insert from the theme settings page.
 */
function footer_insert() {
	$footer_insert = hybrid_get_setting( 'footer_insert' );

	if ( !empty( $footer_insert ) )
		echo '<div class="footer-insert">' . do_shortcode( $footer_insert ) . '</div>';
}

/**
 * Dynamic element to wrap the site title in.  If it is the front page, wrap it in an <h1> element.  On other 
 * pages, wrap it in a <div> element. 
 */
function site_title() {
	$tag = ( is_front_page() ) ? 'h1' : 'div';

	if ( $title = get_bloginfo( 'name' ) )
		$title = '<' . $tag . ' id="site-title"><a href="' . home_url() . '" title="' . esc_attr( $title ) . '" rel="home"><span>' . $title . '</span></a></' . $tag . '>';

	echo apply_atomic( 'site_title', $title );
}

/**
 * Dynamic element to wrap the site description in.  If it is the front page, wrap it in an <h2> element.  
 * On other pages, wrap it in a <div> element.
 */
function site_description() {
	$tag = ( is_front_page() ) ? 'h2' : 'div';

	if ( $desc = get_bloginfo( 'description' ) )
		$desc = "\n\t\t\t" . '<' . $tag . ' id="site-description"><span>' . $desc . '</span></' . $tag . '>' . "\n";

	echo apply_atomic( 'site_description', $desc );
}


?>