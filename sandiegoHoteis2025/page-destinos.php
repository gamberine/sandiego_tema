<?php
/*
Template Name: Destinos
*/
get_header(); ?>



<?php get_template_part('template-parts/arquivo-destinos-preferidos'); ?>
<?php get_template_part('template-parts/arquivo-novidades'); ?>
<?php get_template_part('template-parts/arquivo-destinos-perfil'); ?>
<?php get_template_part('template-parts/arquivo-galeria'); ?>
<?php get_template_part('template-parts/arquivo-depoimentos'); ?>

<!-- < ?php get_template_part('template-parts/arquivo-destino-filtro-tipo-viagem'); ?>  -->


<!-- Gallery Section -->
<!-- <section class="galeriaDestinos py-5">
    <h2 class="text-center">< ?php echo esc_html(get_field('titulo_sessao_galeria')); ?></h2>
    <div class="row">
        < ?php if (have_rows('galeria_fotos')): ?>
            < ?php while (have_rows('galeria_fotos')): the_row(); ?>
                <div class="col-xxl-3 col-lg-4 col-md-6">
                    <img src="< ?php echo esc_url(get_field('imagem_galeria')); ?>" alt="Galeria">
                </div>
            < ?php endwhile; ?>
        < ?php endif; ?>
    </div>
</section> -->


<?php get_footer(); ?>