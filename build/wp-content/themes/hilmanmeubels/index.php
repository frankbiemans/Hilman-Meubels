<?php get_header(); ?>

        <div class="col-sm-10 col-md-7 col-lg-6">
            <article>
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
            </article>
        </div>


    <?php get_footer(); ?>
