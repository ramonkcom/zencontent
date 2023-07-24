</main> <!-- #content -->

<footer
    class="level-1 flex-column md:flex justify-between py-[1rem] px-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,.1),0_-2px_4px_-2px_rgba(0,0,0,.1)] z-20 relative">
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
<button class="js-scroll-to-top btn p-[.625rem] fixed bottom-[1rem] right-4 transition-opacity duration-200 z-10"
    style="opacity:0">
    <svg xmlns="http://www.w3.org/2000/svg" width=".75rem" height=".75rem" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
    </svg>
</button>

<?php wp_footer(); ?>
</body>

</html>