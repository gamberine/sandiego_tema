<?php
/* Template Name: Contato */
get_header(); // Load the header.php file
?>
<?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <section class="gridCinza pb-0">
            <div class="rowFullWidth">
                <h1 class="tituloPrincipal text-center corPrincipal"><?php echo wp_kses_post(get_field('titulo_page_contatos')); ?></h1>
                <iframe class="iframeMaps mt-5" src="<?php echo wp_kses_post(get_field('link_mapa')); ?>" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </section>
        <section class="gridCinza text-center py-0 my-0">
            <div class="row my-0 w-100">

                <div class="boxImgContatos col-xxl-6 col-xl-6 d-xl-block d-lg-none" style="background: url(<?php echo wp_kses_post(get_field('imagem_page_contatos')); ?>), rgba(var(--corPrincipalRgb), 0.5);); background-size: cover; background-blend-mode: multiply;">
                </div>
                <div class="boxFormulario col-xxl-5 col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">

                    <h2 class="tituloPrincipal corPrincipal mb-3"><?php echo wp_kses_post(get_field('titulo_formulario')); ?></h2>
                    <p class="w-90 pb-4"><?php echo wp_kses_post(get_field('texto_page_contatos')); ?></p>
                    <?php echo do_shortcode('[contact-form-7 id="7772880" title="Formulario_de_contato"]'); ?>
                </div>
            </div>

        </section>
        <section class="gridBranco text-center">

            <div class="row">

                <h2 class="tituloPrincipal corPrincipal mb-5"><?php echo wp_kses_post(get_field('titulo_page_contatos_equipe')); ?></h2>

                <!-- <button type="button" class="btnModal btnPadrao" data-bs-toggle="modal" data-bs-target="#< ?php echo esc_attr($modal_id); ?>"> -->
                <!-- <button type="button" class="btn btnPadrao">
                <?php echo wp_kses_post(get_field('titulo_form_trabalhe')); ?>
            </button> -->

                <div class="subscribe mt-3">
                    <?php echo do_shortcode('[contact-form-7 id="1dc6f04" title="Formulario_trabalhe-conosco"]'); ?>
                </div>

            </div>

        </section>

    <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>
<!-- </div> -->

<!--content-area -->
<?php
get_footer(); // Load the footer.php file
?>