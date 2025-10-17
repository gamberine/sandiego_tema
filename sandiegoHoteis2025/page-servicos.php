<?php
/* Template Name: Serviços */
get_header(); // Load the header.php file
?>
<section class="gridCinza" id="servicos">
    <div class="container">
        <?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="row text-center">
                    <h1 class="title-primary text-center primary mb-3"><?php echo wp_kses_post(get_field('titulo_sessao_servicos')); ?></h1>
                    <p class="text-color"><?php echo wp_kses_post(get_field('texto_chamada_servicos')); ?></p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
        <div class="row">
            <?php get_template_part('template-parts/arquivo-servicos'); ?>
        </div>
        <?php get_template_part('template-parts/content/component-btn-consultor'); ?>
    </div>
</section>
<?php
get_footer(); // Load the footer.php file
?>