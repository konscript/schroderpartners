<?php

// Add support for theme thumbnails
add_theme_support('post-thumbnails');

// Register the required navigation menus
register_nav_menus(array(
  'top_menu'      => 'Top Menu',
  'footer_menu'   => 'Footer Menu',
  'profile_menu'  => 'Profil Menu',
));

// Register sidebars
register_sidebar(array(
	'name'				=> 'Right Sidebar',
	'before_widget'		=> '',
	'after_widget'		=> '',
	'before_title'		=> '',
	'after´_title'		=> '',
));

?>