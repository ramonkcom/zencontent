<header class="sticky z-10 top-0 flex items-center justify-between h-[3.5rem] md:h-[5rem] px-4 level-1">
    <div class="flex flex-col">
        <a href="<?php echo home_url(); ?>" class="leading-none inline-block">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            if ($logo):
                ?>
                <img src="<?php echo $logo[0]; ?>" alt="<?php bloginfo('name'); ?>"
                    class="inline-block h-[1.5rem] w-auto" />
            <?php else: ?>
                <span class="inline-block text-2xl leading-[1.5rem] font-sans font-bold">
                    <?php bloginfo('name'); ?>
                </span>
            <?php endif; ?>
        </a>
        <?php if (get_theme_mod('show_tagline', false)): ?>
            <span class="font-sans mt-[.5em] leading-none text-xs hidden md:block">
                <?php bloginfo('description'); ?>
            </span>
        <?php endif ?>
    </div>

    <div>
        <?php
        wp_nav_menu(
            array(
                'container' => 'nav',
                'container_class' => 'hidden md:block flex',
                'menu_class' => 'font-sans md:flex md:justify-between md:space-x-4',
                'theme_location' => 'main_menu'
            )
        );
        ?>

        <button class="js-menu-open btn p-[.5rem] md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>
        <button class="js-menu-close btn hidden p-[.5rem] md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
            </svg>
        </button>
    </div>
</header>

<nav
    class="js-menu hidden px-4 font-bold text-right fixed z-10 top-[3.5rem] left-0 w-full h-full transition-opacity opacity-0 text-3xl leading-relaxed bg-stone-300/90 dark:bg-stone-700/90  py-[1rem] md:hidden">
    <?php
    wp_nav_menu(
        array(
            'menu_class' => 'font-sans w-full',
            'theme_location' => 'main_menu'
        )
    );
    ?>
</nav>