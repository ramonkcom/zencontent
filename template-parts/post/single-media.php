<?php
$post_content = get_the_content();
preg_match($args['block_pattern'], $post_content, $matches);
$post_content = preg_replace($args['block_pattern'], '', $post_content);
$block = empty($matches) ? null : $matches[0];
?>

<div class="flex flex-col">
    <header class="narrow mt-[1.5em] order-2">
        <div class="mb-[1.5rem]">
            <?php get_template_part('template-parts/post/meta', 'categories'); ?>
        </div>
        <h1>
            <?php the_title(); ?>
        </h1>
    </header>

    <main class="wide order-1">
        <?php if ($block): ?>
            <?php echo apply_filters('the_content', $block); ?>
        <?php endif; ?>
    </main>

    <aside class="container order-3">
        <?php echo $post_content; ?>
    </aside>

    <footer class="narrow mt-[1.5rem] order-last">
        <?php get_template_part('template-parts/post/meta', 'tags'); ?>
    <footer>
</div>