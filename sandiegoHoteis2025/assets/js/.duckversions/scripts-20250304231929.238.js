/*Adicionar Loading no carregamento de telas*/
jQuery(document).ready(function () {
  jQuery('#loading').show()
  jQuery(window).on('load', function () {
    // Quando a página estiver totalmente carregada, remove o id
    jQuery('#loading').fadeOut('slow')
  })
});
jQuery(document).ready(function () {
  jQuery('#fileuploadfield').on('change', function () {
    var filename = jQuery(this).val().split('\\').pop();
    var label = jQuery('.labelAnexar'); // Seleciona a label com a classe "labelAnexar"
    if (filename) {
      jQuery(this).addClass('d-flex').attr('data-filename', filename);
      label.addClass('ativa'); // Adiciona a classe "ativa"
    } else {
      jQuery(this).removeClass('d-flex').removeAttr('data-filename');
      label.removeClass('ativa'); // Remove a classe "ativa"
    }
  });
});

/*Menu Responsivo*/
jQuery(document).ready(function () {
  jQuery('button#primary-mobile-menu').click(function () {
    if (jQuery('.primary-menu-container').hasClass('aparecer')) {
      jQuery('.primary-menu-container').removeClass('aparecer');
    } else {
      jQuery('.primary-menu-container').removeClass('aparecer');
      jQuery('.primary-menu-container').addClass('aparecer');
    }
    if (jQuery('button#primary-mobile-menu').hasClass('acionar')) {
      jQuery('button#primary-mobile-menu').removeClass('acionar');
    } else {
      jQuery('button#primary-mobile-menu').removeClass('acionar');
      jQuery('button#primary-mobile-menu').addClass('acionar');
    }
  });

  jQuery('.primary-navigation .primary-menu-container>ul>.menu-item').click(function () {
    jQuery('.primary-menu-container').removeClass('aparecer');
    jQuery('button#primary-mobile-menu').removeClass('acionar');
  });

  // Verifica cliques fora do menu e não afeta o footer
  jQuery(document).click(function (event) {
    const $target = jQuery(event.target);
    if (
      !$target.closest('.primary-menu-container').length && // Clique fora do menu
      !$target.closest('button#primary-mobile-menu').length && // Clique fora do botão
      !$target.closest('footer').length // Ignora cliques no footer
    ) {
      jQuery('.primary-menu-container').removeClass('aparecer');
      jQuery('button#primary-mobile-menu').removeClass('acionar');
    }
  });
});

// Wow JS intalação
jQuery(document).ready(function () {
  var wow = new WOW({
    boxClass: 'wow', // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset: 0, // distance to the element when triggering the animation (default is 0)
    mobile: true, // trigger animations on mobile devices (default is true)
    live: true, // act on asynchronously loaded content (default is true)
    callback: function (box) {
    },
    scrollContainer: null // optional scroll container selector, otherwise use window
  })
  wow.init()
});
/*Travar Menu*/
// jQuery(window).scroll(function () {
// if (jQuery(window).scrollTop() >= 200) {
// jQuery('header.site-header').addClass('menuSuspenso')
// } else {
// jQuery('header.site-header').removeClass('menuSuspenso')
// }
// })
// jQuery(window).scroll(function () {
//     if (jQuery(window).scrollTop() >= 200) {
//         jQuery('topBar').show()
//     } else {
//         jQuery('topBar').hide()
//     }
// })
jQuery(window).scroll(function () {
  if (jQuery(window).scrollTop() >= 200) {
    jQuery('header.site-header').addClass('menuSuspenso')
  } else {
    jQuery('header.site-header').removeClass('menuSuspenso')
  }
});

/* Animação contador numerico - só adicionar a classe "contagem" na linha onde existe número */
// jQuery(document).ready(function () {
//     jQuery('.contagem').each(function () {
//         var $this = jQuery(this);
//         $this.prop('Counter', 0).animate(
//             {
//                 Counter: $this.text()
//             },
//             {
//                 duration: 5000,
//                 easing: 'swing',
//                 step: function (now) {
//                     $this.text(Math.ceil(now));
//                 }
//             }
//         );
//     });
// });
/* fim Animação contador numerico - só adicionar a classe "contagem" na linha onde existe número */
//  modal novo
// jQuery(document).ready(function () {
//     window.openModalFromCard = function (button) {
//         var imgUrl = jQuery(button).closest('.boxOferta').find('img').data('img-url');
//         jQuery('#modalImage').attr('src', imgUrl);
//         var modal = new bootstrap.Modal(document.getElementById('modalImgAmpliada'));
//         modal.show();
//     };
//     jQuery('.modal').on('click', function (event) {
//         if (jQuery(event.target).is('.modal')) {
//             var modal = bootstrap.Modal.getInstance(this);
//             modal.hide();
//         }
//     });
// });
// jQuery(document).ready(function () {
//     jQuery('a.glink').click(function () {
//         if (jQuery('span.linkIdiomas').hasClass('d-flex')) {
//             jQuery('span.linkIdiomasPt').addClass('d-flex');
//             jQuery('span.linkIdiomas').removeClass('d-flex');
//         } else {
//             jQuery('span.linkIdiomasPt').removeClass('d-flex');
//             jQuery('span.linkIdiomas').addClass('d-flex');
//         }
//     })
// });
//  fim modal novo
// gamberine - sliders padrões 
jQuery(document).ready(function () {
  // Inicializar seletor
  if (jQuery('.bannerPrincipal').length) {
    jQuery('.bannerPrincipal').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      autoplay: true,
      adaptiveHeight: true,
      autoplaySpeed: 6000,
      speed: 600,
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 1,
            arrows: false,
            dots: true,
          },
        },
      ],
    });
  }
  // fim do seletor
  // Inicializar seletor
  if (jQuery('.sliderImgTexto').length) {
    jQuery('.sliderImgTexto').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 6000,
      speed: 600,
      dots: false,
      arrows: false,
      draggable: true,
      responsive: [
        {
          breakpoint: 1460,
          settings: {
            slidesToShow: 4,
            arrows: true,
          },
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            arrows: true,
          },
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 1,
            arrows: false,
            dots: true,
          },
        },
      ],
    });
  }
  // fim do seletor
  // Inicializar seletor
  if (jQuery('.sliderRowSimples').length) {
    jQuery('.sliderRowSimples').slick({
      slidesToShow: 4,
      rows: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 6000,
      speed: 600,
      dots: false,
      arrows: false,
      draggable: true,
      adaptiveHeight: true,
      responsive: [
        {
          breakpoint: 1460,
          settings: {
            slidesToShow: 4,
            arrows: false,
          },
        },
        {
          breakpoint: 1369,
          settings: {
            slidesToShow: 3,
            arrows: true,
            dots: false,
          },
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
            arrows: true,
            dots: false,
          },
        },
        {
          breakpoint: 991, // Mobile settings
          settings: {
            infinite: false,
            rtl: false,
            rows: 1, // Remove as linhas extras
            slidesToShow: 1, // Exibe apenas 1 slide por vez
            slidesToScroll: 1, // Avança um slide por vez
            arrows: false,
            dots: true, // Exibe as setas de navegação no mobile
          },
        },
      ],
    });
  }
  // fim do seletor
  // Inicializar seletor
  if (jQuery('.gallery').length) {
    jQuery('.gallery').slick({
      slidesToShow: 5,
      rows: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 6000,
      speed: 100,
      dots: false,
      arrows: true,
      draggable: true,
      adaptiveHeight: true,
      responsive: [
        {
          breakpoint: 1460,
          settings: {
            slidesToShow: 4,
          },
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 991, // Mobile settings
          settings: {
            infinite: false,
            rtl: false,
            slidesToShow: 1, // Exibe apenas 1 slide por vez
            slidesToScroll: 1, // Avança um slide por vez
            arrows: false,
            dots: true, // Exibe as setas de navegação no mobile
          },
        },
      ],
    });
  }
  // fim do seletor
  // Inicializar seletor
  // if (jQuery('.carouselSlideImgModal').length) {
  //   jQuery('.carouselSlideImgModal').slick({
  //     slidesToShow: 1,
  //     slidesToScroll: 1,
  //     rows: 1,
  //     autoplay: false,
  //     dots: false,
  //     arrows: true,
  //     draggable: true,
  //     adaptiveHeight: true,
  //     infinite: true,
  //     responsive: [
  //       {
  //         breakpoint: 991, // Mobile settings
  //         settings: {
  //           infinite: false,
  //           rtl: false,
  //           slidesToShow: 1, // Exibe apenas 1 slide por vez
  //           slidesToScroll: 1, // Avança um slide por vez
  //           arrows: false,
  //           dots: true, // Exibe as setas de navegação no mobile
  //         },
  //       },
  //     ],
  //   });
  // }
  // Inicializar o slider utilizando o Slick
  // if (jQuery('.carouselSlideImgModal').length) {
  //   jQuery('.carouselSlideImgModal').slick({
  //     slidesToShow: 1,         // Exibe 1 slide por vez
  //     slidesToScroll: 1,       // Avança 1 slide por vez
  //     rows: 1,                 // Apenas 1 linha
  //     autoplay: false,         // Autoplay desativado
  //     dots: false,
  //     arrows: true,
  //     draggable: true,
  //     adaptiveHeight: true,
  //     infinite: true,
  //     responsive: [
  //       {
  //         breakpoint: 991,   // Configurações para telas menores
  //         settings: {
  //           infinite: false,
  //           rtl: false,
  //           slidesToShow: 1,
  //           slidesToScroll: 1,
  //           arrows: false,
  //           dots: true,
  //         },
  //       },
  //     ],
  //   });

  //   // Evita múltiplas transições simultâneas
  //   var isTransitioning = false;
  //   jQuery('.carouselSlideImgModal').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
  //     if (isTransitioning) {
  //       event.preventDefault();
  //     } else {
  //       isTransitioning = true;
  //     }
  //   });
  //   jQuery('.carouselSlideImgModal').on('afterChange', function (event, slick, currentSlide) {
  //     isTransitioning = false;
  //   });
  // }

  // fim do seletor
  // Inicializar seletor
  if (jQuery('.sliderBoxTexto').length) {
    jQuery('.sliderBoxTexto').slick({
      slidesToShow: 4,
      rows: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 6000,
      speed: 600,
      arrows: false,
      draggable: true,
      adaptiveHeight: true,
      infinite: true,
      dots: false,
      responsive: [
        {
          breakpoint: 1460,
          settings: {
            slidesToShow: 4,
            infinite: true,
          },
        },
        {
          breakpoint: 1369,
          settings: {
            slidesToShow: 3,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 991, // Mobile settings
          settings: {
            slidesToShow: 1, // Exibe apenas 1 slide por vez
            infinite: false,
            dots: true, // Exibe as setas de navegação no mobile
          },
        },
      ],
    });
  }
  // fim do seletor
  // Inicializar seletor
  if (jQuery('.sliderImg4x2Texto').length) {
    jQuery('.sliderImg4x2Texto').slick({
      slidesToShow: 5,
      rows: 1,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 6000,
      speed: 600,
      dots: false,
      arrows: false,
      draggable: true,
      adaptiveHeight: true,
      infinite: true,
      responsive: [
        {
          breakpoint: 1460,
          settings: {
            slidesToShow: 4,
            infinite: true,
            arrows: true,
          },
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
            infinite: true,
            arrows: true,
          },
        },
        {
          breakpoint: 991, // Mobile settings
          settings: {
            infinite: false,
            slidesToShow: 1, // Exibe apenas 1 slide por vez
            arrows: false,
            dots: true, // Exibe as setas de navegação no mobile
          },
        },
      ],
    });
  }
  // fim do seletor
  // Inicializar seletor
  if (jQuery('.sliderRowDuplo').length) {
    jQuery('.sliderRowDuplo').slick({
      slidesToShow: 3,
      rows: 2,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 6000,
      speed: 600,
      dots: false,
      arrows: false,
      draggable: true,
      adaptiveHeight: true,
      infinite: true,
      responsive: [
        {
          breakpoint: 1460,
          settings: {
            rows: 2,
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 991, // Mobile settings
          settings: {
            slidesToShow: 1, // Exibe apenas 1 slide por vez
            slidesToScroll: 1, // Avança um slide por vez
            rows: 1, // Remove as linhas extras
            infinite: false,
            adaptiveHeight: false,
            dots: true, // Exibe as setas de navegação no mobile
          },
        },
      ],
    });
  }
  // fim do seletor
  // Inicializar seletor
  if (jQuery('.sliderRowFixed').length) {
    jQuery('.sliderRowFixed').slick({
      slidesToShow: 2,
      rows: 2,
      slidesToScroll: 1,
      autoplay: false,
      // autoplaySpeed: 6000,
      // speed: 600,
      dots: false,
      arrows: false,
      draggable: false,
      adaptiveHeight: true,
      infinite: false,
      responsive: [
        {
          breakpoint: 1200, // Mobile settings
          settings: {
            slidesToShow: 1, // Exibe apenas 1 slide por vez
            slidesToScroll: 1, // Avança um slide por vez
            rows: 1, // Remove as linhas extras
            autoplay: true,
            autoplaySpeed: 6000,
            speed: 600,
            infinite: true,
            adaptiveHeight: false,
            dots: true, // Exibe as setas de navegação no mobile
          },
        },
      ],
    });
  }
  // fim do seletor
});
// gamberine - fim sliders padrões 


// Para fixar o botão input#publish no topo da página após o scroll
jQuery(window).scroll(function () {
  if (jQuery(window).scrollTop() >= 50) {
    jQuery('input#publish').addClass('fixed')
  } else {
    jQuery('input#publish').removeClass('fixed')
  }
});

// Função para atualizar a classe de idioma no body
jQuery(document).ready(function () {
  function updateBodyLangClass() {
    var currentLang = jQuery('html').attr('lang');
    // Se não existir ou estiver definido como "auto", define como "pt-BR"
    if (!currentLang || currentLang === 'auto') {
      currentLang = 'pt-BR';
    }
    // Sanitiza o idioma (similar ao sanitize_title_with_dashes do PHP)
    var sanitizedLang = currentLang.toLowerCase()
      .replace(/[^a-z0-9]+/g, '-')
      .replace(/(^-|-$)/g, '');

    // Remove todas as classes que comecem com "lang-"
    jQuery('body').removeClass(function (index, className) {
      return (className.match(/\blang-\S+/g) || []).join(' ');
    });

    // Adiciona a nova classe de idioma
    jQuery('body').addClass('lang-' + sanitizedLang);
  }

  // Atualiza a classe ao carregar a página (garante que seja a lang atual do <html>)
  updateBodyLangClass();

  // A cada clique no link, aguarda 100ms para garantir que o atributo lang já foi atualizado e então atualiza a classe do body
  jQuery('a.glink.nturl.notranslate').on('click', function () {
    setTimeout(updateBodyLangClass, 100);
  });
});




// Modal detalhe serviços
jQuery(function (jQuery) {
  // Exemplo: abrir modal ao clicar em um elemento com a classe 'open-modal-img'
  jQuery('.open-modal-img').on('click', function (e) {
    e.preventDefault();
    var targetModal = jQuery(this).data('target');
    if (targetModal) {
      var modalInstance = new bootstrap.Modal(document.querySelector(targetModal));
      modalInstance.show();
    }
  });

  // Fechar modal ao clicar fora do conteúdo (opcional, pois o Bootstrap já fecha clicando no backdrop)
  jQuery(document).on('click', '.modal', function (e) {
    if (jQuery(e.target).hasClass('modal')) {
      var modalInstance = bootstrap.Modal.getInstance(this);
      if (modalInstance) {
        modalInstance.hide();
      }
    }
  });
});



// scripts.js - Código para modal dinâmico utilizando Slick Slider
document.addEventListener('click', function (event) {
  // Verifica se o clique ocorreu em um link (<a>) dentro de uma galeria (.gallery)
  var galleryLink = event.target.closest('.gallery a');
  if (!galleryLink) return;
  event.preventDefault();

  // Obtém o contêiner da galeria onde ocorreu o clique
  var galleryContainer = galleryLink.closest('.gallery');
  if (!galleryContainer) return;

  // Seleciona todos os links (<a>) da galeria e monta a lista de itens
  var galleryLinks = galleryContainer.querySelectorAll('a');
  var items = [];
  galleryLinks.forEach(function (link) {
    var href = link.getAttribute('href');
    items.push({ href: href });
  });

  // Determina o índice do link clicado
  var galleryLinksArray = Array.prototype.slice.call(galleryLinks);
  var activeIndex = galleryLinksArray.indexOf(galleryLink);

  // Monta os slides dinamicamente para o Slick Slider
  // Cada slide terá a estrutura: div.imgGaleriaModal > img
  var slidesHtml = '';
  items.forEach(function (item, index) {
    slidesHtml += '<div class="imgGaleriaModal">';
    slidesHtml += '<img src="' + item.href + '" class="d-block w-100" alt="">';
    slidesHtml += '</div>';
  });

  // Seleciona o modal dinâmico (inserido no footer)
  var modal = document.getElementById('dynamicGalleryModal');
  if (!modal) {
    console.error('Modal com ID "dynamicGalleryModal" não foi encontrado no footer.');
    return;
  }

  // Atualiza o conteúdo do slider no modal
  var sliderContainer = modal.querySelector('.carouselSlideImgModal');
  if (sliderContainer) {
    sliderContainer.innerHTML = slidesHtml;
  } else {
    console.error('Container com a classe "carouselSlideImgModal" não foi encontrado no modal.');
    return;
  }

  // Atualiza a legenda abaixo do carousel
  var captionEl = modal.querySelector('#carouselCaption');
  if (captionEl) {
    captionEl.innerHTML = items[activeIndex].caption;
  }

  // Se o slider já estiver inicializado, "unslick" para reinicializar com os novos slides
  if (jQuery(sliderContainer).hasClass('slick-initialized')) {
    jQuery(sliderContainer).slick('unslick');
  }

  // Inicializa o Slick Slider com as configurações desejadas
  jQuery(sliderContainer).slick({
    slidesToShow: 1,         // Exibe 1 slide por vez
    slidesToScroll: 1,       // Avança 1 slide por vez
    rows: 1,
    autoplay: false,         // Autoplay desativado
    dots: false,
    arrows: true,
    draggable: true,
    adaptiveHeight: true,
    infinite: true,
    initialSlide: activeIndex, // Inicia no slide clicado
    responsive: [
      {
        breakpoint: 991, // Configurações para telas menores
        settings: {
          infinite: false,
          rtl: false,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
        }
      }
    ]
  });

  // Variável para garantir que um clique resulte em apenas uma transição
  var isTransitioning = false;
  jQuery(sliderContainer).on('beforeChange', function (e, slick, currentSlide, nextSlide) {
    if (isTransitioning) {
      e.preventDefault();
    } else {
      isTransitioning = true;
    }
  });
  jQuery(sliderContainer).on('afterChange', function (e, slick, currentSlide) {
    isTransitioning = false;
  });

  // Exibe o modal utilizando a API do Bootstrap
  var modalInstance = new bootstrap.Modal(modal, {
    keyboard: true,
    backdrop: true
  });
  modalInstance.show();
});
