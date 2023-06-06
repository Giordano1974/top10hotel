<?php   
//Importa tassonomie
require "src/Taxonomies.php";
new Taxonomies();

//remove gutemberg
require "src/Gutemberg.php";
new Gutemberg();

//ACF hook
require "src/ACF.php";
new ACF_HOOK();

//Theme hook
require "src/Theme.php";
new Theme();

//RestAPI
require "src/RestAPI.php";
new RestAPI();

//Ajax
require "src/Ajax.php";
new Ajax();

//Shortcode
require "src/Shortcode.php";
new Shortcode();

require "src/Helper.php";