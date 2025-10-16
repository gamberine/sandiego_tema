<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

?>
<script>
    jQuery(document).ready(function() {
        jQuery(".modalIdade .btnPadrao").click(function() {
            jQuery(".modalIdade").hide();
        });
    });
</script>

<?php query_posts("post_type=conteudo&posts_per_page=1"); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <?php
        $selecao = wp_kses_post(get_field('ativar_modal'));
        if ($selecao == true) {
            echo '';
        } else {
            echo '<div class="modalIdade exibirModal">
								<div class="boxModal text-center p-3">
									<div class="modal-header">
									 <h2>' . wp_kses_post(get_field('titulo_modal_idade')) . '	</h2>
									</div>
									<div class="modal-body">
										<p class="pt-3">' . wp_kses_post(get_field('texto_modal_idade')) . '</p>
									<div class="row mt-5 mb-5 mx-0 px-0 justify-content-center">
										<a target="_blank" href="https://www.google.com" class="btnRounded color">
											Não, Eu não tenho
										</a>
										<a href="#" class="btnPadrao">
											Sim, Tenho + 18 anos
										</a>
									</div>
									<div class="row mb-0">
										<p>' . wp_kses_post(get_field('texto_privacidade_modal_idade')) . '</p>
												</div>
											</div>
									  
									</div>
								</div>';
        }
        ?>

    <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>