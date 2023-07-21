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
    <h2>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>
</header>
<main>
    <?php echo $post_content; ?>
</main>