<?php
$title = get_the_title();

if (wp_link_pages(array('echo' => 0))) {
    $page = get_query_var('page');
    $page = $page > 0 ? $page : 1;
    $title .= ' - <span class="post-title-part">' . __('part', 'zencontent') . ' ' . $page . '</span>';
}
?>

<header class="narrow">
    <div class="mb-[1.5em]">
        <?php get_template_part('template-parts/post/meta', 'categories'); ?>
    </div>
    <h1>
        <?php echo $title; ?>
    </h1>
</header>

<main class="container">
    <?php the_content(); ?>
    <?php get_template_part('template-parts/pagination', '', array('context' => 'post')); ?>
</main>

<footer class="narrow mt-[1.5em]">
    <?php get_template_part('template-parts/post/meta', 'tags'); ?>
</footer>