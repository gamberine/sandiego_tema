(function($){
  $(document).ready(function(){
    // Carrossel de hotéis na home
    if ($('.sd-carousel-hotels').length) {
      $('.sd-carousel-hotels').slick({
        dots:true, arrows:false, autoplay:true, autoplaySpeed:4500,
        slidesToShow:4, slidesToScroll:4,
        responsive:[
          {breakpoint:1200, settings:{slidesToShow:3, slidesToScroll:3}},
          {breakpoint:992, settings:{slidesToShow:2, slidesToScroll:2}},
          {breakpoint:576, settings:{slidesToShow:1, slidesToScroll:1}}
        ]
      });
    }

    // Carrossel de quartos na página single
    if ($('.sd-carousel-rooms').length) {
      $('.sd-carousel-rooms').slick({
        dots:true, arrows:true, autoplay:true, autoplaySpeed:4500,
        slidesToShow:3, slidesToScroll:1,
        responsive:[
          {breakpoint:992, settings:{slidesToShow:2}},
          {breakpoint:576, settings:{slidesToShow:1}}
        ]
      });
    }

    // Carrossel de depoimentos
    if ($('.sd-carousel-depo').length) {
      $('.sd-carousel-depo').slick({
        dots:true, arrows:false, autoplay:true, autoplaySpeed:6000,
        slidesToShow:2, slidesToScroll:2,
        responsive:[{breakpoint:992, settings:{slidesToShow:1, slidesToScroll:1}}]
      });
    }
  });

  // Função para copiar texto para a área de transferência
  function doCopy(text){
    if (navigator.clipboard) {
      navigator.clipboard.writeText(text);
    }
  }

  // Botão shortcode [sd_copy]
  $(document).on('click','.sd-copy',function(e){
    e.preventDefault();
    var t=$(this).data('copy')||$(this).text();
    doCopy(t);
  });

  // Copiar com atributo data-copy-inline
  $(document).on('click','[data-copy-inline]',function(e){
    e.preventDefault();
    var t=$(this).attr('data-copy-inline')||$(this).text();
    doCopy(t);
  });
})(jQuery);
