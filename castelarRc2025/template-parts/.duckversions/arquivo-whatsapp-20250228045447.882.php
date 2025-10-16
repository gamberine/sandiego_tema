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


<?php
// Obtenção e sanitização dos links conforme o idioma
// $linkWhatsapp_pt = esc_url(get_field('linkWhatsapp_pt'));
// $linkWhatsapp_en = esc_url(get_field('linkWhatsapp_en'));
// $linkWhatsapp_ca = esc_url(get_field('linkWhatsapp_ca'));
$linkWhatsapp_pt = linkWhatsapp_pt;
$linkWhatsapp_en = linkWhatsapp_en;
$linkWhatsapp_ca = linkWhatsapp_ca;
?>
<!-- Exibe o botão com o link padrão (pt) -->
<div id="btnWhatsappContainer">
  <a class="btnWhatsAppFooter" target="_blank" href="<?php echo esc_url(get_field('$linkWhatsapp_pt')); ?>">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>