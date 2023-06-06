<?php 

/**
 * Is the basic controller that aims to retrieve the 
 * custom taxonomy data
 */
class Theme {

    function __construct() {
        add_action('init', [$this, 'init']); // Add custom taxonomies
        add_action('after_setup_theme',  [$this, 'wpdocs_theme_setup'] );
   }
 
    public function init()
    {
        //Enable theme support for menu
        add_theme_support( 'menus' );
        //Enable theme support for featured images
        add_theme_support('post-thumbnails');

        add_image_size('mia_extra_large', 1920, 1280, true);
        add_image_size('mia_large', 1536, 683, true);
        add_image_size('mia_medium', 1024, 683, true);
        add_image_size('mia_rect', 600, 400, true); 
        add_image_size('mia_vert', 480, 640, true); 
 
        add_image_size('mia_article', 780);

        add_image_size('mia_square_large', 720, 720, true);
        add_image_size('mia_square_small', 150, 150, true);
        add_image_size('mia_square', 360, 360, true);
       
      

        
    }    
  
 
    /**
     * Load translations for wpdocs_theme
     */
    public function wpdocs_theme_setup(){
        load_theme_textdomain('wpdocs_theme', get_template_directory() . '/');
    }
}

?>