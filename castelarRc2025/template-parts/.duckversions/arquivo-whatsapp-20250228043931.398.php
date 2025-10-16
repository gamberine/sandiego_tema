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
$linkWhatsapp_pt = esc_url(get_field('linkWhatsapp_pt'));
$linkWhatsapp_en = esc_url(get_field('linkWhatsapp_en'));
$linkWhatsapp_ca = esc_url(get_field('linkWhatsapp_ca'));
?>
<!-- Exibe o botão com o link padrão (pt) -->
<div id="btnWhatsappContainer">
  <a class="btnWhatsAppFooter" target="_blank" href="<?php echo $linkWhatsapp_pt; ?>">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>

<script type="text/javascript">
  // Aguarda o carregamento do documento
  jQuery(document).ready(function() {
    // Função para atualizar o href do botão de WhatsApp com base no atributo lang do elemento <html>
    var updateWhatsappLink = function() {
      var currentLang = jQuery('html').attr('lang');
      var newLink = "<?php echo $linkWhatsapp_pt; ?>"; // valor padrão: pt

      if (currentLang === 'en') {
        newLink = "<?php echo $linkWhatsapp_en; ?>";
      } else if (currentLang === 'ca') {
        newLink = "<?php echo $linkWhatsapp_ca; ?>";
      }
      jQuery('.btnWhatsAppFooter').attr('href', newLink);
    };

    // Atualiza o link com o idioma atual
    updateWhatsappLink();

    // Caso o usuário altere o idioma via plugin g-translate, detecta o clique e atualiza o link
    jQuery('.gtranslate_wrapper a').on('click', function() {
      // Delay para garantir que o atributo lang do HTML seja atualizado
      setTimeout(function() {
        updateWhatsappLink();
      }, 500);
    });
  });
</script>