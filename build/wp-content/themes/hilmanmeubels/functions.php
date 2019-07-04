<?php

include_once(dirname(__FILE__) . '/wp/_require.php' );
include_once(dirname(__FILE__) . '/wp/post-types/_require.php' );
include_once(dirname(__FILE__) . '/wp/shortcodes/_require.php' );
include_once(dirname(__FILE__) . '/wp/widgets/_require.php' );
include_once(dirname(__FILE__) . '/wp/plugins/_require.php' );

update_option( 'WP_HOME', 'http://'. $_SERVER['HTTP_HOST'] );
update_option( 'WP_SITEURL', 'http://'. $_SERVER['HTTP_HOST'] );

add_theme_support( 'post-thumbnails', array( 'page' ) );

remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

add_action( 'do_feed', 'disable_feed', 1 );
add_action( 'do_feed_rdf', 'disable_feed', 1 );
add_action( 'do_feed_rss', 'disable_feed', 1 );
add_action( 'do_feed_rss2', 'disable_feed', 1 );
add_action( 'do_feed_atom', 'disable_feed', 1 );
function disable_feed() {
    die();
}

add_action( 'after_setup_theme', 'extra_image_sizes' );
function extra_image_sizes() {
    add_image_size( 'Page Header', 834, 452, TRUE );
}

add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 ) ;
function custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="video-container">'.$html.'</div>';
    return $return;
}

add_action('widgets_init', 'remove_recent_comments_style');
function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

add_action( 'admin_menu', 'my_admin_menu' );
function my_admin_menu() {
     remove_menu_page( 'link-manager.php' );
     remove_menu_page( 'edit-comments.php' );
     remove_menu_page( 'edit.php' );
}

add_filter('widget_text', 'do_shortcode');
function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );


// Dumps all arguments formatted as HTML
function dump() {
    if( !defined( 'ENVIRONMENT' ) || ENVIRONMENT != 'dev' ) {
        return;
    }

    ob_start();
    var_dump( func_get_args() );
    $dump = ob_get_clean();
    $dump = preg_replace( '/^array\(\d+\) \{/', '', $dump );
    $dump = preg_replace( '/\}$/', '', $dump );
    $dump = preg_replace( '/\["(.+)"\]/', '$1', $dump );
    $dump = preg_replace( '/=>\s*/', ' => ', $dump );
    $dump = preg_replace( '/\[\d+\] => /', '', $dump );
    $dump = preg_replace( '/(string)\((\d+)\) ("(.*)")/', '<span style="color: #99182C">$3</span>', $dump );
    $dump = preg_replace( '/(bool)\((true|false)\)/', '$2', $dump );
    $dump = preg_replace( '/(array\(0\)) \{\s*\}/', '$1', $dump );
    $dump = preg_replace( '/(array)\((\d+)\)/', '$1($2)', $dump );
    $dump = preg_replace( '/(int|float)\((\d+(\.\d+)?)\)/', '<span style="color: #007fff">$2</span>', $dump );
    $dump = preg_replace( '/(object)\((\w+)\)(#\d+) (\(\d+\))/', '$1($2)', $dump );

    $style = '<style>span.item:hover{cursor: default; background-color: #ffc} pre{overflow: hidden; text-overflow: ellipsis} pre:hover{overflow: visible}</style>';

    wp_die( $style . "<pre>$dump</pre>" );
}

function in_array_r($needle, $haystack, $strict = false) {
    /*
        in_array() does not work on multidimensional arrays. 
        This is a recursive function to do that.
    */
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }
    return false;
}

function return_all_countries() {
    return $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
}

function show_projects_by_term_id($term_id){
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $term_id,
                )
            )
        );
    $projects = get_posts ( $args );

    echo '<ul>';
    foreach($projects as $project){
        echo '
        <li>
            <a href="'. get_permalink( $project->ID ) .'">
                '. $project->post_title .'
            </a>
        </li>
        ';
    }
    echo '</ul>';
}

function statue(){

    $page_id = get_the_ID();

    if($page_id == 7){ // 7 == Contact
        include_once('google-maps.php');

    } elseif ( $page_id == 56 ) { // projecten
        include_once('page-projecten-statue.php');

    } elseif(is_front_page() || get_post_type() == 'project') {
        include_once('slideshow.php');

    } elseif ( is_page() ) {
        include_once('slideshow.php');

    } else {
       echo 'Slider '. $page_id;
    }
}

function drop_down_menu($menu_name){
    $args = array(
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'post_type' => 'nav_menu_item',
        'post_status' => 'publish',
    );
    $menu_items = wp_get_nav_menu_items($menu_name, $args);

    if(count($menu_items) > 0){
        echo '<select class="custom-dropdown-menu">';
        foreach($menu_items as $item){
            $selected = '';
            if($item->object_id == get_the_ID()){
                $selected = ' selected';
            }
            ?>
            <option value="<?php echo $item->url; ?>" <?php echo $selected; ?>>
                <?php 
                if($item->menu_item_parent > 0 ){
                    echo '-- ';
                }
                echo $item->title; 
                ?>
            </option>
            <?php
        }
        echo '</select>';
    }
}