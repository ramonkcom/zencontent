<?php get_header() ?>

<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>
        <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail($size = 'post-thumbnail', array('class' => 'w-full'));
            }
            ?>
            <div class="py-[6rem] max-w-[58rem] mx-auto">
                <header class="narrow">
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                </header>
                <main class="container">
                    <?php the_content(); ?>
                </main>
            </div><!-- .container -->
        </article>
    <?php endwhile; ?>
<?php else: ?>
    <div class="container">
        <p>
            <?php _e('Page not found.', 'zencontent'); ?>
        </p>
    </div><!-- .container -->
<?php endif; ?>

<?php get_footer() ?>