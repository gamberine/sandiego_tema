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
    jQuery('a[data-gt-lang="pt"]').addClass('order-1');
    jQuery('a[data-gt-lang="en"]').addClass('order-2');
    jQuery('a[data-gt-lang="es"]').addClass('order-3');
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var select = document.getElementById("gtranslate-language");

    function updateFlag() {
      var selectedOption = select.options[select.selectedIndex];
      var flag = selectedOption.getAttribute("data-flag");

      // Verifica se o navegador suporta variáveis CSS
      if (window.CSS && CSS.supports('(--a: 0)')) {
        select.style.setProperty('--flag-url', 'url(' + flag + ')');
      } else {
        // Fallback para navegadores antigos
        select.style.backgroundImage = 'url(' + flag + ')';
      }
    }

    select.addEventListener("change", function() {
      var lang = this.value;
      var langLink = document.querySelector('.glink[data-gt-lang="' + lang + '"]');
      if (langLink) langLink.click();
      updateFlag();
    });

    // Inicializa a flag ao carregar a página
    updateFlag();
  });
</script>


<div class="gridIdiomas gap-3 d-flex align-items-center">
  <span class="linkIdiomas d-flex"><?php echo do_shortcode('[gtranslate]'); ?></span>

  <a class="btn btn-search w-100 d-flex justify-content-center align-items-center gap-2" href="#">
    <span class="text-white">Faça sua<br />Reserva</span>
  </a>
</div>