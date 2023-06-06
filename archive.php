<?php get_header(); 
$obj = get_queried_object();
if (is_tax() || is_tag()){
    $name = $obj->name;
    $count = $obj->count;
    $description = $obj->description; 
    $featuredimage = get_field('immagine', $obj->taxonomy . '_' . $obj->term_id);
}

?>
<?php $category_image = get_field('immagine'); ?>

<main id="site-content" class="main-content is-loaded">
    <header class="page-header alignfull has-header-archive has-default-background has-gradient-overlay has-background-image has-text-align-none has-no-gap">
        <?php if(is_tax()) { ?>
            <div class="header-background">
                <picture>
                    <source srcset="<?php echo $featuredimage['sizes']['mia_extra_large']?>" media="(min-width: 1535px)">
                    <source srcset="<?php echo $featuredimage['sizes']['mia_large']?>" media="(min-width: 1024px)">
                    <source srcset="<?php echo $featuredimage['sizes']['mia_medium']?>" media="(min-width: 600px)">
                    <img width="600" height="400" src="<?php echo $featuredimage['sizes']['mia_rect']?>" class="attachment-tripp-fullwidth size-tripp-fullwidth wp-post-image" alt="<?php echo get_the_title();?>" decoding="async" />
                </picture>
            </div>
       <?php } ?>
        <div class="tripp-container alignwide">
            <?php if(is_tax()) { ?>
                <div class="archive-image">
                    <img width="150" height="150" src="<?php echo $featuredimage['sizes']['mia_square_small'] ?>" class="attachment-thumbnail size-thumbnail" alt="<?php $name;?>" decoding="async" loading="lazy" >
                </div>
             <?php } ?>
            <div class="archive-details">
                <span class="page-overline"><?php echo $count;?> <?php echo _e('entries', 'top10hotel');?> in</span>
                <h1 class="page-title"><?php echo $name;?></h1>
                <div class="page-description">
                    <p><?php echo $description;?></p>
                </div>
            </div>
        </div>
    </header>
    <?php get_template_part( 'partials/archive'); ?>
    </main>

<?php get_footer(); ?>  