<?php

add_shortcode( 'example', 'shortcode_example' );
function shortcode_example( $atts ) {
    $shortcode = basename( __FILE__ , '.php' );

    $defaults = array( 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' );
    $atts = shortcode_atts( $defaults, $atts );
    extract( $atts );

    $html = '
		<div class="embed $shortcode">
		    <p>$text</p>
		</div>
	';

    return $html;
}
