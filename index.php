<?php get_header() ?>

<div class="container">
    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <?php $format = get_post_format() ? get_post_format() : 'standard'; ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('border-t border-b border-stone-400 dark:border-stone-800 py-4 mt-[-1px]'); ?>>
                <?php echo get_format_icon($format, 32); ?>
                <?php get_template_part('template-parts/post/abstract', $format); ?>
            </article>
        <?php endwhile; ?>
    <?php get_template_part('template-parts/pagination', '', array('context' => 'loop')); ?>
    <?php else: ?>
        <p>
            <?php _e('No posts found.', 'zencontent'); ?>
        </p>
    <?php endif; ?>
</div>

<?php get_footer() ?>