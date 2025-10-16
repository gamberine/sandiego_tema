<?php
/*
Template Name: Equipe
*/
get_header(); ?>

<div class="container">

    <!-- Header Section -->
    <section class="header-section text-center text-white">
        <h1><?php echo esc_html(get_field('titulo_principal')); ?></h1>
        <p><?php echo esc_html(get_field('subtitulo')); ?></p>
    </section>

    <!-- Destinos Preferidos Section -->
    <section class="destinosPreferidos py-5">
        <h2 class="text-center"><?php echo esc_html(get_field('titulo_sessao_destinos_preferidos')); ?></h2>
        <div class="row">
            <?php if (have_rows('destinos_preferidos')): ?>
                <?php while (have_rows('destinos_preferidos')): the_row(); ?>
                    <div class="col-xxl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <img src="<?php echo esc_url(get_field('imagem_destino')); ?>" class="card-img-top" alt="Destino">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo esc_html(get_field('titulo_destino')); ?></h5>
                                <p class="card-text"><?php echo wp_kses_post(get_field('descricao_destino')); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="row my-5">
            <?php query_posts("post_type=conteudo&posts_per_page=-1"); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <!-- <button class="btn btnRounded" onclick="window.location.href='< ?php echo esc_url(home_url('/industria-textil')); ?>';"> -->
                    <button class="btn btnRounded" onclick="window.location.href='<?php echo esc_html(get_field('link_btn_orcamento')); ?>';">
                        <!-- < ?php echo esc_html(get_field('titulo_btn_orcamento')); ?> -->
                        titulo botão aqui
                    </button>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </div>
    </section>

    <!-- Novidades Carousel Section -->
    <section class="gridNovidades py-5">
        <h2 class="text-center"><?php echo esc_html(get_field('titulo_sessao_novidades')); ?></h2>
        <div class="slick-carousel">
            <?php if (have_rows('menus')): ?>
                <?php while (have_rows('menus')): the_row(); ?>
                    <div class="novidadeItem">
                        <img src="<?php echo esc_url(get_field('imagem_novidade')); ?>" alt="Novidade">
                        <h5><?php echo esc_html(get_field('titulo_novidade')); ?></h5>
                        <p><?php echo wp_kses_post(get_field('descricao_novidade')); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="galeriaDestinos py-5">
        <h2 class="text-center"><?php echo esc_html(get_field('titulo_sessao_galeria')); ?></h2>
        <div class="row">
            <?php if (have_rows('galeria_fotos')): ?>
                <?php while (have_rows('galeria_fotos')): the_row(); ?>
                    <div class="col-xxl-3 col-lg-4 col-md-6">
                        <img src="<?php echo esc_url(get_field('imagem_galeria')); ?>" alt="Galeria">
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="depoimentos py-5">
        <h2 class="text-center"><?php echo esc_html(get_field('titulo_depoimentos')); ?></h2>
        <div class="slick-carousel">
            <?php if (have_rows('depoimentos')): ?>
                <?php while (have_rows('depoimentos')): the_row(); ?>
                    <div class="depoimentoItem">
                        <p><?php echo wp_kses_post(get_field('texto_depoimento')); ?></p>
                        <h5><?php echo esc_html(get_field('nome_cliente')); ?> - <?php echo esc_html(get_field('cidade_cliente')); ?></h5>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

</div>

<?php get_footer(); ?>