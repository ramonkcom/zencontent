<div class="flex items-center justify-between space-x-2 py-2 px-4 level-1">
    <div>

        <h1 class="text-2xl font-bold">
            <a href="<?php echo home_url(); ?>">
                <?php bloginfo('name'); ?>
            </a>
        </h1>
        <span>
            <?php bloginfo('description'); ?>
        </span>
    </div>
    <div>
        <?php
        wp_nav_menu(
            array(
                'container' => 'nav',
                'menu_class' => 'flex justify-between space-x-2 font-sans font-normal',
                'theme_location' => 'main_menu'
            )
        );
        ?>
    </div>
</div>