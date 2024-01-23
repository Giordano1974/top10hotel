<?php
  $post = $wp_query->post;

  if ( in_category('blocks') ) {
  include(TEMPLATEPATH . '/single_blocks.php');


  } else {
  include(TEMPLATEPATH . '/single_orig.php');

  }
?>