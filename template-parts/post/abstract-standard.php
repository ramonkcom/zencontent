<h2>
    <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
    </a>
</h2>

<?php the_content(); ?>
<?php get_template_part('template-parts/pagination', '', array('context' => 'post')); ?>