<?php
$post_content = get_the_content();
$link_pattern = '/<a\s+[^>]*href=[\'"]([^\'"]+)[\'"][^>]*>(.*?)<\/a>/i';

preg_match($link_pattern, $post_content, $matches);
$link = '';

if (!empty($matches) && isset($matches[1])) {
    $link = esc_url($matches[1]);
    $post_content = preg_replace($link_pattern, '', $post_content, 1);
}

$thumbnail_id = get_post_thumbnail_id();
$image_full_url = '';

if ($thumbnail_id) {
    $image_full_url = wp_get_attachment_image_src($thumbnail_id, 'full');
    if ($image_full_url) {
        $image_full_url = $image_full_url[0];
    }
}
?>

<div class="flex flex-col">
    <header class="narrow mt-[1.5em] order-2">
        <div class="mb-[1.5em]">
            <?php get_template_part('template-parts/post/meta', 'categories'); ?>
        </div>
        <h2>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
    </header>

    <main class="wide order-1">
        <?php if ($link): ?>
            <a href="<?php echo $link; ?>" target="_blank" title="<?php echo $matches[2]; ?>" style="background-image:url(<?php echo $image_full_url; ?>)" class="block rounded-lg bg-center text-stone-200 dark:text-stone-200 hover:text-white dark:hover:text-white border-none">
                <div class="flex flex-col justify-center rounded-lg px-[3rem] w-full h-[10rem] bg-gradient-to-tr from-stone-950 to-transparent">
                    <div class="font-sans font-bold text-2xl"><?php echo $matches[2]; ?></div>
                    <p class="leading-tight"><?php echo wp_strip_all_tags(get_the_excerpt()); ?></p>
                </div>
            </a>    
        <?php endif; ?>
    </main>
        
    <aside class="container order-3">
        <?php echo $post_content; ?>
    </aside>

    <footer class="narrow mt-[1rem] order-last">
        <?php get_template_part('template-parts/post/meta', 'tags'); ?>
    <footer>
</div>