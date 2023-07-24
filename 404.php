<?php get_header() ?>
<div class="max-w-[58rem] wide mx-auto px-4 py-[6rem] mt-0 text-center">
    <h1 class="mb-[.25em]">
        <?php _e('Page not found', 'zencontent'); ?>
    </h1>
    <p class="text-xl md:text-2xl">
        <?php _e("The page you're looking for doesn't exist. Maybe it never existed or maybe it was moved to another URL. Please, check the typed address or use the search below.", 'zencontent'); ?>
    </p>
    <div class="container mt-[2rem]">
        <?php get_search_form(); ?>
    </div>
</div>

<?php get_footer() ?>