<div class="flex flex-col">
    <header class="narrow mt-[1.5em] order-2">
        <div class="mb-[1.5rem]">
            <?php get_template_part('template-parts/post/meta', 'categories'); ?>
        </div>
        <h1>
            <?php the_title(); ?>
        </h1>
    </header>

    <main class="wide order-1">
        <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail($size = 'post-thumbnail', array('class' => 'w-full rounded-lg overflow-hidden'));
            }
        ?>
    </main>

    <aside class="container order-3">
        <?php the_content(); ?>
    </aside>

    <footer class="narrow mt-[1.5rem] order-last">
        <?php get_template_part('template-parts/post/meta', 'tags'); ?>
    <footer>
</div>