<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-stone-300 font-stone-700 dark:bg-stone-700 dark:text-stone-300 font-light'); ?>>
    <?php wp_body_open(); ?>

    <a class="skip-link screen-reader-text" href="#content">
        <?php
        /* translators: Hidden accessibility text. */
        esc_html_e('Skip to content', 'zencontent');
        ?>
    </a>

    <?php get_template_part('template-parts/header'); ?>

    <main id="content" class="site-content">