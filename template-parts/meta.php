<?php
$divider_style = 'text-stone-400 dark:text-stone-500';
$divider_char = '|';
$list_style = 'flex space-x-2 list-none';
$li_style = 'p-0 border-none';
$link_style = 'border-none text-stone-400 dark:text-stone-500 font-normal'
    ?>

<aside class="text-[0.75em] font-mono font-normal leading-loose text-stone-600 dark:text-stone-400 mt-4">
    <?php if ($tags = get_the_tags()): ?>
        <div>
            <ul class="<?php echo $list_style; ?>">
                <?php foreach ($tags as $tag): ?>
                    <li class="<?php echo $li_style; ?>"><a href="<?php echo get_tag_link($tag->term_id); ?>"
                            class="<?php echo $link_style; ?>"> #<?php echo $tag->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="flex space-x-2 flex-wrap">
        <div>
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="<?php echo $link_style; ?>">
                <?php echo get_the_date(); ?>
            </a>
        </div>
        <?php if ($categories = get_the_category()): ?>
            <div class="<?php echo $divider_style; ?>"><?php echo $divider_char; ?></div>
            <div>
                <ul class="<?php echo $list_style; ?>">
                    <?php foreach ($categories as $category): ?>
                        <li class="<?php echo $li_style; ?>"><a href="<?php echo get_category_link($category->term_id); ?>"
                                class="<?php echo $link_style; ?>"><?php echo $category->name; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif ?>
    </div>
</aside>