<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="sr-only">
            <?php _e('Pesquisar:', 'zencontent'); ?>
        </span>
        <input type="search" class="font-mono text-sm font-normal rounded py-2 px-2"
            placeholder="<?php _e('Type your search term...', 'zencontent'); ?>"
            value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="btn">
        <?php _e('Search', 'zencontent'); ?>
    </button>
</form>