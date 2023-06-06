<div class="main-posts tripp-posts posts-type-post posts-style-text-overlay posts-layout-grid is-ajax-pagination">
    <div class="posts-list grid-columns has-3-columns">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                $destinazioni = get_the_terms(get_the_ID() , 'destinazioni' );
                $paesaggi = get_the_terms(get_the_ID() , 'paesaggi' );
                $destinazione = (isset( $destinazioni)) ? $destinazioni[0]->name : "#";
                $destinazione_link = (isset( $destinazioni)) ? get_term_link($destinazioni[0]->term_id) : "#";
                $paesaggio = (isset( $paesaggi)) ? $paesaggi[0]->name : "#";
                $paesaggio_link = (isset( $paesaggi)) ? get_term_link($paesaggi[0]->term_id) : "#";
            ?>
            <article class="post type-post status-publish has-post-thumbnail hentry entry">
                <div class="entry-media">
                    <div id="flext-post-video-196" class="flext-featured-media flext-post-video flext-media-player flext-media-initialized is-player-init" data-src="https://tripptheme.com/tripp1/wp-content/uploads/2023/01/nordland.mp4"  data-featured-media="true" >
                        <a class="flext-media-link" href="<?php the_permalink(); ?>">
                            <img width="480" height="640" src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'mia_vert' )?>" class="attachment-tripp-portrait size-tripp-portrait wp-post-image" alt="<?php the_title(); ?>" decoding="async" />
                        </a>
                    </div>
                </div>
                <div class="content-inner">
                    <header class="entry-header">
                        <div class="entry-meta">
                            <span class="meta-destination term-links">
                                <a href="<?php echo $destinazione_link;?>" title="<?php echo $destinazione;?>" rel="category tag">
                                    <i class="tripp-ico-location"></i><span><?php echo $destinazione;?></span>
                                </a>
                            </span>
                        </div>
                        <h3 class="entry-title">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h3>
                    </header>
                    <footer class="entry-footer">
                        <div class="entry-meta">
                            <div>
                                <span class="meta-category term-links">
                                    <strong>In</strong>
                                    <a href="<?php echo $paesaggio_link;?>" title="Coast" rel="category tag"><?php echo $paesaggio;?></a>
                                </span>
                            </div>
                            <div>
                                <span class="meta-date">
                                    <time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                </span>
                                <span class="meta-reading-time">
                                    <i class="flext-ico-date"></i><?php echo do_shortcode('[rt_reading_time]'); ?>&nbsp;min                                    
                                </span>
                            </div>
                        </div>
                        <div class="card-social">
                            <div class="social-handler-btn">
                                <button class="social-hover" aria-label="<?php echo _e('condividi_contenuto', 'top10hotel');?>"><i class="flext-ico-share"></i>
                                </button>
                                <div class="entry-buttons"><?php echo do_shortcode('[Sassy_Social_Share url="https://www.top10hotel.it/"]') ?></div>
                            </div>                                          
                        </div>
                    </footer>
                </div>
            </article>
        <?php 
            endwhile;
        endif; ?>
    </div>
    
    <?php Helper::custom_numbered_pagination();?>
</div>