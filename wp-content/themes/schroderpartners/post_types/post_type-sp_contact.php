<?php

register_sp_contact();

function register_sp_contact() {
  $labels = array(
   'name'                => _x('Contacts', 'post type general name'),
   'singular_name'       => _x('Contact', 'post type singular name'),
   'add_new'             => _x('Add New', 'contact'),
   'add_new_item'        => __('Add New Contact'),
   'edit_item'           => __('Edit Contact'),
   'new_item'            => __('New Contact'),
   'view_item'           => __('View Contact'),
   'search_items'        => __('Search Contact'),
   'not_found'           => __('Nothing found'),
   'not_found_in_trash'  => __('Nothing found in Trash'),
   'parent_item_colon'   => ''
  );
  
  $args = array(
   'labels'              => $labels,
   'public'              => true,
   'publicly_queryable'  => true,
   'show_ui'             => true,
   'query_var'           => true,
   'menu_position'       => 5,
   //'menu_icon'           => get_stylesheet_directory_uri() . '/images/icon_event.gif',
   '_builtin'            => false,
   'rewrite'             => array('slug' => 'kontakter', 'with_front' => false),
   'capability_type'     => 'post',
   'hierarchical'        => false,
   'supports'            => array('title', 'thumbnail')
 );
 
 register_post_type('sp_contact', $args);
}

?>