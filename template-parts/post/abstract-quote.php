<header class="narrow">
    <div class="mb-[1rem]">
        <?php get_template_part('template-parts/post/meta', 'categories'); ?>
    </div>
    <h2 class="specific font-sans font-bold text-base text-stone-500 dark:text-stone-500 hidden">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>
</header>

<main class="container my-[1rem]">
    <?php the_content(); ?>
</main>

<footer class="narrow mt-[1rem]">
    <?php get_template_part('template-parts/post/meta', 'tags'); ?>
<footer>