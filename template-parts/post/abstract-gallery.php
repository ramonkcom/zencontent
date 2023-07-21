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
    <h2>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>
</header>
<main>
    <?php echo $post_content; ?>
</main>