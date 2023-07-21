<?php
$post_content = get_the_content();
$embed_block_pattern = '/<!--\s*wp:embed\b(.*?)\s*-->.*?<!--\s*\/wp:embed\s*-->/s';
preg_match($embed_block_pattern, $post_content, $matches);
$post_content = preg_replace($embed_block_pattern, '', $post_content);
$embed_block = empty($matches) ? null : $matches[0];
?>

<?php if ($embed_block): ?>
    <?php echo apply_filters('the_content', $embed_block); ?>
<?php endif; ?>
<header class="mt-[1.5em]">
    <h1>
        <?php the_title(); ?>
    </h1>
</header>
<main>
    <?php echo $post_content; ?>
</main>