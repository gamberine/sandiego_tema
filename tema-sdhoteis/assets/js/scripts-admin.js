// JS ADMIN Gamberine
// Fixar o botão de publicar do WP e o botão de publicar do ACF no topo após scroll

jQuery(function () {
  jQuery(window).on('scroll', function () {
    if (jQuery(window).scrollTop() >= 80) {
      jQuery('input#publish').addClass('fixed');
      jQuery('button.acf-btn.acf-publish').addClass('fixed');
    } else {
      jQuery('input#publish').removeClass('fixed');
      jQuery('button.acf-btn.acf-publish').removeClass('fixed');
    }
  });
});
