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
  <!-- <i class="fas fa-globe"></i> -->
  <!-- <span class="linkIdiomas d-flex">< ?php echo do_shortcode('[gt-link lang="en" label="English" widget_look="none"]'); ?></span>
	<span class="linkIdiomasPt">< ?php echo do_shortcode('[gt-link lang="pt" label="Português" widget_look="none"]'); ?></span>
	<span class="linkIdiomasCat">< ?php echo do_shortcode('[gt-link lang="ca" label="Português" widget_look="none"]'); ?></span> -->
  <!-- <span class="linkIdiomas d-flex">< ?php echo do_shortcode('[gt-link lang="en" label="English" widget_look="flags"]'); ?></span>
  <span class="linkIdiomas d-flex">< ?php echo do_shortcode('[gt-link lang="pt" label="Português" widget_look="flags"]'); ?></span>
  <span class="linkIdiomas d-flex">< ?php echo do_shortcode('[gt-link lang="ca" label="Catalian" widget_look="flags"]'); ?></span> -->
  <span class="linkIdiomas d-flex"><?php echo do_shortcode('[gtranslate]'); ?></span>
  <!-- <span class="linkIdiomas d-flex">
    <select class="gt_selector notranslate" aria-label="Select Language">
      <option value="">Select Language</option>
      <option value="pt|ca" data-gt-href="#">Català</option>
      <option value="pt|en" data-gt-href="#">English</option>
      <option value="pt|pt" data-gt-href="#" selected="">Português</option>
      <option value="pt|es" data-gt-href="#">Español</option>
    </select></span> -->

  <!-- Select personalizado (somente para telas menores que 1280px) -->
  <!-- <div class="gtranslate-select-wrapper">
    <div class="gtranslate-select">
      <select id="gtranslate-language">
        <option value="pt" data-flag="/wp-content/plugins/gtranslate/flags/svg/pt-br.svg" selected>Português</option>
        <option value="ca" data-flag="/wp-content/plugins/gtranslate/flags/svg/ca.svg">Català</option>
        <option value="en" data-flag="/wp-content/plugins/gtranslate/flags/svg/en-us.svg">English</option>
        <option value="es" data-flag="/wp-content/plugins/gtranslate/flags/svg/es.svg">Español</option>
      </select>
    </div>
  </div> -->

  <a class="btn btn-search w-100 d-flex justify-content-center align-items-center gap-2" href="#">
    <span class="text-white">Reservar</span>
  </a>
</div>