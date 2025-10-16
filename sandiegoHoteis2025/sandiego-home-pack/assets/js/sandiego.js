
/* San Diego custom */
(function($){
  $(function(){
    // Slick examples (if needed later)
    if ($('.js-services-slider').length){
      $('.js-services-slider').slick({
        dots:true, arrows:false, autoplay:true, autoplaySpeed:6000, slidesToShow:4, slidesToScroll:4,
        responsive:[
          {breakpoint:1200, settings:{slidesToShow:3, slidesToScroll:3}},
          {breakpoint:992, settings:{slidesToShow:2, slidesToScroll:2}},
          {breakpoint:576, settings:{slidesToShow:1, slidesToScroll:1}}
        ]
      });
    }

    // Copy buttons (helper page)
    $('.copy-btn[data-copy]').on('click', function(){
      const text = $(this).attr('data-copy');
      navigator.clipboard.writeText(text).then(()=>{
        const t = $(this);
        const prev = t.text();
        t.text('Copiado!').addClass('copied');
        setTimeout(()=>{ t.text(prev).removeClass('copied'); }, 1200);
      });
    });
  });
})(jQuery);
