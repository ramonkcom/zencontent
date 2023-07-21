<header>
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

<main class="-mt-[1rem] text-2xl leading-snug">
    <?php the_content(); ?>
</main>