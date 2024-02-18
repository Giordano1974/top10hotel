<?php get_header(); 
$paged = (get_query_var('paged') !== null && get_query_var('paged') !== 0) ? get_query_var('paged') : 1;
global $wp_query;
if ($paged != 1) :
?>

<main id="site-content" class="main-content is-loaded">
    <header class="page-header alignfull has-header-archive has-default-background has-gradient-overlay has-background-image has-text-align-none has-no-gap">
        <div class="tripp-container alignwide">
            <div class="archive-details">
                <h1 class="page-title"><?php echo _e('pagina', 'top10hotel');?> <?php echo $paged;?></h1><span><?php echo _e('of', 'top10hotel');?> <?php echo $wp_query->max_num_pages?></span>
            </div>
        </div>
    </header>
    <?php get_template_part( 'partials/archive'); ?>
    </main>

<?php
else :
  
?>
         <main id="site-content" class="main-content">
            <article class="page type-page entry">
               <div class="entry-content"> 
                  
                  <section class="flext-block-section flext-has-background alignfull">
                     <div class="flext-block-section-background">
                        <img decoding="async" loading="lazy" width="1920" height="1080" alt="immagine di background" role="presentation" src="/wp-content/uploads/2023/03/home-bg-1.png" style="object-position:48% -10%" 
                           srcset="/wp-content/themes/top10hotel/images/home-bg-1.png 1920w, 
                                    /wp-content/themes/top10hotel/images/home-bg-1-300x169.png 300w, 
                                    /wp-content/themes/top10hotel/images/home-bg-1-1024x576.png 1024w, 
                                    /wp-content/themes/top10hotel/images/home-bg-1-768x432.png 768w, 
                                    /wp-content/themes/top10hotel/images/home-bg-1-1536x864.png 1536w"
                           sizes="(max-width: 1920px) 100vw, 1920px">
                     </div>

                     <?php 
                        $taxonomies_index = [ "ajax", "tipo-di-vacanza", "destinazioni", "budget"];
                        $lang_slug = (pll_current_language("slug") == "it") ? "" : "/en";
                     ?>

                     <div class="flext-block-section-inner">
                        <div style="height: 100px"></div>

                        <div class="flext-block-categories flext-categories is-style-carousel flext-carousel has-thumbnail alignwide wp-block-flextension-categories" data-slides-per-view="5" data-space-between="30" data-navigation="1" data-pagination="1">
                           <div class="flext-carousel-wrapper">
                              <?php 
                              foreach( $taxonomies_index as $key) : 

                                 if ($key == "ajax") :
                                    $image = "https://www.top10hotel.it/wp-content/uploads/2024/02/shutterstock_1225191766-360x360.jpg";
                                    $image_large = "https://www.top10hotel.it/wp-content/uploads/2024/02/shutterstock_1225191766-720x720.jpg";
                                    ?>
                                    <div class="category-item flext-slide has-thumbnail slide-ispirami">
                                       
                                          <img width="360" height="360" src="<?php echo $image;?>" 
                                          class="attachment-medium size-medium" alt="<?php echo _e($key, 'top10hotel');?>" 
                                          decoding="async" loading="lazy"  
                                          srcset="<?php echo $image;?> 360w, 
                                          <?php echo $image_large;?> 720w" 
                                          sizes="(max-width: 300px) 100vw, 360px" />       
                           
                                          <button class="ispirami has-text-color wp-block-button__link" data-language="<?php echo pll_current_language("slug");?>"><?php echo _e('suggest', 'top10hotel');?></button>
                                    </div>
                                 <?php
                                 else :
                                 
                                    $url = $lang_slug."/".$key."/";
                                    $terms_count = count(get_terms(['taxonomy'   => $key,'hide_empty' => true]));
                                    $post = get_page_by_path($key);
                                    $image = (get_the_post_thumbnail_url($post->ID,"mia_square")) ? get_the_post_thumbnail_url($post->ID,"mia_square") : "https://www.top10hotel.it/wp-content/uploads/2023/05/social-top10hotel-360x360.png";
                                    $image_large = (get_the_post_thumbnail_url($post->ID,"mia_square_large")) ? get_the_post_thumbnail_url($post->ID,"mia_square_large") : "https://www.top10hotel.it/wp-content/uploads/2023/05/social-top10hotel-720x720.png";
                                    ?>
                                       <div class="category-item flext-slide has-thumbnail">
                                          <a href="<?php echo $url;?>">
                                                   <img width="360" height="360" src="<?php echo $image;?>" 
                                                   class="attachment-medium size-medium" alt="<?php echo _e($key, 'top10hotel');?>" 
                                                   decoding="async" loading="lazy"  
                                                   srcset="<?php echo $image;?> 360w, 
                                                   <?php echo $image_large;?> 720w" 
                                                   sizes="(max-width: 300px) 100vw, 360px" />       
                                    
                                             <span><?php echo _e($key, 'top10hotel');?></span>
                                          </a>
                                          <span class="posts-count"><?php echo $terms_count;?>
                                             <span><?php echo _e('categories', 'top10hotel');?></span>
                                          </span>
                                       </div>
                                    <?php
                                 endif;   
                                 endforeach;?>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="flext-block-section flext-has-background alignfull">
                     <div class="flext-block-section-inner">
                        <div id="the-latest-inspiring-stories" class="wp-block-group tripp-heading-block is-layout-constrained">
                           <p class="has-text-align-center tripp-heading-title has-small-font-size flext-has-animation flext-animation-fade-down flext-animation-delay-250 flext-animation-once"><?php echo _e('section_title_occhiello', 'top10hotel');?></p>
                           <h2 class="wp-block-heading has-text-align-center tripp-heading-headline flext-has-animation flext-animation-fly-in flext-animation-delay-125 flext-animation-once"><?php echo _e('section_title', 'top10hotel');?></h2>
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


                        <!-- MAIN ENTRIES -->

                        <div id="tripp-xt-block-757f2e14-1502-4d44-b6fa-da9c83b0481d" class="tripp-xt-block-posts alignwide is-style-2-columns wp-block-tripp-xt-posts">
                           <div class="posts-list" style="--tripp-xt-rows:<?php echo ($wp_query->post_count <= 3) ? "2" : "4"; ?>">
                           <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                                    $destinazioni = get_the_terms(get_the_ID() , 'destinazioni' );
                                    $paesaggi = get_the_terms(get_the_ID() , 'paesaggi' );
                                    $destinazione = (isset( $destinazioni)) ? $destinazioni[0]->name : "#";
                                    $destinazione_link = (isset( $destinazioni)) ? get_term_link($destinazioni[0]->term_id) : "#";
                                    $paesaggio = (isset( $paesaggi)) ? $paesaggi[0]->name : "#";
                                    $paesaggio_link = (isset( $paesaggi)) ? get_term_link($paesaggi[0]->term_id) : "#";
                                    $gallery_images = get_field('gallery_images',get_the_ID());
                                    $tempo_lettura = get_field('tempo_lettura',get_the_ID());
                                   
                                    $alt_text = get_post_meta( get_post_thumbnail_id() , '_wp_attachment_image_alt', true );

                                    if ( ! empty( $alt_text ) ) {
                                       $alt_text = $alt_text;
                                    } else {
                                       $alt_text = __( "Immagine di " . get_the_title(), 'textdomain' ); 
                                    }
                                 
                              ?>
                              <article class="post type-post has-post-thumbnail entry">
                                 <div class="entry-media">
                                    <div class="flext-featured-media flext-post-gallery flext-gallery-slider" data-autoplay="hover">
                                       <div class="flext-carousel-wrapper">
                                        <?php  if ($gallery_images) {
                                                    
                                                    foreach ( $gallery_images as $image ) { ?>
                                                        <a href="<?php the_permalink(); ?>" class="flext-slide">
                                                            <img width="720" height="720" src="<?php echo $image["sizes"]["mia_square_large"];?>" class="attachment-tripp-large size-tripp-large" alt="<?php echo esc_attr($image['alt']); ?>" decoding="async" loading="lazy" 
                                                               srcset="<?php echo $image["sizes"]["mia_square_large"];?> 720w,
                                                                       <?php echo $image["sizes"]["mia_square"];?> 360w" 
                                                               sizes="(max-width: 720px) 100vw, 720px" />
                                                         </a>
                                                        <?php
                                                    }

                                                } else { ?>
                                                         <a href="<?php the_permalink(); ?>" class="flext-slide">
                                                            <img width="720" height="720" src="<?php echo get_the_post_thumbnail_url( get_the_ID(),"mia_square_large" );?>" class="attachment-tripp-large size-tripp-large" alt="<?php echo $alt_text; ?>" decoding="async" loading="lazy"
                                                               srcset="<?php echo get_the_post_thumbnail_url( get_the_ID(),"mia_square_large" );?> 720w,
                                                                       <?php echo get_the_post_thumbnail_url( get_the_ID(),"mia_square");?> 360w" 
                                                               sizes="(max-width: 720px) 100vw, 720px" />
                                                         </a>
                                                <?php }
                                          ?>
                                       </div>
                                       <?php if ($gallery_images) { ?>
                                          <span class="total-images"><?php echo count($gallery_images) ?></span>
                                      <?php } ?>                                       
                                    </div>
                                 </div>
                                 <div class="content-inner">
                                    <header class="entry-header">
                                       <div class="entry-meta">
                                          <span class="meta-destination term-links"><a href="<?php echo $destinazione_link;?>" title="Leggi tutti in <?php echo $destinazione;?>" rel="category tag"><i class="tripp-ico-location"></i><span><?php echo $destinazione;?></span></a></span> 
                                       </div>
                                       <h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                                    </header>
                                    <footer class="entry-footer">
                                       <div class="entry-meta">
                                          <div>
                                             <span class="meta-category term-links"><?php echo _e('Explore', 'top10hotel');?>&nbsp;<a href="<?php echo $paesaggio_link;?>" title="<?php echo $paesaggio;?>" rel="category tag"><strong><?php echo $paesaggio;?></strong></a></span> 
                                          </div>
                                          <div>
                                             <span class="meta-date"><time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time></span>
                                             <?php if (!empty($tempo_lettura)) { ?>
                                                <span class="meta-reading-time"><i class="flext-ico-date"></i><?php echo $tempo_lettura; ?>&nbsp;min</span> 
                                             <?php } ?>
                                          </div>
                                       </div>
                                       <div class="card-social">
                                          <div class="social-handler-btn">
                                             <button class="social-hover" aria-label="<?php echo _e('condividi_contenuto', 'top10hotel');?>"><i class="flext-ico-share"></i>
                                             </button>
                                             <div class="entry-buttons"><?php echo do_shortcode('[Sassy_Social_Share url="' . get_permalink() . '"]') ?></div>
                                          </div>                                          
                                       </div>
                                    </footer>
                                 </div>
                              </article>

                           <?php endwhile; else : ?>

                           <?php endif; ?>


                           </div>
                        </div>


                        <!-- END MAIN ENTRIES -->




                        <!-- PAGINAZIONE -->

                        <?php                       
                        
                        if ($wp_query->max_num_pages >= 2) :?>
                        <div class="wp-block-buttons flext-block-1676370607524 is-content-justification-center is-layout-flex wp-container-3">
                           <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-primary-color has-text-color wp-element-button" href="<?php echo pll_home_url();?>page/2/"><?php echo _e('see_all', 'top10hotel');?></a></div>
                        </div>
                        <?php endif;?>
                     </div>
                  </section>


                  <!-- SLIDERS -->

                  <?php 
                     $taxonomies = [ "paesaggi", "tipo-di-vacanza", "destinazioni", "budget"];
                     //$taxonomies = [ "destinazioni" => "Destinations"];
                     foreach ($taxonomies as $key) :
                        $terms = get_terms(['taxonomy'   => $key,'hide_empty' => true]);
                        if ( !empty($terms) ) :
                        ?>
                        <section class="flext-block-section flext-has-background flext-has-background-dim has-background-dim-100 alignfull">
                              <div class="flext-block-section-background"><span class="flext-block-section-overlay-background has-surface-background-color"></span></div>

                              <div class="flext-block-section-inner">
                                 <div class="wp-block-group tripp-heading-block is-layout-constrained">
                                    <p class="has-text-align-center tripp-heading-title has-small-font-size flext-has-animation flext-animation-fade-down flext-animation-delay-250 flext-animation-once"><?php echo _e('start_exploring', 'top10hotel');?></p>
                                    <h2 class="wp-block-heading has-text-align-center tripp-heading-headline flext-has-animation flext-animation-fly-in flext-animation-delay-125 flext-animation-once"><?php echo _e($key, 'top10hotel');?></h2>
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
                                    <div class="flext-carousel-wrapper <?php echo ($key == "budget") ? "carousel--budget" : "" ?>">
                                       <?php foreach( $terms as $term) : 
                                          $image = get_field('immagine', $key . '_' . $term->term_id);
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

                        </section>
                  <?php endif; endforeach;?>                    
               </div>
            </article>
         </main>
         
<?php 
endif;
get_footer(); ?>  