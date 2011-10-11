<?php 

/*
Plugin Name: Dynamic Page Menus
Plugin URI: http://github.com/ksmandersen/Dynamic-Wordpress-Menus/
Description: Set the page menu for a nav location dynamically from the admin interface
Version: 1.0
Author URI: http://github.com/ksmandersen/
*/

// Require the Meta Box Script Class by RILWIS
// http://www.deluxeblogtips.com/meta-box-script-for-wordpress/
require_once 'meta-box.php';

/**
 * Get the available menu's registed in Wordpress Menu interface
 *
 * @return (array) Menu objects
 * @author Kristian Andersen
 **/
function get_all_menus(){
    $r = array(0 => "");
    $menus = wp_get_nav_menus();
		if(is_array($menus) && count($menus) > 0) {
			foreach($menus as $key => $menu) {
				$o = wp_get_nav_menu_object($menu->term_id);
				$r[$menu->term_id] = $o->name;
			}
		}
    return $r;
}

/**
 * Finds and returns the id for a menu defined for a page id.
 * By default the function search parents if no menu is set fo
 * the given page id.
 *
 * @return (int) id
 * @author Kristian Andersen
 **/
function get_menu_for_page($post_id, $search_parents=true) {
	// Return if not given a valid page id.
	if($post_id <= 0)
		return;

	// Get the post for the page id
	$post = get_post($post_id);
	if($post == null) // Return if post is invalid
		return;

	// Get the menu set for the current page
	$menu_id = get_post_meta($post->ID, 'dpm_page-menu-id', true);

	// If no menu is set for the current page then go over all parents until a menu
	// is found or there are no more parents.
	if($menu_id <= 0 && $search_parents) {
		do {
			$post = get_post($post->post_parent); // Get post for parent page
			if($post == null)
				return;

			$menu_id = get_post_meta($post->ID, 'dpm_page-menu-id', true);

		} while($menu_id <= 0 && $post->post_parent > 0);
	}

	return $menu_id;
}


// Register meta box for page

/**
 * Registers meta boxes on pages for setting the menu.
 *
 * @return void
 * @author Kristian Andersen
 **/
function page_meta() {
	$meta_box = array(
		'id'			=> 'dpm_page-menu',
		'title'		=> 'Page Menu',
		'pages'		=> array('page'),
		'context'	=> 'normal',
		'fields'	=> array(
			array(
				'name'		=> 'Menu',
				'id'			=> 'dpm_page-menu-id',
				'type'		=> 'select',
				'options'	=> get_all_menus()
			)
		)
	);

  new RW_Meta_Box($meta_box);
}

// If currently displaying admin interface then register the meta box
// TODO: Only display when creating / editing a page.	
if(is_admin())
	page_meta();


?>