<div class="text-[0.75em] lowercase font-mono leading-snug font-normal text-stone-600 dark:text-stone-400">
    <?php if ($tags = get_the_tags()): ?>
        <ul class="flex flex-wrap space-x-2 list-none">
            <?php foreach ($tags as $tag): ?>
                <li class="p-0 border-none">
                    <a href="<?php echo get_tag_link($tag->term_id); ?>"
                        class="border-none font-normal text-stone-400 hover:text-stone-700 dark:text-stone-500 dark:hover:text-stone-300">
                        #<?php echo str_replace(' ', '_', $tag->name); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>