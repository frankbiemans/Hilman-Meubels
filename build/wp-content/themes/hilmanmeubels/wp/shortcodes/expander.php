<?php
    
    add_shortcode( 'expand-this', 'shortcode_expand' );
    function shortcode_expand( $atts, $content ) {
        $shortcode = basename( __FILE__ , '.php' );

        $defaults = array( 
            'label' => __('Lees Meer'),
        );
        $atts = shortcode_atts( $defaults, $atts );
        extract( $atts );

        $return = '            <div class="expander">                <div class="header">                    <span class="arrow arrow-down">&darr;</span>                    <span class="arrow arrow-up">&uarr;</span>                    <span class="label">'. $label .'</span>                </div>                <div class="expand-me">                    '. wpautop($content) .'                </div>            </div>        ';
        
        add_action('wp_footer', 'expand_scripts', 20);
        return $return;
    }

    function expand_scripts(){
        ?>
            <script>
                $(document).ready(function () {
                    $('.expander').each(function () {
                        $(this).find('.header').click(function () {
                            $(this).parent().find('.expand-me').toggle(360);
                            $(this).parent().toggleClass('active');
                        });
                    });
                });
            </script>
        <?php
    }

?>