<?php
get_header();
?>

<!-- THIS FILE IS TO HANDLE OUR CUSTOM POST TYPE ARTICLE AND NOT HAVE TO USE SINGLE.PHP -->

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        while ( have_posts() ) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" class="article">
                <?php
                $title = get_the_title();
                $content = get_the_content();
                ?>
                <div class="article__wrapper">

                    <header class="article__wrapper-header">
                        <?php if($title):?>
                            <h1 class="article__wrapper-header-title"><?php echo $title?></h1>
                        <?php endif?>
                    </header><!-- .entry-header -->

                    <?php if($content):?>
                        <div class="article__wrapper-content">
                            <?php echo $content?>
                        </div>
                    <?php endif?>

                </div>
            </article>

        <?php
        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>
