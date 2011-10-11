<?php

$contact_info_mb = new WPAlchemy_MetaBox(array(
  'id'        => '_contact_meta',
  'title'     => 'Contact Info',
  'types'     => array('sp_contact'),
  'context'   => 'normal',
  'priority'  => 'high',
  'template'  => get_stylesheet_directory() . '/metaboxes/contact-information-meta.php'
));

$career_mb = new WPAlchemy_MetaBox(array(
  'id'        => '_career_meta',
  'title'     => 'Career Info',
  'types'     => array('sp_contact'),
  'context'   => 'normal',
  'priority'  => 'high',
  'template'  => get_stylesheet_directory() . '/metaboxes/contact-career-meta.php'
));

$general_mb = new WPAlchemy_MetaBox(array(
  'id'        => '_general_meta',
  'title'     => 'General Info',
  'types'     => array('sp_contact'),
  'context'   => 'normal',
  'priority'  => 'high',
  'template'  => get_stylesheet_directory() . '/metaboxes/contact-general-meta.php'
));

/* eof */



