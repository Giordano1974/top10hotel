<?php 

/**
 * Is the basic controller that aims to retrieve the 
 * custom taxonomy data
 */
class Taxonomies {

    function __construct() {
       add_action('init', [$this, 'register_tax']); // Add custom taxonomies
      
	}
 
    
    public function register_tax()
    {
       
        register_taxonomy("paesaggi", ["post"], [
            'hierarchical' => true,
            'labels' => array(
                'name' => 'paesaggi',
                'singular_name' => 'paesaggi',
                'search_items' => 'Cerca tra i paesaggi',
                'all_items' => 'Tutti i paesaggi',
                'edit_item' => 'Modifica i paesaggi',
                'update_item' => 'Aggiorna i paesaggi',
                'add_new_item' => 'Aggiungi il paesaggio',
                'new_item_name' => 'Nuovo  paesaggio',
                'menu_name' => 'Paesaggi',
            ),
            'show_ui' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'capabilities' => array(
                'manage_terms' => 'manage_categories',
                'edit_terms' => 'manage_categories',
                'delete_terms' => 'manage_categories',
                'assign_terms' => 'edit_posts',
            ),
        ]);


   
        register_taxonomy("destinazioni", ["post"], [
            'hierarchical' => true,
            'labels' => array(
                'name' => 'destinazioni',
                'singular_name' => 'destinazioni',
                'search_items' => 'Cerca tra i destinazioni',
                'all_items' => 'Tutti i destinazioni',
                'edit_item' => 'Modifica i destinazione',
                'update_item' => 'Aggiorna i destinazione',
                'add_new_item' => 'Aggiungi il destinazione',
                'new_item_name' => 'Nuovo  destinazione',
                'menu_name' => 'Destinazioni',
            ),
            'show_ui' => true,
            'show_in_rest' => true,
            'query_var' => true,
            'capabilities' => array(
                'manage_terms' => 'manage_categories',
                'edit_terms' => 'manage_categories',
                'delete_terms' => 'manage_categories',
                'assign_terms' => 'edit_posts',
            ),
        ]);
        
    }

}


?>