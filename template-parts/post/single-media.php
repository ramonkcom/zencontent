<?php
$post_content = get_the_content();
preg_match($args['block_pattern'], $post_content, $matches);
$post_content = preg_replace($args['block_pattern'], '', $post_content);
$block = empty($matches) ? null : $matches[0];
?>

<?php if ($block): ?>
    <?php echo apply_filters('the_content', $block); ?>
<?php endif; ?>
<header class="mt-[1.5em]">
    <h1>
        <?php the_title(); ?>
    </h1>
</header>
<main>
    <?php echo $post_content; ?>
</main>