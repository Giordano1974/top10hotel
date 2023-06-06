<?php 

/**
 * Is the basic controller that aims to retrieve the 
 * custom taxonomy data
 */
class ACF_HOOK {

    function __construct() {
        add_action('init', [$this, 'init']); // Add custom taxonomies
      
	}
 
    public static function init()
    {
        if( function_exists('acf_add_options_page') ) {
    
            acf_add_options_page(array(
                'page_title'    => 'Gestione HOMEPAGE',
                'menu_title'    => 'Gestione HOMEPAGE',
                'menu_slug'     => 'home-general-settings',
                'capability'    => 'edit_posts',
                'redirect'      => false
            ));
            
    
            
        }
    }
    
}