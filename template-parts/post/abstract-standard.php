<header>
    <h2>
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>
</header>

<main>
    <?php the_content(); ?>
    <?php get_template_part('template-parts/pagination', '', array('context' => 'post')); ?>
</main>