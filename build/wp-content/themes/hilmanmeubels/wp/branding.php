<?php
    
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return 'http://www.nosuch.nl';
}

add_action('login_head', 'login_styles');  
function login_styles() {   
    ?>
        <style type="text/css">
            .login h1 a { 
                background: url(<?php echo get_bloginfo("template_directory"); ?>/images/NSC_logo.png) no-repeat center; 
                width: 330px;
                background-size: contain;
            }
        </style>
    <?php   
} 

add_filter('admin_footer_text', 'modify_footer_admin');  
function modify_footer_admin () {  
  echo 'Ontwikkeld door <a href="http://www.nosuch.nl">NoSuchCompany</a>.';  
}  
?>