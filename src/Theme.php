<?php 

/**
 * Is the basic controller that aims to retrieve the 
 * custom taxonomy data
 */
class Theme {

    function __construct() {
        add_action('init', [$this, 'init']); // Add custom taxonomies
        add_action('after_setup_theme',  [$this, 'wpdocs_theme_setup'] );
        add_action( 'wp', array( &$this, 'initCacheSettings' ) , 999999);
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
        add_image_size('mia_article_mobile', 480);

        add_image_size('mia_square_large', 720, 720, true);
        add_image_size('mia_square_small', 150, 150, true);
        add_image_size('mia_square', 360, 360, true);
       
        //* Add new image sizes to post or page editor
        //add_filter( 'image_size_names_choose', [$this, 'mytheme_image_sizes'] );

        //add_action('wp_head', [$this, 'add_link_tag_to_home']);
        add_action('wp_enqueue_scripts', [$this, 'my_custom_script']);
        
    }    

    public function initCacheSettings(){

		$seconds_to_cache = $this->getCacheSeconds();
		
        if ($seconds_to_cache == 0) {

            header("Cache-Control: no-cache, must-revalidate");
            header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

        } else {

            $ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
            header("Expires: $ts");
            header("Pragma: no-cache");
            header("Cache-Control: max-age=".$seconds_to_cache.", public");
        }
	}

    private function getCacheSeconds() {

        // SE SONO IN ADMIN O LOGGATO
        if( is_user_logged_in() || is_admin() ) return 0;

        /// Esce se non si trovano i dati della chiamata
        if( !isset( $_SERVER["HTTP_HOST"] ) || !isset( $_SERVER["REQUEST_URI"] ) ) return 0;

        return 3600*24;
    }

    // Hook per la pagina principale
    public function add_link_tag_to_home() {
        $url = "";
        if (is_home() || is_archive()){
            $lang = (pll_current_language("slug") == "it") ? "en-us" : "it";
            $currentURL = $_SERVER['REQUEST_URI'];
            $url = (pll_current_language("slug") == "it") ? str_replace("top10hotel.it/", "top10hotel.it/en/",$currentURL) : str_replace("top10hotel.it/en/", "top10hotel.it/",$currentURL);
        }
        if (is_single()){
            global $post;
            $lang = (pll_current_language("slug") == "it") ? "en-us" : "it";
            $lang_post_id = (pll_current_language("slug") == "it") ? pll_get_post($post->ID, 'en') :pll_get_post($post->ID, 'it');
            $url = get_permalink($lang_post_id);
        }
        if (!empty($url)){
            ?>
            <link rel="alternate" href="<?php echo $url;?>" hreflang="<?php echo $lang?>" />
            <!-- Aggiungi altri link per altre lingue se necessario -->
            <?php
        }
    }

    // Hook per l'archivio
    public function add_link_tag_to_archive() {
        global $post;
        $lang = (pll_current_language("slug") == "it") ? "en-us" : "it";
        $english_post_id = pll_get_post($post->ID, 'en'); 
        $url = get_permalink($english_post_id);
        ?>
        <link rel="alternate" href="<?php echo $url;?>" hreflang="<?php echo $lang?>" />
        <!-- Aggiungi altri link per altre lingue se necessario -->
        <?php
    }

    /**
     * Load translations for wpdocs_theme
     */
    public function wpdocs_theme_setup(){
        load_theme_textdomain('wpdocs_theme', get_template_directory() . '/');
    }

    function my_custom_script() {
        // Registra lo script
        //wp_register_script('my-script', get_template_directory_uri() . '/js/custom.js', array(), null, true);

        wp_register_script( 
            'my-script', 
            get_template_directory_uri() . '/js/custom.js', 
            array(), 
            '1.0.0', 
            array(
                'in_footer' => true,
                'strategy'  => 'async',
            )
            );
    
        // Enqueue lo script
        wp_enqueue_script('my-script');
    }
}

?>