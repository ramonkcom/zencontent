<header
    class="js-main-header transition-opacity duration-200 z-10 flex items-center justify-between h-[3.5rem] md:h-[5rem] px-4 level-1 shadow-md">
    <div class="flex flex-col">
        <a href="<?php echo home_url(); ?>" class="leading-none inline-block">
            <?php
            $default_logo_id = get_theme_mod('custom_logo');
            $default_logo = wp_get_attachment_image_src($default_logo_id, 'full');
            $dark_mode_logo_id = get_theme_mod('dark_mode_logo');
            $dark_mode_logo = wp_get_attachment_image_src($dark_mode_logo_id, 'full');
            ?>
            <?php if ($default_logo): ?>
                <img src="<?php echo $default_logo[0]; ?>" alt="<?php bloginfo('name'); ?>"
                    class="inline-block dark:hidden h-[1.5rem] w-auto" />
                <?php if ($dark_mode_logo): ?>
                    <img src="<?php echo $dark_mode_logo[0]; ?>" alt="<?php bloginfo('name'); ?>"
                        class="h-[1.5rem] w-auto hidden dark:inline-block" />
                <?php endif; ?>
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

    <div class="flex items-center">
        <?php
        if (has_nav_menu('main_menu')) {
            wp_nav_menu(
                array(
                    'container' => 'nav',
                    'container_class' => 'main-menu hidden md:block flex',
                    'menu_class' => 'font-sans font-bold md:flex md:justify-between md:space-x-4 leading-relaxed',
                    'theme_location' => 'main_menu'
                )
            );
        }
        ?>
        <button
            class="js-theme-switcher btn p-[.625rem] mr-2 md:mr-0 md:ml-4 md:text-stone-500 md:hover:text-stone-800 md:dark:text-stone-400 md:dark:hover:text-stone-100"
            title="<?php _e('Toggle theme', 'zencontent'); ?>" aria-label="<?php _e('Toggle theme', 'zencontent'); ?>">
            <span class="dark:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width=".75rem" height=".75rem" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                </svg>
            </span>
            <span class="hidden dark:inline">
                <svg xmlns="http://www.w3.org/2000/svg" width=".75rem" height=".75rem" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                        d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                </svg>
            </span>
        </button>
        <button class="js-menu-toggle btn p-[.5rem] md:hidden">
            <span class="js-menu-toggle__open-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </span>
            <span class="js-menu-toggle__close-icon hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                </svg>
            </span>
        </button>
    </div>
</header>

<nav
    class="js-menu hidden px-4 font-bold text-right fixed z-10 top-[3.5rem] left-0 w-full h-full transition-opacity opacity-0 duration-200 text-3xl leading-relaxed bg-stone-300/90 dark:bg-stone-700/90  py-[1rem] md:hidden">
    <?php
    if (has_nav_menu('main_menu')) {
        wp_nav_menu(
            array(
                'menu_class' => 'font-sans w-full',
                'theme_location' => 'main_menu'
            )
        );
    }
    ?>
</nav>