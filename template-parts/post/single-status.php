<header class="narrow mb-[1em]">
    <div class="mb-[1.5em]">
        <?php get_template_part('template-parts/post/meta', 'categories'); ?>
    </div>
    <h1 class="specific font-sans font-bold text-base">
        <?php
        $title = get_the_title();
        if (preg_match('/[a-zA-Z0-9]$/', $title)) {
            $title .= ':';
        }
        echo $title;
        ?>
    </h1>
</header>

<main class="container text-2xl leading-snug">
    <?php the_content(); ?>
</main>

<footer class="narrow mt-[1.5em]">
    <?php get_template_part('template-parts/post/meta', 'tags'); ?>
</footer>