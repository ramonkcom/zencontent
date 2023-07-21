<header class="narrow">
    <div class="mb-[1rem]">
        <?php get_template_part('template-parts/post/meta', 'categories'); ?>
    </div>
    <h2 class="specific font-sans font-bold text-base text-stone-500 dark:text-stone-500">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php
            $title = get_the_title();
            if (preg_match('/[a-zA-Z0-9]$/', $title)) {
                $title .= ':';
            }
            echo $title;
            ?>
        </a>
    </h2>
</header>

<main class="container my-[1rem] text-2xl leading-snug">
    <?php the_content(); ?>
</main>

<footer class="narrow mt-[1rem]">
    <?php get_template_part('template-parts/post/meta', 'tags'); ?>
<footer>