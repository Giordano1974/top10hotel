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


// Disabilita il controllo di unicità degli slug per i post
function allow_duplicate_slugs($slug, $post_ID, $post_status, $post_type, $post_parent, $original_slug) {
    if (function_exists('pll_default_language')) {
        return $original_slug;
    }
    return $slug;
}
add_filter('wp_unique_post_slug', 'allow_duplicate_slugs', 10, 6);

// Disabilita il controllo di unicità degli slug per i termini
function allow_duplicate_term_slugs($slug, $term, $original_slug, $original_term, $args) {
    if (function_exists('pll_default_language')) {
        return $original_slug;
    }
    return $slug;
}
add_filter('wp_unique_term_slug', 'allow_duplicate_term_slugs', 10, 6);

// Disabilita il redirect canonico di Polylang
add_filter('pll_check_canonical_url', '__return_false');

// Flush delle regole di riscrittura
function custom_flush_rewrite_rules() {
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'custom_flush_rewrite_rules');

// Disabilita redirezioni canoniche di WordPress temporaneamente (solo per debug)
remove_filter('template_redirect', 'redirect_canonical');


