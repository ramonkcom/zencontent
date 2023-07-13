<aside class="text-xs font-mono font-normal text-stone-600 dark:text-stone-40 flex space-x-4 flex-wrap">
    <div>
        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
            <?php echo get_the_date(); ?>
        </a>
    </div>
    <?php if ($categories = get_the_category()): ?>
        <div>
            <ul class="flex space-x-2 ">
                <?php foreach ($categories as $category): ?>
                    <li><a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif ?>
    <?php if ($tags = get_the_tags()): ?>
        <div>
            <ul class="flex space-x-2">
                <?php foreach ($tags as $tag): ?>
                    <li><a href="<?php echo get_tag_link($tag->term_id) ?>"> #<?php echo $tag->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</aside>