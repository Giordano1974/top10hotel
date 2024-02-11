<?php 

/**
 * Is the basic controller that aims to retrieve the 
 * custom taxonomy data
 */
class Helper {

    static function custom_numbered_pagination() {
        global $wp_query;
    
        $total_pages = $wp_query->max_num_pages;
        $current_page = max(1, get_query_var('paged'));
    
        if ($total_pages > 1) {
            echo '<nav class="navigation pagination numbered-pagination">';
            echo '<div class="nav-links">';
    
            // Pulsante "Precedente"
            if ($current_page > 1) {
                echo '<a class="prev page-numbers ajax-page" href="' . get_pagenum_link($current_page - 1) . '">';
                echo '<i class="tripp-ico-left"></i>';
                echo '<span>' . _e("left_btn_pagination", "top10hotel") . '</span>';
                echo '</a>';
            }
    
            // Numeri di pagina
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $current_page) {
                    echo '<span aria-current="page" class="page-numbers current">' . $i . '</span>';
                } else {
                    echo '<a class="page-numbers ajax-page" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
                }
            }
    
            // Pulsante "Successivo"
            if ($current_page < $total_pages) {
                echo '<a class="next page-numbers ajax-page" href="' . get_pagenum_link($current_page + 1) . '">';
                echo '<span>' . _e("right_btn_pagination", "top10hotel") .'</span>';
                echo '<i class="tripp-ico-right"></i>';
                echo '</a>';
            }
    
            echo '</div>';
            echo '</nav>';
        }
    }
}

?>