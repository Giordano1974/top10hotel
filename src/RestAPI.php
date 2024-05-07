<?php 

/**
 * Is the basic controller that aims to retrieve the 
 * custom taxonomy data
 */
class RestAPI {

    function __construct() {
        add_action( 'rest_api_init',  [$this, 'rest_api_function'] );
	}
 
    
    function rest_api_function() {
     
        register_rest_route('tripp-xt/v1', '/mega-menu', array(
            'methods' => 'GET',
            'callback' => [$this, 'mega_menu_func'],
        ));
    } 

    function mega_menu_func( $request ) {

        $taxonomy = $request->get_param( 'taxonomy' );
        $term_id = $request->get_param( 'term' );
        $columns = -1; //$request->get_param( 'columns' );

        $query_args = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => $columns,
            'paged' => 1,
            'tax_query' => [[
                'taxonomy' => $taxonomy,
                'field'    => 'term_id',
                'terms'    => $term_id,
            ]],
        ];

        $query = new WP_Query( $query_args );

        $articles = '';


        while ( $query->have_posts() ) {
            $query->the_post();
            $time = get_field('tempo_lettura');
            $time_label = !empty($time) ? '<span class="entry-time">'. $time .' min</span>' : '';
            $previewImage = get_the_post_thumbnail_url( get_the_ID())? get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) : wp_get_attachment_image_src( '424', 'post-thumbnail' );
            $article = '<article class="mega-menu-post restApi post-' . get_the_ID() . ' post type-post status-publish format-standard has-post-thumbnail hentry category-' . $taxonomy . ' entry">';
            $article .= '<div class="entry-media"><div class="post-thumbnail"><a href="' . get_permalink() . '" aria-hidden="true"><img width="360" height="360" src="' . $previewImage . '" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" decoding="async" loading="lazy" /></a></div></div>';
            $article .= '<header class="entry-header">';
            $article .= '<h3 class="entry-title"><a href="' . get_permalink() . '" title="' . get_the_title() . '" rel="bookmark">' . get_the_title() . '</a></h3>';
            $article .= $time_label;
            $article .= '</header>';
            $article .= '</article>';
            $articles .= $article;
        }

        wp_reset_postdata();

        $output = [
            'rendered' => $articles,
        ];

        return rest_ensure_response($output);
      
    }

    
}

?>