<form role="search" method="get" class="search-form flex flex-col md:flex-row"
    action="<?php echo esc_url(home_url('/')); ?>">
    <label class="grow">
        <span class="sr-only">
            <?php _e('Search:', 'zenc'); ?>
        </span>
        <input type="search"
            class="font-sans text-sm font-normal rounded-t md:rounded-l md:rounded-r-none py-2 px-2 w-full shadow-inner border border-b-0 md:border-b md:border-r-0 border-stone-400  dark:border-stone-500 bg-stone-200 dark:bg-stone-600 text-stone-700 dark:text-stone-300"
            placeholder="<?php _e('Type your search term...', 'zenc'); ?>"
            value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="btn rounded-b rounded-t-none md:rounded-r md:rounded-l-none">
        <svg xmlns="http://www.w3.org/2000/svg" width=".75em" height=".75em" fill="currentColor" viewBox="0 0 16 16"
            class="inline -mt-[.25em]">
            <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </svg>
        <?php _e('Search', 'zenc'); ?>
    </button>
</form>