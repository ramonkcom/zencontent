<div class="flex items-center font-mono text-stone-400 dark:text-stone-500 uppercase text-xs">
    <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"
        class="border-none text-stone-400 hover:text-stone-700 dark:text-stone-500 dark:hover:text-stone-300">
        <?php echo get_the_date(); ?>
    </a>
    <?php if ($categories = get_the_category()): ?>
        <span>&nbsp;</span>
        <?php _e('in', 'zencontent'); ?>
        <span>&nbsp;</span>
        <ul class="inline-flex space-x-2 list-none mt-0">
            <?php foreach ($categories as $category): ?>
                <li class="p-0 border-none">
                    <a href="<?php echo get_category_link($category->term_id); ?>"
                        class="font-normal border-none text-stone-400 hover:text-stone-700 dark:text-stone-500 dark:hover:text-stone-300">
                        <?php echo $category->name; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif ?>
</div>