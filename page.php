<?php get_header() ?>

<?php
if (has_post_thumbnail()) {
    the_post_thumbnail($size = 'post-thumbnail', array('class' => 'w-full'));
}
?>

<div class="container">
    <?php if (have_posts()):
        while (have_posts()): ?>
            <article id="page-<?php the_ID(); ?>" <?php post_class('py-4'); ?>>
                <?php
                the_post();
                $format = get_post_format() ? get_post_format() : 'standard';
                get_template_part('template-parts/post/single', $format);
                ?>
            </article>
        <?php endwhile; ?>
    <?php else: ?>
        <p>
            <?php _e('Page not found.', 'zencontent'); ?>
        </p>
    <?php endif; ?>
</div>

<?php get_footer() ?>