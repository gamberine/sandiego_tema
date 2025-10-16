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

<div id="btnWhatsappContainer">
  <a class="btnWhatsAppFooter" target="_blank" href="<?php echo esc_url(get_field('linkWhatsapp_pt') ?: '#'); ?>">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>