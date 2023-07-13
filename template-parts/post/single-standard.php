<?php
$title = get_the_title();

if (wp_link_pages(array('echo' => 0))) {
    $page = get_query_var('page');
    $page = $page > 0 ? $page : 1;
    $title .= ' <span class="post-title-part">' . __('Part') . ' (' . $page . ')</span>';
}
?>

<h1 class="text-6xl font-medium">
    <?php echo $title; ?>
</h1>

<?php the_content(); ?>
<?php get_template_part('template-parts/pagination', '', array('context' => 'post')); ?>