<?php get_header() ?>
<div class="max-w-[58rem] mx-auto py-[4rem] border-b border-dotted border-stone-500 dark:border-stone-500">
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
        <article id="post-<?php the_ID(); ?>" <?php post_class('relative lg:mx-auto max-w-[58rem] post-abstract my-[6rem]'); ?>>
            <span
                class="absolute opacity-75 dark:opacity-100 hover:opacity-100 transition-all p-[1rem] rounded rouded-full border border-stone-400 hover:border-stone-700 text-stone-400 hover:text-stone-700 dark:border-stone-600 dark:text-stone-600 dark:hover:border-stone-300 dark:hover:text-stone-300 top-0 mt-[.5rem]">
                <?php echo zenc_get_format_icon($format, '1.5rem'); ?>
            </span>
            <div class="container">
                <div class="mb-[1rem]">
                    <?php get_template_part('template-parts/post/meta', 'categories'); ?>
                </div>
                <?php get_template_part('template-parts/post/abstract', $format); ?>
                <footer class="mt-[1rem]">
                    <?php get_template_part('template-parts/post/meta', 'tags'); ?>
                </footer>
                <div><!-- .container -->
        </article>
    <?php endwhile; ?>
    <nav class="max-w-[58rem] mx-auto py-[4rem] border-t border-dotted border-stone-500 dark:border-stone-500">
    <?php get_template_part('template-parts/pagination', '', array('context' => 'loop')); ?>
    </nav>
<?php else: ?>
    <div class="container py-[4rem]">
        <p>
            <?php _e('No posts found.', 'zencontent'); ?>
        </p>
    </div><!-- .container -->
<?php endif; ?>
<?php get_footer() ?>