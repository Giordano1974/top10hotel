<?php


/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); 
global $post;
$taxonomy = $post->post_name;
$list_terms = get_terms($taxonomy,["hide_empty" => true]);
?>
<main id="site-content" class="main-content is-loaded">
    <article class="page type-page entry">
        <header class="alignfull entry-header page-header single-entry-header">
            <div class="header-content">
                <div class="tripp-container">
                    <h1 class="entry-title"><?php echo _e($taxonomy, 'top10hotel');?></h1>
                </div>
            </div>
        </header>
        <div class="entry-content">

			    <?php 
                   if ( !empty($list_terms) ) :
                   ?>
                   <section class="flext-block-section flext-has-background flext-has-background-dim has-background-dim-100 alignfull">
                         <div class="flext-block-section-background"><span class="flext-block-section-overlay-background has-surface-background-color"></span></div>

                         <div class="flext-block-section-inner">
                            <div class="wp-block-group tripp-heading-block is-layout-constrained">
                               <p class="has-text-align-center tripp-heading-title has-small-font-size flext-has-animation flext-animation-fade-down flext-animation-delay-250 flext-animation-once"><?php echo _e('start_exploring', 'top10hotel');?></p>
                               
                               <div class="wp-block-group flext-has-animation flext-animation-fade-up flext-animation-once is-layout-constrained">
                                  <div class="wp-block-outermost-icon-block items-justified-center">
                                     <div class="icon-container has-icon-color has-melrose-color" style="color:#c0afff;width:48px">
                                        <svg width="31.7" height="4.8" viewBox="0 0 31.7 4.8">
                                           <path d="m25.5,4.8c-1.7,0-2.6-.9-3.3-1.5-.6-.6-.9-.8-1.6-.8s-1,.3-1.6.8c-.7.6-1.6,1.5-3.3,1.5s-2.6-.9-3.3-1.5c-.6-.6-.9-.8-1.6-.8s-1,.3-1.6.8c-.7.6-1.6,1.5-3.3,1.5s-2.4-.9-3.1-1.5c-.6-.6-.9-.9-1.6-.9S0,1.9,0,1.2.5,0,1.2,0c1.7,0,2.6.9,3.3,1.5.6.6.9.9,1.6.9s1-.3,1.6-.8c.7-.6,1.6-1.5,3.3-1.5s2.6.9,3.3,1.5c.5.5.8.8,1.5.8s1-.3,1.6-.8c.7-.6,1.6-1.5,3.3-1.5s2.6.9,3.3,1.5c.6.6.9.8,1.6.8s1-.3,1.6-.8c.7-.6,1.6-1.5,3.3-1.5.7,0,1.2.5,1.2,1.2s-.7,1.1-1.3,1.1c-.7,0-1,.3-1.6.8-.7.7-1.6,1.6-3.3,1.6Z"></path>
                                        </svg>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="flext-block-categories flext-categories is-style-carousel flext-carousel has-thumbnail alignwide wp-block-flextension-categories" data-slides-per-view="5" data-space-between="30" data-navigation="1" data-pagination="1">
                               <div class="flext-carousel-wrapper">
                                  <?php foreach( $list_terms as $term) : 
                                     $image = get_field('immagine', $taxonomy . '_' . $term->term_id);
                                     ?>
                                     <div class="category-item flext-slide has-thumbnail">
                                        <a href="<?php echo get_term_link($term->term_id);?>">
                                              <img width="360" height="360" src="<?php echo $image["sizes"]["mia_square"];?>" 
                                                 class="attachment-medium size-medium" alt="<?php echo $term->name;?>" 
                                                 decoding="async" loading="lazy" 
                                                 srcset="<?php echo $image["sizes"]["mia_square"];?> 360w, 
                                                 <?php echo $image["sizes"]["mia_square_large"];?> 720w" 
                                                 sizes="(max-width: 300px) 100vw, 360px" />
                                           <span><?php echo $term->name;?></span></a><span class="posts-count"><?php echo $term->count;?><span><?php echo _e('entries', 'top10hotel');?></span></span></div>
                                        <?php endforeach;?>
                               </div>
                         </div>
                        <?php endif;?>
                   </section>
	    </div><!-- #entry-content -->
    </article>
</main><!-- #main-content -->

<?php
get_footer();