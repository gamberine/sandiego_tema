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


<!-- Exibe o botão com o link padrão (pt) -->


<a class="btnWhatsAppFooter" target="_blank" href="<?php echo wp_kses_post(get_field('linkWhatsapp')); ?>">
  <i class="fab fa-whatsapp"></i>
</a>
</div>