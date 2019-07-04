
<?php
    $menu = 'Main Menu';
    $menu_args = array(
        'menu' => $menu, 
        'depth' => 1
    );
?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>

    <head>
        <title><?php wp_title( ' - ', 1, 'right' ); bloginfo( 'name' ); ?></title>

        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta charset="<?php bloginfo( 'charset' ) ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="<?php bloginfo( 'template_url' ) ?>/images/favicon.ico">

        <?php wp_head(); ?>

        <?php include_once(dirname(__FILE__) . '/analyticstracking.php'); ?>
    </head>

    <body <?php body_class(); ?>>
        <header>
            <div class="header-top-shadow"></div>

            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-2">
                        <figure class="logo">
                            <a href="<?php echo get_home_url(); ?>">
                            <img src="<?php bloginfo( 'template_url' ) ?>/images/hilman.png" width="101" width="116" title="Hilman Meubelen" />
                            </a>
                        </figure>
                    </div>
                    <div class="col-xs-6 visible-xs">
                        <div class="mobile-menu">
                            <?php wp_nav_menu( $menu_args ); ?>
                        </div>
                    </div>
                    <div class="clearfix visible-xs"></div>
                    <div class="col-sm-10">
                        <?php statue(); ?>
                    </div>
                </div>
            </div>

            <div class="header-bottom-shadow"></div>
        </header>

        <div class="container">
            <div class="row">
                <div class="col-sm-2 hidden-xs">
                    <nav>
                        <?php wp_nav_menu( $menu_args ); ?>
                    </nav>
                </div>