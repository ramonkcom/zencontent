<header>
    <h2>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>
</header>

<main>
    <?php the_content(); ?>
</main>