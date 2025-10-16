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
<style>
  span.linkIdiomas.d-flex .gtranslate_wrapper .gt_selector {
    display: none;
  }

  @media only screen and (max-width: 1280px) {

    a.glink.nturl.notranslate.order-1,
    a.glink.nturl.notranslate.order-2,
    a.glink.nturl.notranslate.order-3,
    a.glink.nturl.notranslate.order-4 {
      display: none !important;
    }

    .gtranslate_wrapper .select.gt_selector.notranslate {
      display: flex !important;
    }
  }
</style>

<script>
  jQuery(document).ready(function() {
    jQuery('a[data-gt-lang="pt"]').addClass('order-4');
    jQuery('a[data-gt-lang="en"]').addClass('order-3');
    jQuery('a[data-gt-lang="es"]').addClass('order-2');
    jQuery('a[data-gt-lang="ca"]').addClass('order-1');
  });
</script>

<div class="gridIdiomas">
  <!-- <i class="fas fa-globe"></i> -->
  <!-- <span class="linkIdiomas d-flex">< ?php echo do_shortcode('[gt-link lang="en" label="English" widget_look="none"]'); ?></span>
	<span class="linkIdiomasPt">< ?php echo do_shortcode('[gt-link lang="pt" label="Português" widget_look="none"]'); ?></span>
	<span class="linkIdiomasCat">< ?php echo do_shortcode('[gt-link lang="ca" label="Português" widget_look="none"]'); ?></span> -->
  <!-- <span class="linkIdiomas d-flex">< ?php echo do_shortcode('[gt-link lang="en" label="English" widget_look="flags"]'); ?></span>
  <span class="linkIdiomas d-flex">< ?php echo do_shortcode('[gt-link lang="pt" label="Português" widget_look="flags"]'); ?></span>
  <span class="linkIdiomas d-flex">< ?php echo do_shortcode('[gt-link lang="ca" label="Catalian" widget_look="flags"]'); ?></span> -->
  <span class="linkIdiomas d-flex"><?php echo do_shortcode('[gtranslate]'); ?></span>
</div>
<!-- <div class="gridIdiomas d-xxl-none d-xl-none d-flex">
  <div id="google_translate_element2">
    <div class="skiptranslate goog-te-gadget" dir="ltr" style="">
      <div id=":0.targetLanguage"><select class="goog-te-combo" aria-label="Widget de tradução de idiomas"></select>
        <option value="">Selecione o idioma</option>
        <option value="en">English</option>
        <option value="pt">Português</option>
        <option value="es">Español</option>
        <option value="ca">Català</option>
        </select>
      </div>
    </div>
  </div>
</div> -->