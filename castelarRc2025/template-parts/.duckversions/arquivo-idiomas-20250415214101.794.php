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
  <!-- <div class="clear-both"></div> -->
</div>