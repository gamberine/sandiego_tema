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
//     if (jQuery(window).scrollTop() >= 200) {
//         jQuery('topBar').show()
//     } else {
//         jQuery('topBar').hide()
//     }
// })
jQuery(window).scroll(function () {
  if (jQuery(window).scrollTop() >= 150) {
    jQuery('header.site-header').addClass('menuSuspenso')
  } else {
    jQuery('header.site-header').removeClass('menuSuspenso')
  }
});

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
      slidesToShow: 4,
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
  if (jQuery(window).scrollTop() >= 80) {
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



// scripts.js - Código para modal dinâmico utilizando Slick Slider com legenda abaixo da imagem
// document.addEventListener('click', function (event) {
//   // Verifica se o clique ocorreu em um link (<a>) dentro de uma galeria (.gallery)
//   var galleryLink = event.target.closest('.gallery a');
//   if (!galleryLink) return;
//   event.preventDefault();

//   // Obtém o contêiner da galeria onde ocorreu o clique
//   var galleryContainer = galleryLink.closest('.gallery');
//   if (!galleryContainer) return;

//   // Seleciona todos os links (<a>) da galeria e monta a lista de itens com legenda
//   var galleryLinks = galleryContainer.querySelectorAll('a');
//   var items = [];
//   galleryLinks.forEach(function (link) {
//     var href = link.getAttribute('href');
//     var caption = '';
//     // Tenta extrair a legenda do <figcaption> do item da galeria (estrutura: .gallery-item > figcaption)
//     var galleryItem = link.closest('.gallery-item');
//     if (galleryItem) {
//       var figcaption = galleryItem.querySelector('figcaption');
//       if (figcaption) {
//         caption = figcaption.innerHTML; // ou use textContent se preferir apenas texto
//       }
//     }
//     items.push({ href: href, caption: caption });
//   });

//   // Monta os slides dinamicamente para o Slick Slider
//   // Cada slide terá a estrutura: div.imgGaleriaModal > img + div.carouselCaption
//   var slidesHtml = '';
//   items.forEach(function (item) {
//     slidesHtml += '<div class="imgGaleriaModal">';
//     slidesHtml += '<img src="' + item.href + '" alt="">';
//     slidesHtml += '<div class="carouselCaption">' + item.caption + '</div>';
//     slidesHtml += '</div>';
//   });

//   // Seleciona o modal dinâmico (inserido no footer)
//   var modal = document.getElementById('dynamicGalleryModal');
//   if (!modal) {
//     console.error('Modal com ID "dynamicGalleryModal" não foi encontrado no footer.');
//     return;
//   }

//   // Atualiza o conteúdo do slider no modal
//   var sliderContainer = modal.querySelector('.carouselSlideImgModal');
//   if (sliderContainer) {
//     sliderContainer.innerHTML = slidesHtml;
//   } else {
//     console.error('Container com a classe "carouselSlideImgModal" não foi encontrado no modal.');
//     return;
//   }

//   // Se o slider já estiver inicializado, "unslick" para reinicializar com os novos slides
//   if (jQuery(sliderContainer).hasClass('slick-initialized')) {
//     jQuery(sliderContainer).slick('unslick');
//   }

//   // Inicializa o Slick Slider com as configurações desejadas, iniciando sempre na primeira imagem
//   jQuery(sliderContainer).slick({
//     slidesToShow: 1,         // Exibe 1 slide por vez
//     slidesToScroll: 1,       // Avança 1 slide por vez
//     rows: 1,
//     autoplay: true,         // Autoplay desativado
//     autoplaySpeed: 100,
//     speed: 1000,
//     dots: false,
//     arrows: true,
//     draggable: true,
//     adaptiveHeight: true,
//     infinite: false,
//     rtl: false,
//     initialSlide: 1,         // Sempre inicia no slide 1 (índice 0)
//     responsive: [
//       {
//         breakpoint: 991, // Configurações para telas menores
//         settings: {
//           slidesToShow: 1,
//           slidesToScroll: 1,
//           dots: false,
//         }
//       }
//     ]
//   });

//   // Força o ajuste da posição e largura do slider
//   jQuery(sliderContainer).slick('setPosition');

//   // Variável para garantir que um clique resulte em apenas uma transição
//   var isTransitioning = false;
//   jQuery(sliderContainer).on('beforeChange', function (e, slick, currentSlide, nextSlide) {
//     if (isTransitioning) {
//       e.preventDefault();
//     } else {
//       isTransitioning = true;
//     }
//   });
//   jQuery(sliderContainer).on('afterChange', function (e, slick, currentSlide) {
//     isTransitioning = true;
//   });

//   // Exibe o modal utilizando a API do Bootstrap
//   var modalInstance = new bootstrap.Modal(modal, {
//     keyboard: true,
//     backdrop: true
//   });
//   modalInstance.show();
// });

document.addEventListener('click', function (event) {
  // Verifica se o clique ocorreu em um link (<a>) dentro de uma galeria (.gallery)
  var galleryLink = event.target.closest('.gallery a');
  if (!galleryLink) return;
  event.preventDefault();

  // Obtém o contêiner da galeria onde ocorreu o clique
  var galleryContainer = galleryLink.closest('.gallery');
  if (!galleryContainer) return;

  // Seleciona todos os links (<a>) da galeria e monta a lista de itens com legenda
  var galleryLinks = galleryContainer.querySelectorAll('a');
  var items = [];
  galleryLinks.forEach(function (link) {
    var href = link.getAttribute('href');
    var caption = '';
    // Tenta extrair a legenda do <figcaption> do item da galeria (estrutura: .gallery-item > figcaption)
    var galleryItem = link.closest('.gallery-item');
    if (galleryItem) {
      var figcaption = galleryItem.querySelector('figcaption');
      if (figcaption) {
        caption = figcaption.innerHTML; // ou use textContent se preferir apenas texto
      }
    }
    items.push({ href: href, caption: caption });
  });

  // Monta os slides dinamicamente para o Slick Slider
  // Cada slide terá a estrutura: div.imgGaleriaModal > img + div.carouselCaption
  var slidesHtml = '';
  items.forEach(function (item) {
    slidesHtml += '<div class="imgGaleriaModal">';
    slidesHtml += '<img src="' + item.href + '" alt="">';
    slidesHtml += '<div class="carouselCaption">' + item.caption + '</div>';
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

  // Se o slider já estiver inicializado, "unslick" para reinicializar com os novos slides
  if (jQuery(sliderContainer).hasClass('slick-initialized')) {
    jQuery(sliderContainer).slick('unslick');
  }

  // Inicializa o Slick Slider com as configurações desejadas, iniciando sempre na primeira imagem
  var isTransitioning = false; // Variável para gerenciar transições
  jQuery(sliderContainer).slick({
    slidesToShow: 1,         // Exibe 1 slide por vez
    slidesToScroll: 1,       // Avança 1 slide por vez
    rows: 1,
    autoplay: true,         // Autoplay ativado
    autoplaySpeed: 100,
    speed: 1000,
    dots: false,
    arrows: true,
    draggable: true,
    adaptiveHeight: true,
    infinite: false,
    rtl: false,
    initialSlide: 1,        // Sempre inicia no primeiro slide
    responsive: [
      {
        breakpoint: 991, // Configurações para telas menores
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
        }
      }
    ]
  });

  // Força o ajuste da posição e largura do slider
  jQuery(sliderContainer).slick('setPosition');

  // Gerenciar transições de slides
  jQuery(sliderContainer).on('beforeChange', function (e, slick, currentSlide, nextSlide) {
    if (isTransitioning) {
      e.preventDefault(); // Impede a transição caso ainda esteja bloqueada
    } else {
      isTransitioning = true; // Bloqueia novas transições
    }
  });

  jQuery(sliderContainer).on('afterChange', function (e, slick, currentSlide) {
    if (currentSlide === slick.slideCount - 1) { // Verifica se está no último slide
      isTransitioning = false; // Mantém bloqueado após o ciclo completo
    } else {
      isTransitioning = false; // Libera transições caso não seja o último slide
    }
  });

  // Exibe o modal utilizando a API do Bootstrap
  var modalInstance = new bootstrap.Modal(modal, {
    keyboard: true,
    backdrop: true
  });
  modalInstance.show();
});

// exibir essa informação no campo Instruções do Advanced Custom Fields(ACF)
function modificar_instrucoes_acf($field) {
  $pagina = 'sbi-feed-builder'; // Define a página administrativa
  $link_dinamico = admin_url("admin.php?page={$pagina}");
  $field['instructions'] = 'Acesse a página de configuração do feed aqui: <a href="'.esc_url($link_dinamico). '" target="_blank">Configuração do Feed</a>';
  return $field;
}

add_filter('acf/load_field/numero_feed_instagram', 'modificar_instrucoes_acf');