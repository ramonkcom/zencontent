<?php get_header() ?>

<div class="container">
    <?php if (have_posts()):
        while (have_posts()): ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('py-4'); ?>>
                <?php
                the_post();
                $format = get_post_format() ? get_post_format() : 'standard';
                get_template_part('template-parts/post/single', $format);
                ?>
            </article>
            <?php get_template_part('template-parts/pagination', '', array('context' => 'single')); ?>
        <?php endwhile; ?>
    <?php else: ?>
        <p>
            <?php _e('Post not found.', 'zencontent'); ?>
        </p>
    <?php endif; ?>
</div>

<?php get_footer() ?>