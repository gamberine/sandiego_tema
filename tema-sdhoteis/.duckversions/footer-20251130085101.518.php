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
<!-- <div class="faixasecondary"></div> -->

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

<!-- < ?php get_template_part('sections/modal-reserva'); ?> -->

<?php get_template_part('template-parts/arquivo-modal-reserva'); ?>


<script>
window.sdFormat = window.sdFormat || function(d) {
  const dt = new Date(d);
  return dt.toLocaleDateString("pt-BR").replace(/\//g, "");
};

function sdBuscar(formId = "sdSearchForm") {
  const form = document.getElementById(formId);
  if (!form) return;

  const checkin = form.checkin.value;
  const checkout = form.checkout.value;
  const hospedes = form.hospedes.value;
  const quartos = form.quartos.value;

  if (!checkin || !checkout) {
    alert("Selecione datas válidas.");
    return;
  }

  const ci = sdFormat(checkin);
  const co = sdFormat(checkout);

  const url = `https://book.omnibees.com/chainresults?c=9627&CheckIn=${ci}&CheckOut=${co}&ad=${hospedes}&NRooms=${quartos}&lang=pt-BR&currencyId=16&version=4`;

  window.open(url, "_blank");
}
</script>


<?php wp_footer(); ?>

</body>

</html>
