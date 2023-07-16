<?php get_header() ?>

<?php if (have_posts()):
    while (have_posts()): ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('py-4 post-single'); ?>>
            <div class="container py-16">
                <?php
                the_post();
                $format = get_post_format() ? get_post_format() : 'standard';
                get_template_part('template-parts/post/single', $format);
                ?>
                <?php get_template_part('template-parts/meta', ''); ?>
                <?php get_template_part('template-parts/pagination', '', array('context' => 'single')); ?>
            </div><!-- .container -->
        </article>
    <?php endwhile; ?>
<?php else: ?>
    <div class="container py-16">
        <p>
            <?php _e('Post not found.', 'zencontent'); ?>
        </p>
    </div><!-- .container -->
<?php endif; ?>

<?php get_footer() ?>