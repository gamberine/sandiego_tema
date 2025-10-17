<?php get_header(); ?>

<main id="main" class="site-main" role="main">
    <?php if (have_posts()) : ?>
        <section class="gridGradiente">
            <h1 class="title-primary text-white text-center mt-5 pt-5"><?php single_term_title(); ?></h1>
        </section>
        <?php while (have_posts()) : the_post(); ?>
            <?php
            // Include the template for displaying product content
            get_template_part('template-parts/content/content', 'especialidade');
            ?>
        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>

    <?php else : ?>
        <?php get_template_part('template-parts/content/content', 'none'); ?>
    <?php endif; ?>
</main>

<!-- < ?php get_sidebar(); ?> -->
<?php get_footer(); ?>