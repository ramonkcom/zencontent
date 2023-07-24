<header class="narrow">
    <div class="mb-[1rem]">
        <?php get_template_part('template-parts/post/meta', 'categories'); ?>
    </div>
    <h2>
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>
</header>

<main class="container">
    <?php the_content(); ?>
    <?php get_template_part('template-parts/pagination', '', array('context' => 'post')); ?>
</main>

<footer class="narrow mt-[1rem]">
    <?php get_template_part('template-parts/post/meta', 'tags'); ?>
<footer>