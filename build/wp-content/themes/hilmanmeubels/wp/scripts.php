<?php

add_action( 'wp_enqueue_scripts', 'enqueue_and_register_my_scripts' );

function enqueue_and_register_my_scripts(){

	//wp_deregister_script('wp-embed');

    wp_register_script( 'libraries', get_template_directory_uri() . '/scripts/libraries.min.js', NULL, NULL, TRUE );
    wp_register_script( 'functions', get_template_directory_uri() . '/scripts/functions.min.js', array('libraries'), NULL, TRUE );
    wp_register_script( 'load', get_template_directory_uri() . '/scripts/load.min.js', array('functions'), NULL, TRUE );
    wp_enqueue_script( 'load');
}

?>