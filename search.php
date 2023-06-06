<?php get_header(); 
if (isset($_GET["s"])){
    $name = $_GET["s"];
}else{
    $name = basename($_SERVER['REQUEST_URI']);
}
global $wp_query;
?>
<main id="site-content" class="main-content is-loaded">
    <header class="page-header alignfull has-header-archive has-default-background has-gradient-overlay has-background-image has-text-align-none has-no-gap">
        
        <div class="tripp-container alignwide">
        
            <div class="archive-details">
                <h1 class="page-title"><?php echo _e('stai_cercando', 'top10hotel')?>: <?php echo $name;?></h1>
                <span class="page-description"><?php echo _e('we_found', 'top10hotel')?> <?php echo $wp_query->post_count; ?> <?php echo _e('result_for_search', 'top10hotel')?></span>
            </div>
            
        </div>
    </header>
    <div class="main-posts tripp-posts posts-type-any posts-layout-search">
        <div class="posts-filters">
            <form method="get" class="search-form" action="<?php echo  pll_home_url();?>">
            <input type="search" name="s" placeholder="<?php echo _e('search', 'top10hotel')?> …" value="<?php echo $name;?>" class="keyword">
            <button type="submit" aria-label="<?php echo _e('search', 'top10hotel')?>">
            <?php echo _e('search', 'top10hotel')?> </button>
            </form>
        </div>
    </div>
    <?php get_template_part( 'partials/archive'); ?>
    </main>

<?php get_footer(); ?>  