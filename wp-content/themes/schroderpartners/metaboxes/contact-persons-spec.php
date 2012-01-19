<?php

$contact_persons_mb = new WPAlchemy_MetaBox(array(
  'id'                => '_cps_meta',
  'title'             => 'Contact Persons',
  //'types'             => array('page'),
  'include_template'  => array('contact-persons.php', 'contact-persons-english.php'),
  'context'           => 'side',
  'priority'          => 'low',
  'template'          => get_stylesheet_directory() . '/metaboxes/contact-persons-meta.php'
));


/* eof */
