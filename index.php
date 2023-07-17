<?php get_header() ?>
<div class="container py-[4em]">
    <div>
        <?php get_search_form(); ?>
    </div>

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
</div><!-- .container -->

<?php if (have_posts()):
    while (have_posts()):
        the_post();
        $format = get_post_format() ? get_post_format() : 'standard'; ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('py-[4em] lg:mx-auto max-w-screen-lg border-t border-stone-400 dark:border-stone-600 border-dotted rounded post-abstract'); ?>>
            <div class="container">
                <div class="mb-[1.5em]">
                    <?php get_template_part('template-parts/post/meta', 'categories'); ?>
                </div>
                <?php get_template_part('template-parts/post/abstract', $format); ?>
                <footer class="mt-[1.5em]">
                    <?php get_template_part('template-parts/post/meta', 'tags'); ?>
                </footer>
                <div><!-- .container -->
        </article>
    <?php endwhile; ?>
    <nav class="container py-[4em] border-t border-stone-400 dark:border-stone-600">
    <?php get_template_part('template-parts/pagination', '', array('context' => 'loop')); ?>
    </nav>
<?php else: ?>
    <div class="container py-[4em]">
        <p>
            <?php _e('No posts found.', 'zencontent'); ?>
        </p>
    </div><!-- .container -->
<?php endif; ?>
<?php get_footer() ?>