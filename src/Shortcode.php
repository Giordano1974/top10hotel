<?php 

/**
 * Is the basic controller that aims to retrieve the 
 * custom taxonomy data
 */
class Shortcode {

    function __construct() {
        add_shortcode( 'booking_tracking',  [ $this, 'printAffiliateLink'] );
	}
 
    /**
     * Stampa il bottone impostato da shortcode
     *     
     */
    public function printAffiliateLink( $atts, $content, $tag ) {
                
        $atts = shortcode_atts(array(
            'hid' => '',
            'lang' => ''
        ), $atts);
    
        $hid = $atts['hid'];
        $lang = $atts['lang'];

        $output =
            <<<HTML
            <ins class="bookingaff" data-aid="2339610" data-target_aid="2339610" data-prod="rw" data-width="0" data-height="0" data-lang="{{ lang }}" data-show_rw_logo="1" data-show_rw_badge="1" data-show_rw_text="1" data-hid="{{ hid }}">
            <!-- Anything inside will go away once widget is loaded. -->
            <a href="//www.booking.com?aid=2339610">Booking.com</a>
                </ins>
                <script type="text/javascript">
                (function(d, sc, u) {
                var s = d.createElement(sc), p = d.getElementsByTagName(sc)[0];
                s.type = 'text/javascript';
                s.async = true;
                s.src = u + '?v=' + (+new Date());
                p.parentNode.insertBefore(s,p);
                })(document, 'script', '//cf.bstatic.com/static/affiliate_base/js/flexiproduct.js');
                </script>

            HTML;

        $output = str_replace(['{{ hid }}' , '{{ lang }}'],[$hid, $lang],$output);
        return $output;        
    }

    
}

?>