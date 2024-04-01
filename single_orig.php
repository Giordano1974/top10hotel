<?php get_header(); 
if (have_posts()) :
    while (have_posts()) : the_post();
        $destinazioni = get_the_terms(get_the_ID() , 'destinazioni' );
        $paesaggi = get_the_terms(get_the_ID() , 'paesaggi' );
        $destinazione = (isset( $destinazioni)) ? $destinazioni[0]->name : "#";
        $destinazione_link = (isset( $destinazioni)) ? get_term_link($destinazioni[0]->term_id) : "#";
        $paesaggio = (isset( $paesaggi)) ? $paesaggi[0]->name : "#";
        $paesaggio_link = (isset( $paesaggi)) ? get_term_link($paesaggi[0]->term_id) : "#";
        //if (!$immagine_single) $immagine_single = "/wp-content/uploads/2022/12/post-47-1920x1280.jpg";
        
?>
            <main id="site-content" class="main-content">
                <article id="post-<?php echo get_the_ID() ?>" class="post-<?php echo get_the_ID() ?> post type-post has-post-thumbnail entry single-entry">
                    <header class="has-gradient-overlay page-header entry-header single-entry-header alignfull parallax-background">
                        <div class="entry-media single-entry-media">
                            <div class="post-thumbnail header-background">
                                <picture>
                                    <source srcset="<?php echo get_the_post_thumbnail_url( get_the_ID(),'mia_extra_large' )?>" media="(min-width: 1535px)">
                                    <source srcset="<?php echo get_the_post_thumbnail_url( get_the_ID() ,'mia_large')?>" media="(min-width: 1024px)">
                                    <source srcset="<?php echo get_the_post_thumbnail_url( get_the_ID() ,'mia_medium')?>" media="(min-width: 600px)">
                                    <img width="600" height="400" src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'mia_rect' )?>" class="attachment-tripp-fullwidth size-tripp-fullwidth wp-post-image" alt="<?php echo get_the_title();?>" decoding="async" />
                                </picture>
                            </div>
                        </div>
                        <div class="header-content">
                            <div class="tripp-container">
                                <span class="meta-destination term-links">
                                    <a href="<?php echo $destinazione_link;?>" title="leggi tutto su <?php echo $destinazione;?>" rel="category tag">
                                        <i class="tripp-ico-location"></i>
                                        <span><?php echo $destinazione;?></span>
                                    </a>
                                </span>
                                <h1 class="entry-title"><?php echo get_the_title();?></h1>
                                <span class="description"><?php echo get_field('sommario',get_the_ID());?></span>
                                <div class="entry-meta">
                                    <span class="meta-category term-links">
                                        <span>Paesaggio:&nbsp;</span>
                                        <a href="<?php echo $paesaggio_link;?>" title="leggi tutto su <?php echo $paesaggio;?>" rel="category tag"><strong><?php echo $paesaggio;?></strong></a>
                                    </span>
                                    <span class="meta-published-date">
                                        <i class="tripp-ico-calendar"></i>
                                        <time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                    </span>
                                    <span class="meta-reading-time">
                                        <i class="flext-ico-date"></i><?php echo do_shortcode('[rt_reading_time]'); ?>&nbsp;min
                                    </span>
                                </div>
                                <div class="entry-social"><?php echo do_shortcode('[Sassy_Social_Share]') ?></div>
                            </div>
                        </div>
                    </header>
                    <div class="entry-content"><?php 
                    $content = get_the_content();
                    $pattern = '/<img(.*?)>/i';
                    $replacement = '<img$1 decoding="async" loading="lazy">';
                    $content = preg_replace($pattern, $replacement, $content);
                    echo do_shortcode($content);
                    ?>
                    </div>
                    <footer class="single-entry-footer">
                        <div class="post-tags">
                            <div class="tags-links">
                                <div class="terms-list">
                                    <?php
                                        $post_tags = get_the_tags();
                                        if ( ! empty( $post_tags ) ) {
                                            echo '<ul>';
                                            foreach( $post_tags as $post_tag ) {
                                                echo '<li><a href="' . get_tag_link( $post_tag ) . '">' . $post_tag->name . '</a></li>';
                                            }
                                            echo '</ul>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="entry-social"><?php echo do_shortcode('[Sassy_Social_Share]') ?></div>
                    </footer>
                </article>
                <div class="flext-block-post-carousel related-posts wp-block-flextension-post-carousel">
                    <div class="post-carousel-header">
                        <h2 class="block-title"><?php echo _e('You_may_also_like', 'top10hotel');?></h2>
                    </div>
                    <div class="flext-post-carousel flext-carousel posts-list" data-navigation="1" data-slides-per-view="3" data-space-between="30">
                        <div class="flext-carousel-wrapper">
                           <?php
                           $args = [
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'post__not_in'   => [get_the_ID()],
                            'tax_query' => [
                                'relation' => 'OR',
                                [
                                    'taxonomy' => 'paesaggi',
                                    'field'    => 'slug',
                                    'terms'    => $paesaggi[0]->slug,
                                ],
                                [
                                    'taxonomy' => 'destinazioni',
                                    'field'    => 'slug',
                                    'terms'    => $destinazioni[0]->slug,
                                ]
                            ],
                        ];
                        
                        $query = new WP_Query( $args );
                        
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                $alt_text = get_post_meta( get_post_thumbnail_id() , '_wp_attachment_image_alt', true );

                                    if ( ! empty( $alt_text ) ) {
                                       $alt_text = $alt_text;
                                    } else {
                                       $alt_text = __( "Immagine di " . get_the_title(), 'textdomain' ); 
                                    }
                                ?>
                                <article class="flext-slide post-<?php the_ID(); ?> post type-post has-post-thumbnail hentry has-review entry">
                                    <div class="entry-media">
                                        <div class="flext-featured-media flext-post-gallery flext-gallery-slider" data-autoplay="hover">
                                            <div class="flext-carousel-wrapper">
                                                <?php
                                                // Loop through the gallery images
                                                $gallery_images = get_field('gallery_images');
                                                $size = 'thumbnail'; 
                                                if ($gallery_images) {
                                                    
                                                        foreach ( $gallery_images as $image ) { ?>

                                                            <a href="<?php the_permalink(); ?>" class="flext-slide">
                                                                <img width="480" height="640" src="<?php echo esc_url($image['sizes']['mia_vert']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="attachment-tripp-portrait size-tripp-portrait"  decoding="async" loading="lazy" />
                                                            </a>
                                                            
                                                        <?php } 
                                                } else { ?>

                                                        <a href="<?php the_permalink(); ?>" class="flext-slide">
                                                        <img width="480" height="640" src="<?php echo get_the_post_thumbnail_url( get_the_ID(),"mia_vert" );?>" class="attachment-tripp-large size-tripp-large" alt="<?php echo $alt_text; ?>" decoding="async" loading="lazy" />
                                                        </a>

                                                <?php } ?>
                                            </div>
                                           <?php if ($gallery_images) { ?>
                                                <span class="total-images"><?php echo count($gallery_images) ?></span>
                                            <?php } ?>  
                                        </div>
                                    </div>
                                    <div class="content-inner">
                                        <header class="entry-header">
                                            <div class="entry-meta">
                                                <span class="meta-destination term-links">
                                                    <?php
                                                    // Get the destination taxonomy terms
                                                    $destinations = get_the_terms( get_the_ID(), 'destinazioni' );
                                                    if ( $destinations && ! is_wp_error( $destinations ) ) {
                                                        foreach ( $destinations as $destination ) {
                                                            ?>
                                                            <a href="<?php echo get_term_link( $destination ); ?>" title="<?php echo esc_attr( $destination->name ); ?>" rel="category tag">
                                                                <span><?php echo esc_html( $destination->name ); ?></span>
                                                            </a>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <h3 class="entry-title">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                            </h3>
                                        </header>
                                    </div>
                                    
                                </button>
                            </article>
                            <?php
                            }
                        }
                           ?>
                        </div>
                    </div>
                </div>
                <nav class="navigation post-navigation" role="navigation">
                    <div class="post-nav-links">
                        <div class="nav-col nav-previous">
                            <?php if (get_previous_post()): ?>
                                <div class="nav-thumbnail">
                                    <a href="<?php echo get_permalink(get_previous_post()->ID); ?>">
                                        <?php echo get_the_post_thumbnail(get_previous_post()->ID, 'thumbnail'); ?>
                                    </a>
                                </div>
                                <div class="nav-text">
                                    <span class="nav-icon"><?php echo _e('Previous_article', 'top10hotel'); ?></span>
                                    <h4 class="nav-title">
                                        <a href="<?php echo get_permalink(get_previous_post()->ID); ?>">
                                            <?php echo get_the_title(get_previous_post()->ID); ?>
                                        </a>
                                    </h4>
                                    <div class="entry-meta">
                                        <span class="meta-destination term-links">
                                            <a href="<?php echo get_term_link(get_the_terms(get_previous_post()->ID,'paesaggi')[0]->term_id,'paesaggi'); ?>" title="<?php echo get_the_category(get_previous_post()->ID)[0]->name; ?>" rel="category tag">
                                                <?php echo get_the_terms(get_previous_post()->ID,'paesaggi')[0]->name; ?>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="nav-col nav-all">
                            <!--<a href="/blog/">
                                <i class="tripp-ico-archive"></i>
                                <span class="nav-text"><?php echo _e('All_posts', 'top10hotel'); ?></span>
                            </a>-->
                        </div>
                        <div class="nav-col nav-next">
                            <?php if (get_next_post()): ?>
                                <div class="nav-thumbnail">
                                    <a href="<?php echo get_permalink(get_next_post()->ID); ?>">
                                        <?php echo get_the_post_thumbnail(get_next_post()->ID, 'thumbnail'); ?>
                                    </a>
                                </div>
                                <div class="nav-text">
                                    <span class="nav-icon"><?php echo _e('Next_article', 'top10hotel'); ?></span>
                                    <h4 class="nav-title">
                                        <a href="<?php echo get_permalink(get_next_post()->ID); ?>">
                                            <?php echo get_the_title(get_next_post()->ID); ?>
                                        </a>
                                    </h4>
                                    <div class="entry-meta">
                                        <span class="meta-destination term-links">
                                            <a href="<?php echo get_term_link(get_the_terms(get_next_post()->ID,'paesaggi')[0]->term_id,'paesaggi'); ?>" title="<?php echo get_the_category(get_next_post()->ID)[0]->name; ?>" rel="category tag">
                                                <?php echo get_the_terms(get_next_post()->ID,'paesaggi')[0]->name; ?>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>

            </main>
            <?php 
    endwhile;
endif;
get_footer(); ?>
<script>
    // const affiliate_link = document.querySelectorAll(".fasc-button");

    // affiliate_link.forEach(function(obj){
    //     var affiliate_link_url = obj.href;
    //     obj.addEventListener("click", function(e){
    //         e.preventDefault();
    //         ga('send', 'event', 'vista_prodotto_booking', 'click', affiliate_link_url);
    //     });
    // })
    
</script>
