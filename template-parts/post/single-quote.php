<header class="narrow">
    <div class="mb-[1rem]">
        <?php get_template_part('template-parts/post/meta', 'categories'); ?>
    </div>
    <h1 class="specific font-sans font-bold text-base text-stone-500 dark:text-stone-500 hidden">
        <?php the_title(); ?>
    </h1>
</header>

<main class="container my-[1rem]">
    <?php the_content(); ?>
</main>

<footer class="narrow mt-[1rem]">
    <?php get_template_part('template-parts/post/meta', 'tags'); ?>
<footer>