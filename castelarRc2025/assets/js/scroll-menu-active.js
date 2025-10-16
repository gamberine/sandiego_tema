// Gamberine - adicionar o item ativo conforme rolagem da tela com rolagem suave ao clicar nos links
jQuery(document).ready(function(jQuery) {
    // Função para monitorar a rolagem da tela e adicionar a classe ativa ao item do menu
    jQuery(window).on('scroll', function() {
        var scrollPos = jQuery(window).scrollTop();
        
        // Verifica se o scroll está próximo ao topo da página
        if (scrollPos < 50) { // Ajuste o valor conforme necessário
            // Remove 'current-menu-item' e adiciona 'current_page_item' ao item de início
            jQuery('#primary-menu-list .menu-item').removeClass('current-menu-item');
            jQuery('#primary-menu-list .menu-item-home').addClass('current_page_item');
        } else {
            // Remove 'current_page_item' do item de início quando o usuário rola para baixo
            jQuery('#primary-menu-list .menu-item-home').removeClass('current_page_item');
  
            // Itera sobre cada seção para encontrar qual está visível
            jQuery('section').each(function() {
                var sectionTop = jQuery(this).offset().top - 100; // Ajuste o offset conforme necessário
                var sectionBottom = sectionTop + jQuery(this).outerHeight();
                
                // Verifica se a seção está visível na janela de visualização
                if (scrollPos >= sectionTop && scrollPos < sectionBottom) {
                    var sectionId = jQuery(this).attr('id');
                    
                    // Remove a classe ativa de todos os itens de menu
                    jQuery('#primary-menu-list .menu-item').removeClass('current-menu-item scroll-menu-active');
                    
                    // Adiciona a classe ativa ao item do menu correspondente
                    jQuery('#primary-menu-list a[href="#' + sectionId + '"]').parent().addClass('current-menu-item scroll-menu-active');
                }
            });
        }
    });
  
    // JavaScript para rolagem suave ao clicar nos links do menu
    jQuery('#primary-menu-list a').on('click', function(event) {
        var targetHref = jQuery(this).attr('href');
        var targetId = targetHref.includes('#') ? targetHref.split('#')[1] : '';
  
        // Verifica se o link tem um ID e está na mesma página
        if (targetId && jQuery('#' + targetId).length) {
            event.preventDefault(); // Evita o comportamento padrão de pular diretamente
  
            // Realiza a rolagem suave para o ID específico
            jQuery('html, body').animate({
                scrollTop: jQuery('#' + targetId).offset().top - 100 // Ajuste o offset conforme necessário
            }, 80); // Duração da animação em milissegundos
        }
    });
  });
  
  
  