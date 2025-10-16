<?php

/**
 * Template 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

?>

<div class="topBar">
    <div class="container d-flex align-items-center">

        <div class="contatosBar d-none-1280 col-8 d-flex align-items-center p-0">
            <?php $args = array(
                'post_type' => 'conteudo',
                'posts_per_page' => 1,
            );
            ?>
            <?php query_posts($args); ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <a class="col-5 p-0" target="_blank" href="mailto:<?php echo wp_kses_post(get_field('e-mail')); ?>">
                        <i class="far fa-envelope"></i> <?php echo wp_kses_post(get_field('e-mail')); ?></a>

                    <a class="col-4 p-0" target="_blank" href="<?php echo wp_kses_post(get_field('linkWhatsapp')); ?>">
                        <i class="fab fa-whatsapp"></i> <?php echo wp_kses_post(get_field('numeroWhatsapp')); ?></a>

                    <!-- <a class="col-3 p-0" target="_blank" href="< ?php echo wp_kses_post(get_field('linkTelefone')); ?>">
                                <i class="fas fa-headphones"></i> < ?php echo wp_kses_post(get_field('numeroTelefone')); ?></a> -->

        </div>

        <div class="contatosBar d-none-1280 col-2 d-flex justify-content-end align-items-center p-0">

            <div class="redesSociaisTop">


                <a target="_blank" href="https://www.facebook.com/<?php echo wp_kses_post(get_field('facebook')); ?>">
                    <!-- <i class="fab fa-facebook"></i> -->
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a target="_blank" href="https://www.instagram.com/<?php echo wp_kses_post(get_field('instagram')); ?>">
                    <i class="fab fa-instagram"></i>
                </a>
                <!-- <a target="_blank" href="< ?php echo wp_kses_post(get_field('linkWhatsapp')); ?>">
                            <i class="fab fa-whatsapp"></i>
                            </a> -->


            <?php endwhile; ?>
        <?php endif; ?>

            </div>



        </div>

    </div>
</div>