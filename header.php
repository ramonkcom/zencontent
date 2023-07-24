<!DOCTYPE html>
<html <?php language_attributes(); ?> class="text-[16px] lg:text-[20px]">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script type="text/javascript">
        function setTheme(theme) {
            const currentTheme = document.documentElement.dataset.theme || 'light';
            if (theme === currentTheme) return theme;

            document.documentElement.classList.remove(currentTheme);
            document.documentElement.classList.add(theme);
            document.documentElement.dataset.theme = theme;
            localStorage.setItem('theme', theme);
            return theme
        }

        function getSavedTheme() {
            const theme = localStorage.getItem('theme');
            if (!theme) return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            else return theme;
        }

        const theme = getSavedTheme();
        setTheme(theme);
    </script>
    <style>
        :root {
            --color-highlight: rgb(234, 179, 8)
        }

        ::selection {
            background-color: var(--color-highlight);
            color: black;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class('flex flex-col min-h-screen'); ?>>
    <?php wp_body_open(); ?>

    <a class="skip-link screen-reader-text" href="#content">
        <?php
        /* translators: Hidden accessibility text. */
        esc_html_e('Skip to content', 'zenc');
        ?>
    </a>

    <?php get_template_part('template-parts/header'); ?>

    <main id="content" class="site-content flex-grow">