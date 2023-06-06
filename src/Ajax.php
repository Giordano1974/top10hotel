<?php 

/**
 * Is the basic controller that aims to retrieve the 
 * custom taxonomy data
 */
class Ajax {

    function __construct() {
        add_action('wp_ajax_flextension_live_search', [$this, 'handle_ajax_request']);
        add_action('wp_ajax_nopriv_flextension_live_search', [$this, 'handle_ajax_request']);

	}
 
    function handle_ajax_request() {
        // Verifica il nonce (opzionale)
        $ajax_nonce = 'a20fa14c75';
        if ( $_GET['ajaxNonce'] !=  $ajax_nonce ) { //!wp_verify_nonce($_GET['ajaxNonce'], $ajax_nonce)
            wp_send_json_error('Invalid nonce.');
        }
    
        // Effettua la ricerca dei risultati
        $keyword = $_GET['keyword'];
        $query_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'paged' => 1,
            's' => $keyword
        );
        $query = new WP_Query($query_args);
    
        // Riduci l'array $article dai risultati della query
        $articles = array();
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $article = array(
                    'ID' => get_the_ID(),
                    'title' => get_the_title(),
                    'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'),
                    'post_link' => get_permalink(),
                    'author' => get_the_author(),
                    'date' => get_the_date('F j, Y')
                );
                $articles[] = $article;
            }
        }
    
        // Ripristina l'ambiente dei post di WordPress
        wp_reset_postdata();
    
        // Costruisci l'array dei risultati
        $results = array(
            'results' => array(
                array(
                    'title' => 'Posts',
                    'name' => 'post',
                    'items' => $articles
                )
            ),
            'moreLink' => '<a href="https://tripptheme.com/tripp2/search/ultima/">See more results for "ultima"</a>'
        );
    
        // Invia la risposta JSON
        wp_send_json($results);
    }
    
}

?>