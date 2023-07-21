<header>
    <h2 class="specific font-sans font-bold text-base">
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

<main class="-mt-[1rem] text-2xl leading-snug">
    <?php the_content(); ?>
</main>