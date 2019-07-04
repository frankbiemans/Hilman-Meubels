<?php
    
    add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

    function register_plugin_styles() {
        wp_dequeue_style( 'style' );
        wp_register_style( 'libraries', get_template_directory_uri() . '/stylesheets/libraries.min.css' );
        wp_register_style( 'style', get_template_directory_uri() . '/stylesheets/site.min.css', array('libraries') );
        
        wp_enqueue_style( 'style');
    }

?>