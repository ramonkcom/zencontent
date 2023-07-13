<?php get_header() ?>

<div class="container">
    <?php get_search_form(); ?>

    <div class="bg-yellow-500 text-black">
        <?php if (is_home()): ?>
            <p>This is home.</p>
        <?php elseif (is_search()): ?>
            <p>This is search for
                <?php echo get_search_query(); ?>.
            </p>
        <?php elseif (is_category()): ?>
            <p>This is category
                <?php single_cat_title(); ?>.
            </p>
            <?php if (!empty($cat_description = category_description())): ?>
                <p>
                    <?php echo $cat_description; ?>
                </p>
            <?php endif; ?>
        <?php elseif (is_tag()): ?>
            <p>This is tag
                <?php single_tag_title(); ?>.
            </p>
            <?php if (!empty($tag_description = tag_description())): ?>
                <p>
                    <?php echo $tag_description; ?>
                </p>
            <?php endif; ?>
        <?php endif ?>
    </div>

    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <?php $format = get_post_format() ? get_post_format() : 'standard'; ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('border-t border-b border-stone-400 dark:border-stone-800 py-4 mt-[-1px]'); ?>>
                <?php echo zenc_get_format_icon($format, 32); ?>
                <?php get_template_part('template-parts/post/abstract', $format); ?>
                <?php get_template_part('template-parts/meta', ''); ?>
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