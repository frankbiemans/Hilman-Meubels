<?php get_header(); ?>

<div class="col-sm-10 col-xs-12">
    <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); 
                    ?>
                    <article>
                        <?php the_content(); ?>
                    </article>
                <?php
            } // end while
        } // end if
    ?>

    <section class="project-category-overview">
        <div class="row">
            <?php 
                $i = 0;
                $terms = get_terms( 'category', array(
                    'hide_empty' => true,
                    'exclude' => 1
                ) );
                foreach($terms as $term){
                    $i++;
                    ?>
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <div class="term-wrapper">
                                <h3><?php echo $term->name; ?></h3>
                                <?php show_projects_by_term_id($term->term_id); ?>
                            </div>
                        </div>

                        <?php if($i % 6 === 0){ ?>  <div class="clearfix visible-lg"></div> <?php } ?>
                        <?php if($i % 4 === 0){ ?>  <div class="clearfix visible-md"></div> <?php } ?>
                        <?php if($i % 3 === 0){ ?>  <div class="clearfix visible-sm"></div> <?php } ?>

                    <?php
                }
            ?>
        </div>
    </section>
</div>

<?php get_footer(); ?>
