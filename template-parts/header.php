<div class="flex items-center justify-between py-[1rem] px-4 level-1">
    <div class="flex flex-col">
        <a href="<?php echo home_url(); ?>" class="leading-none">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            if ($logo):
                ?>
                <img src="<?php echo $logo[0]; ?>" alt="<?php bloginfo('name'); ?>"
                    class="inline-block h-[1.5rem] w-auto" />
            <?php else: ?>
                <span class="text-2xl font-sans font-bold leading-none">
                    <?php bloginfo('name'); ?>
                </span>
            <?php endif; ?>
        </a>
        <span class="font-sans mt-1 leading-none text-xs hidden lg:block">
            <?php bloginfo('description'); ?>
        </span>
    </div>
    <div>
        <?php
        wp_nav_menu(
            array(
                'container' => 'nav',
                'container_class' => 'fixed left-0 top-0 w-full h-full flex lg:static level-1 lg:bg-transparent opacity-95 lg:opacity-100 z-10',
                'menu_class' => 'font-sans lg:flex lg:justify-between lg:space-x-4',
                'theme_location' => 'main_menu'
            )
        );
        ?>
    </div>
</div>