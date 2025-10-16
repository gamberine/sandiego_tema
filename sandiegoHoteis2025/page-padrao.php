<?php
/*
Template Name: Página Padrão
*/
get_header('sem-banner'); ?>


<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php
        get_template_part('template-parts/content/content', 'padrao');
        ?>
    <?php endwhile; ?>
<?php endif; ?>
</main>

<!-- < ?php get_sidebar(); ?> -->
<?php get_footer(); ?>