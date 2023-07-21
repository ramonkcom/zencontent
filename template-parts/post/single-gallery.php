<?php
$post_content = get_the_content();
$gallery_block_pattern = '/<!--\s*wp:gallery\b(.*?)\s*-->.*?<!--\s*\/wp:gallery\s*-->/s';
preg_match($gallery_block_pattern, $post_content, $matches);
$post_content = preg_replace($gallery_block_pattern, '', $post_content);
$gallery_block = empty($matches) ? null : $matches[0];
?>

<?php if ($gallery_block): ?>
    <?php echo apply_filters('the_content', $gallery_block); ?>
<?php endif; ?>
<header class="mt-[1.5em]">
    <h1>
        <?php the_title(); ?>
    </h1>
</header>
<main>
    <?php echo $post_content; ?>
</main>