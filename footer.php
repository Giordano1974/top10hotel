<footer id="site-footer" class="main-footer">
            <div class="footer-widgets tripp-grid has-4-columns">
               <div class="footer-col-1">
                  <div id="flext-instagram-3" class="widget flext-widget-instagram">
                     <div class="flext-instagram-feed">
                            
                     </div>
                     <div class="footer_logo"><img width="150" height="80" src="/wp-content/themes/top10hotel/images/logo-footer.png" alt="Top 10 hotel" /></div>
                  </div>
               </div>
               <div class="footer-col-2">
                  <nav id="flext_categories-links" class="widget flext-widget-categories">
                     <div class="widget-title">
                        <h2><?php echo _e('Links', 'top10hotel');?></h2>
                     </div>
                     
                                          <?php 
                                             wp_nav_menu(array(
                                                'menu'            => "Footer menu",
                                                'container'			=> "", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.                                          
                                                'theme_location' => 'footer-menu',
                                                'items_wrap'     => '<ul class="flext-categories">%3$s</ul>'// (string) How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
                                             ));
                                          ?>
                     
                  </nav>
               </div>
               <?php 
               $taxonomies = [ "paesaggi" => 'Explore',"destinazioni" => "Destinations"];
               foreach ($taxonomies as $key => $value) :
                  $terms = get_terms(['taxonomy'   => $key,'hide_empty' => true]);
                  if ( !empty($terms) ) :
                  ?>
                  <div class="footer-col-<?php echo $key;?>">
                  <nav id="flext_categories-<?php echo $key;?>" class="widget flext-widget-categories">
                     <div class="widget-title">
                        <h2><?php echo _e($value, 'top10hotel');?></h2>
                     </div>
                     <ul class="flext-categories">
                           <?php foreach( $terms as $term ) : ?>
                              <li class="category-item"><a title="<?php echo $term->name;?>" href="<?php echo get_term_link($term->term_id);?>"><span><?php echo $term->name;?></span></a></li>
                           <?php endforeach;?>
                     </ul>
                  </nav>
               </div>
               <?php endif;
               endforeach;?>  
               
            </div>
            <div class="site-info">
               <div class="footer-text">
                  <span class="footer-copyright">© 2023 powered by Top10hotel.</span>
               </div>
               <div class="footer-contact-info">
                  <div class="footer-social-links">
                     <!--div class="flext-social-icons"><a class="flext-link-youtube" href="https://www.youtube.com/shorts" title="Youtube" target="_blank" rel="nofollow"><i class="flext-ico-youtube"></i></a> <a class="flext-link-twitter" href="https://twitter.com/explore" title="Twitter" target="_blank" rel="nofollow"><i class="flext-ico-twitter"></i></a> <a class="flext-link-facebook" href="https://www.facebook.com/watch" title="Facebook" target="_blank" rel="nofollow"><i class="flext-ico-facebook"></i></a> <a class="flext-link-instagram" href="https://www.instagram.com/explore" title="Instagram" target="_blank" rel="nofollow"><i class="flext-ico-instagram"></i></a></!div-->
                  </div>
               </div>
            </div>
         </footer>
         <div id="site-content-overlay" class="main-content-overlay"></div>
         <a href="#top" id="back-to-top" class="to-top-button">
         <i class="tripp-ico-arrow-up"></i>
         <span>Back To Top</span>
         </a>
      </div>
      <style id='core-block-supports-inline-css'>
         .wp-container-3.wp-container-3,.wp-container-8.wp-container-8,.wp-container-11.wp-container-11{justify-content:center;}
      </style>
      <script id='flextension-js-extra'>
         var flextensionSettings = {"api":{"url":"https:\/\/www.top10hotel.it\/wp-json\/"},"ajaxUrl":"https:\/\/www.top10hotel.it\/wp-admin\/admin-ajax.php","ajaxNonce":"a20fa14c75","strings":{"next":"Next","previous":"Previous","close":"Close"}};
      </script>
      <script id='contact-form-7-js-extra'>
         var wpcf7 = {"api":{"root":"https:\/\/www.top10hotel.it\/wp-json\/","namespace":"contact-form-7\/v1"},"cached":"1"};
      </script>
      <script id='tripp-js-extra'>
         var trippSettings = {"ajaxUrl":"https:\/\/www.top10hotel.it\/wp-admin\/admin-ajax.php","ajaxNonce":"e05f2e27ae","desktopMenuBreakpoint":"1080","router":{"root":"https:\/\/www.top10hotel.it","permalink":true,"taxonomies":{"category_name":"category","tag":"tag","post_format":"type","destination":"destination"}},"strings":{"prev":"Newer","next":"Older"},"singlePage":{"exclude":{"links":[],"selectors":[".tripp-coupon .coupon-link"]}}};
      </script>
      <script id='flextension-js-extra'>
    var flextensionSettings = {
        "api": {
            "url": "https:\/\/www.top10hotel.it\/wp-json\/"
        },
        "ajaxUrl": "https:\/\/www.top10hotel.it\/wp-admin\/admin-ajax.php",
        "ajaxNonce": "a20fa14c75",
        "strings": {
            "next": "Next",
            "previous": "Previous",
            "close": "Close"
        }
    };
</script>
<script id='contact-form-7-js-extra'>
    var wpcf7 = {
        "api": {
            "root": "https:\/\/www.top10hotel.it\/wp-json\/",
            "namespace": "contact-form-7\/v1"
        },
        "cached": "1"
    };
</script>
<script id='tripp-js-extra'>
    var trippSettings = {
        "ajaxUrl": "https:\/\/www.top10hotel.it\/wp-admin\/admin-ajax.php",
        "ajaxNonce": "e05f2e27ae",
        "desktopMenuBreakpoint": "1080",
        "router": {
            "root": "https:\/\/www.top10hotel.it",
            "permalink": true,
            "taxonomies": {
                "category_name": "category",
                "tag": "tag",
                "post_format": "type",
                "destination": "destination"
            }
        },
        "strings": {
            "prev": "Newer",
            "next": "Older"
        },
        "singlePage": {
            "exclude": {
                "links": [],
                "selectors": [".tripp-coupon .coupon-link"]
            }
        }
    };
</script>
      <script src="/wp-content/themes/top10hotel/js/theme.js" data-minify="1" defer></script>

      <?php wp_footer(); ?>

   </body>
</html>