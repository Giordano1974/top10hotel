<?php
global $post;
$include = (get_field('tipo_pagina',$post->ID) == "tassonomia" ) ? '/page_taxonomy.php' : '/page_classic.php';
include(TEMPLATEPATH . $include);
