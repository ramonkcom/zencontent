</main> <!-- #content -->

<footer
    class="level-1 flex-column md:flex justify-between py-[1rem] px-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,.1),0_-2px_4px_-2px_rgba(0,0,0,.1)]">
    <div class="font-sans italic text-stone-500 hover:text-stone-600 dark:text-stone-400 dark:hover:text-stone-300">
        <?php echo get_theme_mod('footer_line'); ?>
    </div>
    <div>
        <a href="http://github.com/ramonkcom/zencontent/" target="_blank" title="Zencontent Theme on GitHub"
            class="font-sans font-bold text-stone-500 hover:text-stone-600 dark:text-stone-400 dark:hover:text-stone-300">
            Zencontent©
            <?php echo date('Y'); ?>
        </a>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>