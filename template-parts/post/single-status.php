<header class="narrow">
    <div class="mb-[1.5rem]">
        <?php get_template_part('template-parts/post/meta', 'categories'); ?>
    </div>
    <h1 class="specific font-sans font-bold text-base text-stone-500 dark:text-stone-500">
        <?php
        $title = get_the_title();
        if (preg_match('/[a-zA-Z0-9]$/', $title)) {
            $title .= ':';
        }
        echo $title;
        ?>
    </h1>
</header>

<main class="container mt-[1rem] text-2xl sm:text-3xl">
    <?php the_content(); ?>
</main>

<footer class="narrow mt-[1.5rem]">
    <?php get_template_part('template-parts/post/meta', 'tags'); ?>
</footer>