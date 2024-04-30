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


function defer_parsing_of_js( $url ) {
    if ( is_user_logged_in() ) return $url; //don't break WP Admin
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.min.js' ) ) return $url;
    return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );