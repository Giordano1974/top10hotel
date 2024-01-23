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
                'search_items' => 'Cerca tra le destinazioni',
                'all_items' => 'Tutte le destinazioni',
                'edit_item' => 'Modifica le destinazioni',
                'update_item' => 'Aggiorna le destinazioni',
                'add_new_item' => 'Aggiungi destinazione',
                'new_item_name' => 'Nuova  destinazione',
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

        register_taxonomy("tipo-di-vacanza", ["post"], [
            'hierarchical' => true,
            'labels' => array(
                'name' => 'Tipo di vacanza',
                'singular_name' => 'Tipo di vacanza',
                'search_items' => 'Cerca tra i tipi di vacanza',
                'all_items' => 'Tutti i tipi di vacanza',
                'edit_item' => 'Modifica i tipi di vacanza',
                'update_item' => 'Aggiorna i tipi di vacanza',
                'add_new_item' => 'Aggiungi il tipo di vacanza',
                'new_item_name' => 'Nuovo  tipi di vacanza',
                'menu_name' => 'Tipo di vacanza',
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