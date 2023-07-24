<header class="narrow">
    <div class="mb-[1.5em]">
        <?php get_template_part('template-parts/post/meta', 'categories'); ?>
    </div>
    <h1>
        <?php the_title(); ?>
    </h1>
</header>

<main class="container">
    <?php the_content(); ?>
</main>

<footer class="narrow mt-[1.5em]">
    <?php get_template_part('template-parts/post/meta', 'tags'); ?>
</footer>