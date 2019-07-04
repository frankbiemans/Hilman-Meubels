<?php
    
    add_shortcode( 'expand-this', 'shortcode_expand' );
    function shortcode_expand( $atts, $content ) {
        $shortcode = basename( __FILE__ , '.php' );

        $defaults = array( 
            'label' => __('Lees Meer'),
        );
        $atts = shortcode_atts( $defaults, $atts );
        extract( $atts );

        $return = '
        
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