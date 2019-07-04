<?php
    // https://github.com/mboynes/super-cpt
    add_action( 'after_setup_theme', 'add_project_cpt' );

    function add_project_cpt(){
        if( !class_exists( 'Super_Custom_Post_Type' ) )
            return;

        $supercpt = new Super_Custom_Post_Type( 
            'project', 'Project', 'Projecten', 
            array(
                    'supports' => array('title', 'editor')
            )
        );

        $supercpt->set_icon( 'briefcase' );

        $secondtax = new Super_Custom_Taxonomy( 'category', 'Categorie', 'Categorieen', 'category' );
        connect_types_and_taxes( $supercpt, array($secondtax) );

    }

?>