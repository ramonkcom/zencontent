<?php get_header() ?>
<div
    class="max-w-[58rem] mx-auto py-[4rem] px-[1rem] border-b border-dotted border-stone-500 dark:border-stone-500 text-center">
    <?php if (is_home()): ?>
        <h1 class="mb-[.25em]">
            <?php echo bloginfo('title') ?>
        </h1>
        <?php if (!empty($long_desc = trim(get_theme_mod('blog_long_description', '')))): ?>
            <p class="text-xl md:text-2xl">
                <?php echo $long_desc; ?>
            </p>
        <?php endif; ?>
    <?php elseif (is_search()): ?>
        <?php $search_query = trim(get_search_query()); ?>
        <h1 class="mb-[.25em]">
            <?php echo '"' . $search_query . '"'; ?>
        </h1>
        <p class="text-xl md:text-2xl">
            <?php echo __('Below, all the results found for the search term ') . '"' . $search_query . '".' ?>
        </p>
    <?php elseif (is_category()): ?>
        <h1 class="mb-[.25em]">
            <?php single_cat_title(); ?>
        </h1>
        <?php if (!empty($cat_description = category_description())): ?>
            <p class="text-xl md:text-2xl">
                <?php echo wp_strip_all_tags($cat_description); ?>
            </p>
        <?php endif; ?>
    <?php elseif (is_tag()): ?>
        <h1 class="mb-[.25em]">
            <?php single_tag_title(); ?>
        </h1>
        <?php if (!empty($tag_description = tag_description())): ?>
            <p class="text-xl md:text-2xl">
                <?php echo wp_strip_all_tags($tag_description); ?>
            </p>
        <?php endif; ?>
    <?php endif ?>

    <div class="mt-[2rem]">
        <?php get_search_form(); ?>
    </div>
</div><!-- .container -->

<?php if (have_posts()):
    while (have_posts()):
        the_post();
        $format = get_post_format() ? get_post_format() : 'standard'; ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('relative lg:mx-auto max-w-[58rem] my-[6rem] group post-abstract'); ?>>
            <span
                class="inline-block mb-[1rem] ml-4 md:absolute md:opacity-75 group-hover:opacity-100 group-hover:text-stone-700 group-hover:border-stone-700 dark:group-hover:text-stone-300 dark:group-hover:border-stone-300 dark:opacity-100 hover:opacity-100 transition-all duration-200 p-[1rem] rounded rouded-full border md:border-stone-400 border-stone-400 hover:border-stone-700 text-stone-400 md:text-stone-400 dark:border-stone-500 dark:text-stone-500 md:dark:border-stone-500 md:dark:text-stone-500 md:dark:hover:border-stone-300 md:dark:hover:text-stone-300 top-0 mt-[.5rem]">
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