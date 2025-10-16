<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

?>

</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->
<!-- <div class="faixaCorSecundaria"></div> -->



<?php get_template_part('template-parts/arquivo-footer'); ?>



<div class="footerDesenvolvedorParceiro">
  <span>
    <!-- Design/Manutenção: -->
    <?php bl_site_footer_se(); ?>
  </span>
  <!-- <span>Desenvolvimento:
    < ?php bl_site_footer_logo(); ?></span> -->
</div>

</div><!-- #page -->


<?php get_template_part('template-parts/arquivo-modal-galeria'); ?>

<?php wp_footer(); ?>

</body>

</html>