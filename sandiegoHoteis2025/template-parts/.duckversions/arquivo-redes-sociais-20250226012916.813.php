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

<div class="iconsRedes">
            <?php $args = array(
                    'post_type' => 'conteudo',
                    'posts_per_page' => 1,
                );
                ?>
                <?php query_posts($args); ?>
                <?php if (have_posts()) : ?>
                 <?php while (have_posts()) : the_post(); ?> 
                    
            <ul class="redesSociais">

                <li><a target="_blank" href="https://www.instagram.com/<?php echo wp_kses_post(get_field('instagram')); ?>">
                    <i class="fab fa-instagram"></i>
                </a></li>
                <li><a target="_blank" href="mailto:<?php echo wp_kses_post(get_field('e-mail')); ?>">
                <i class="far fa-envelope"></i>
                </a></li>
                <li><a target="_blank" href="<?php echo wp_kses_post(get_field('linkWhatsapp')); ?>">
                    <i class="fab fa-whatsapp"></i>
                </a></li>

                <!-- <li><a target="_blank" href="https://www.facebook.com/< ?php echo wp_kses_post(get_field('facebook')); ?>">
                        <i class="fab fa-facebook"></i>
                    </a></li> -->
                </ul>
                                        

                <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>
</div>