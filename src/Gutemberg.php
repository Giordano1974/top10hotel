<?php 

/**
 * Is the basic controller that aims to retrieve the 
 * custom taxonomy data
 */
class Gutemberg {

    function __construct() {
        add_action('init', [$this, 'init']); // Add custom taxonomies
      
	}
 
    public static function init()
    {
        add_action( 'wp_enqueue_scripts', [ get_called_class(), "remove_block_css"] , 100 );
        
        //disabled  gutemberg editor
        add_filter('use_block_editor_for_post', '__return_false', 5);
    }

    public static function remove_block_css() {
        wp_dequeue_style( 'wp-block-library' ); // Wordpress core
        wp_dequeue_style( 'wp-block-library-theme' ); // Wordpress core
    }
    
  
}

?>