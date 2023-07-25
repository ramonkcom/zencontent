<?php if ($args['context'] === 'loop'): ?>
    <?php 
    $previous_posts_link = get_previous_posts_link();
    $next_posts_link = get_next_posts_link();

    if ($previous_posts_link || $next_posts_link) :
    ?>
    <nav class="max-w-[58rem] mx-auto py-[4rem] px-4 border-t border-dotted border-stone-400 dark:border-stone-500">
        <div class="flex justify-between">
            <div>
                <?php
                if ($previous_posts_link):
                    $previous_url = esc_url(get_previous_posts_page_link());
                    $previous_label = __('← Newer posts', 'zencontent');
                    ?>
                    <a href="<?php echo $previous_url; ?>" title="<?php $previous_label; ?>" class="btn">
                        <?php echo $previous_label; ?>
                    </a>
                <?php endif; ?>
            </div>
            <div>
                <?php
                if ($next_posts_link):
                    $next_url = esc_url(get_next_posts_page_link());
                    $next_label = __('Older posts →', 'zencontent');
                    ?>
                    <a href="<?php echo $next_url; ?>" title="<?php $next_label; ?>" class="btn">
                        <?php echo $next_label; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <?php endif; ?>
<?php elseif ($args['context'] === 'post'): ?>
    <?php
    if (wp_link_pages(array('echo' => 0))) {
        $args = array(
            'before' => '<nav class="font-sans flex space-x-1 mt-4"><span class="font-normal">' . __('Parts:', 'zencontent') . '</span>',
            'after' => '</nav>',
            'pagelink' => '%',
            'nextpagelink' => __('Next part'),
            'previouspagelink' => __('Previous part'),
        );
        wp_link_pages($args);
    }
    ?>
<?php elseif ($args['context'] === 'single'): ?>
    <?php
    function format_label($label, $previous = false, $max_len = 0)
    {
        $DEFAULT_LABEL_MAX_LEN = 25;
        $max_len = $max_len > 0 ? $max_len : $DEFAULT_LABEL_MAX_LEN;
        $label = strlen($label) < $max_len ? $label : substr($label, 0, $max_len) . '…';
        return $previous ? '← ' . $label : $label . ' →';
    }
    $previous_post = get_adjacent_post(false, '', false);
    $next_post = get_adjacent_post(false, '', true);
    if ($previous_post || $next_post) :
    ?>
    <nav class="max-w-[58rem] mx-auto py-[4rem] px-4 border-t border-dotted border-stone-400 dark:border-stone-500">
        <div class="flex justify-between">
            <div>
                <?php
                if ($previous_post):
                    $previous_url = get_permalink($previous_post);
                    $previous_label = format_label($previous_post->post_title, true);
                    ?>
                    <a href="<?php echo $previous_url; ?>" title="<?php $previous_label; ?>" class="btn">
                        <?php echo $previous_label; ?>
                    </a>
                <?php endif; ?>
            </div>
            <div>
                <?php
                if ($next_post):
                    $next_url = get_permalink($next_post);
                    $next_label = format_label($next_post->post_title, false);
                    ?>
                    <a href="<?php echo $next_url; ?>" title="<?php $next_label; ?>" class="btn">
                        <?php echo $next_label; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <?php endif; ?>
<?php endif; ?>