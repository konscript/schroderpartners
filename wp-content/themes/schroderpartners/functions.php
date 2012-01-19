<?php

/**
############################
# Enqueue relevant scripts #
############################
**/
if (is_admin()) {
  wp_enqueue_script('jquery-textarea-autoresize', get_stylesheet_directory_uri() . '/javascript/jquery.autoresize.js');
}

/**
#########################################################
# Include the necessary files for the theme to function #
#########################################################
**/
// include_once 'metaboxes/setup.php';
include_once 'dynamicmenus.php';
include_once 'metaboxes/setup.php';

/**
######################
# Add theme supports #
######################
**/
// Add support for theme thumbnails
add_theme_support('post-thumbnails');

// Add relevant image sizes
add_image_size('contact-module-big',    123, 158, false);
add_image_size('contact-module-thumb',  58, 70, true);
add_image_size('contact-thumbnail',     096, 128, true);

/**
##########################################
# Register the required navigation menus #
##########################################
**/
register_nav_menus(array(
  'top_menu'      => 'Top Menu',
  'footer_menu'   => 'Footer Menu',
  'profile_menu'  => 'Profil Menu',
  'news_menu'     => 'Nyheder Menu',
	'eng_link'			=> 'English Link',
	'english_menu'	=> 'English Menu'
));

/**
#####################
# Register sidebars #
#####################
**/
register_sidebar(array(
	'name'				  => 'Footer: Left',
	'id'            => 'footer-left',
	'before_widget'	=> '<div class="copyright">',
	'after_widget'	=> '</div>',
	'before_title'	=> '',
	'after´_title'	=> '',
));

register_sidebar(array(
	'name'				  => 'Footer: Right',
	'id'            => 'footer-right',
	'before_widget'	=> '<div class="info">',
	'after_widget'	=> '</div>',
	'before_title'	=> '',
	'after´_title'	=> '',
));


/**
##############################
# Register Custom Post Types #
##############################
**/
include_once 'post_types/post_type-sp_contact.php';

/**
#####################
# Create Meta Boxes #
#####################
**/
include_once 'metaboxes/contact-spec.php';
include_once 'metaboxes/contact-persons-spec.php';

/**
######################
# Relavant functions #
######################
**/

function get_attachment_id_from_src ($image_src) {
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	$id = $wpdb->get_var($query);
	return $id;
}

















?>