<?php get_header() ?>

<?php if (have_posts()):
    while (have_posts()): ?>
        <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail($size = 'post-thumbnail', array('class' => 'w-full'));
            }
            ?>
            <div class="container py-16">
                <?php
                the_post();
                $format = get_post_format() ? get_post_format() : 'standard';
                get_template_part('template-parts/post/single', $format);
                ?>
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