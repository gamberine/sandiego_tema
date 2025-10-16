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

<!-- <div id="btnWhatsappContainer"> -->
<a class="btnWhatsAppFooter" target="_blank" href="<?php echo esc_url(get_field('linkWhatsapp_pt')); ?>">
  <i class="fab fa-whatsapp"></i>
  <span><?php echo wp_kses_post(get_field('numeroWhatsapp_pt')); ?></span>
</a>
<a class="btnWhatsAppFooter en" target="_blank" href="<?php echo esc_url(get_field('linkWhatsapp_en')); ?>">
  <i class="fab fa-instagram"></i>
  <span><?php echo wp_kses_post(get_field('numeroWhatsapp_en')); ?></span>
</a>
<a class="btnWhatsAppFooter ca" target="_blank" href="<?php echo esc_url(get_field('linkWhatsapp_ca')); ?>">
  <i class="fab fa-instagram"></i>
  <span> <?php echo wp_kses_post(get_field('numeroWhatsapp_ca')); ?></span>
</a>
<!-- </div> -->