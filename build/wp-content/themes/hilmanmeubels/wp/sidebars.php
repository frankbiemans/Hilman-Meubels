<?php

// Zie ook: http://justintadlock.com/archives/2010/11/08/sidebars-in-wordpress

add_action( 'widgets_init', 'register_theme_sidebars' );
function register_theme_sidebars() {
    register_sidebar(array(
        'name' => __('Main Sidebar'), 
        'id' => 'mainsidebar', 
        'description' => __( 'Main Sidebar' ), 
        'class' => 'sidebar-widget', 
        'before_widget' => '<div class="widget">', 
        'after_widget' => '</div>', 
        'before_title' => '<h2 class="title">', 
        'after_title' => '</h2>'
    ));
}
