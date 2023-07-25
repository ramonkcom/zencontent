<?php get_header() ?>

<?php if (have_posts()):
    while (have_posts()):
        the_post();
        $format = get_post_format() ? get_post_format() : 'standard';
        $format_classes = 'post-single-' . $format . ' post-' . $format;
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('py-[6rem] mx-auto max-w-[58rem] post-single ' . $format_classes); ?>>
            <?php get_template_part('template-parts/post/single', $format); ?>
        </article>
        <?php get_template_part('template-parts/pagination', '', array('context' => 'single')); ?>
    <?php endwhile; ?>
<?php else: ?>
    <div class="max-w-[58rem] py-[4em] mx-auto">
        <p><?php _e('Post not found.', 'zencontent'); ?></p>
    </div>
<?php endif; ?>

<?php get_footer() ?>