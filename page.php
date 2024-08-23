<?php
get_header();
?>
    <main id="main-content" class="site-main">
        <?php if ( have_posts() ) : ?>


            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) :
                the_post();
                //  the_content();
                get_template_part('template-parts/content', 'page');

                ?>

            <?php endwhile; ?>


        <?php else : ?>

            <?php get_template_part( 'no-results', 'index' ); ?>

        <?php endif; ?>
    </main><!-- #main -->
<?php

get_footer();