<?php get_header() ?>

<?php if (have_posts()):
    while (have_posts()):
        the_post();
        $format = get_post_format() ? get_post_format() : 'standard';
        $format_classes = 'post-single-' . $format . ' post-' . $format;
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('py-[4em] post-single ' . $format_classes); ?>>
            <div class="container">
                <div class="mb-[1.5em]">
                    <?php get_template_part('template-parts/post/meta', 'categories'); ?>
                </div>
                <?php get_template_part('template-parts/post/single', $format); ?>
                <footer class="mt-[1.5em]">
                    <?php get_template_part('template-parts/post/meta', 'tags'); ?>
                </footer>
            </div><!-- .container -->
        </article>
        <nav class="container py-[4em] border-t border-stone-400 dark:border-stone-600">
            <?php get_template_part('template-parts/pagination', '', array('context' => 'single')); ?>
        </nav>
    <?php endwhile; ?>
<?php else: ?>
    <div class="container py-[4em]">
        <p>
            <?php _e('Post not found.', 'zencontent'); ?>
        </p>
    </div><!-- .container -->
<?php endif; ?>

<?php get_footer() ?>