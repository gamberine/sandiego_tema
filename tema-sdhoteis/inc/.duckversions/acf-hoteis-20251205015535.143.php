<?php
/**
 * ACF: Campos da página Hotéis e do CPT Hotéis.
 *
 * Mantém todos os campos em abas únicas para facilitar o cadastro em produção.
 */

if (!defined('ABSPATH')) {
  exit;
}

if (!function_exists('acf_add_local_field_group')) {
  return;
}

/**
 * Campos da página de Hotéis (template page-hoteis.php).
 */
acf_add_local_field_group([
  'key' => 'group_sd_page_hoteis',
  'title' => 'Página Hotéis',
  'position' => 'acf_after_title',
  'location' => [
    [
      [
        'param' => 'page_template',
        'operator' => '==',
        'value' => 'page-hoteis.php',
      ],
    ],
  ],
  'fields' => [
    [
      'key' => 'tab_sd_hoteis_intro',
      'label' => 'Chamada',
      'type' => 'tab',
      'placement' => 'left',
    ],
    [
      'key' => 'field_sd_hoteis_subtitulo',
      'label' => 'Subtítulo',
      'name' => 'hoteis_subtitulo',
      'type' => 'text',
      'default_value' => 'Nossos Hotéis',
    ],
    [
      'key' => 'field_sd_hoteis_titulo',
      'label' => 'Título',
      'name' => 'hoteis_titulo',
      'type' => 'text',
      'default_value' => 'Desfrute do melhor da hospitalidade mineira',
    ],
    [
      'key' => 'field_sd_hoteis_mapa_bg',
      'label' => 'Imagem de fundo (mapa/linha)',
      'name' => 'hoteis_mapa_fundo',
      'type' => 'image',
      'return_format' => 'array',
      'preview_size' => 'medium',
      'library' => 'all',
      'instructions' => 'Opcional. Se vazio, usa o mapa padrão do tema.',
    ],

    [
      'key' => 'tab_sd_hoteis_grid',
      'label' => 'Grid de Hotéis',
      'type' => 'tab',
      'placement' => 'left',
    ],
    [
      'key' => 'field_sd_hoteis_grid_limite',
      'label' => 'Quantidade de hotéis',
      'name' => 'hoteis_grid_limite',
      'type' => 'number',
      'default_value' => -1,
      'instructions' => 'Use -1 para exibir todos.',
    ],
    [
      'key' => 'field_sd_hoteis_grid_ordem',
      'label' => 'Ordenação',
      'name' => 'hoteis_grid_ordem',
      'type' => 'select',
      'choices' => [
        'hotel_ordem' => 'Ordem manual (campo Ordem de exibição)',
        'title' => 'Título (A-Z)',
        'date' => 'Data de publicação (mais recentes primeiro)',
      ],
      'default_value' => 'hotel_ordem',
      'ui' => 1,
      'return_format' => 'value',
    ],

    [
      'key' => 'tab_sd_hoteis_experiencia',
      'label' => 'Experiência',
      'type' => 'tab',
      'placement' => 'left',
    ],
    [
      'key' => 'field_sd_hoteis_experiencia_titulo',
      'label' => 'Título da seção',
      'name' => 'hoteis_experiencia_titulo',
      'type' => 'text',
      'default_value' => 'Experiência San Diego',
    ],
    [
      'key' => 'field_sd_hoteis_experiencia_itens',
      'label' => 'Itens (slides)',
      'name' => 'hoteis_experiencia_itens',
      'type' => 'repeater',
      'layout' => 'row',
      'button_label' => 'Adicionar slide',
      'sub_fields' => [
        [
          'key' => 'field_sd_hoteis_experiencia_img',
          'label' => 'Imagem',
          'name' => 'imagem',
          'type' => 'image',
          'return_format' => 'array',
          'preview_size' => 'medium',
          'library' => 'all',
          'required' => 1,
        ],
        [
          'key' => 'field_sd_hoteis_experiencia_legenda',
          'label' => 'Legenda',
          'name' => 'legenda',
          'type' => 'text',
        ],
        [
          'key' => 'field_sd_hoteis_experiencia_link',
          'label' => 'Link (opcional)',
          'name' => 'link',
          'type' => 'url',
        ],
      ],
    ],

    [
      'key' => 'tab_sd_hoteis_instagram',
      'label' => 'Instagram',
      'type' => 'tab',
      'placement' => 'left',
    ],
    [
      'key' => 'field_sd_hoteis_instagram_titulo',
      'label' => 'Título',
      'name' => 'hoteis_instagram_titulo',
      'type' => 'text',
      'default_value' => 'Siga nosso Instagram',
    ],
    [
      'key' => 'field_sd_hoteis_instagram_itens',
      'label' => 'Cards',
      'name' => 'hoteis_instagram_itens',
      'type' => 'repeater',
      'layout' => 'row',
      'button_label' => 'Adicionar card',
      'sub_fields' => [
        [
          'key' => 'field_sd_hoteis_instagram_img',
          'label' => 'Imagem',
          'name' => 'imagem',
          'type' => 'image',
          'return_format' => 'array',
          'preview_size' => 'medium',
          'library' => 'all',
          'required' => 1,
        ],
        [
          'key' => 'field_sd_hoteis_instagram_legenda',
          'label' => 'Legenda/Texto curto',
          'name' => 'legenda',
          'type' => 'text',
        ],
        [
          'key' => 'field_sd_hoteis_instagram_link',
          'label' => 'Link',
          'name' => 'link',
          'type' => 'url',
          'instructions' => 'Opcional. Se vazio, apenas exibe a imagem.',
        ],
      ],
    ],
  ],
]);

/**
 * Campos do CPT Hotéis em uma única tela/tab.
 */
acf_add_local_field_group([
  'key' => 'group_sd_cpt_hoteis',
  'title' => 'da dfDetalhes do Hotel',
  'position' => 'acf_after_title',
  'location' => [
    [
      [
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'hoteis',
      ],
    ],
  ],
  'fields' => [
    [
      'key' => 'tab_sd_hotel_geral',
      'label' => 'Geral',
      'type' => 'tab',
      'placement' => 'left',
    ],
    [
      'key' => 'field_sd_hotel_cidade',
      'label' => 'Cidade',
      'name' => 'hotel_cidade',
      'type' => 'text',
      'required' => 1,
    ],
    [
      'key' => 'field_sd_hotel_estado',
      'label' => 'Estado (UF)',
      'name' => 'hotel_estado',
      'type' => 'text',
      'instructions' => 'Use a sigla do estado, ex.: MG, SP.',
      'maxlength' => 2,
    ],
    [
      'key' => 'field_sd_hotel_bairro',
      'label' => 'Bairro',
      'name' => 'hotel_bairro',
      'type' => 'text',
    ],
    [
      'key' => 'field_sd_hotel_resumo',
      'label' => 'Resumo para cards',
      'name' => 'hotel_resumo',
      'type' => 'textarea',
      'rows' => 2,
      'instructions' => 'Usado nos cards da página de hotéis.',
    ],
    [
      'key' => 'field_sd_hotel_ordem',
      'label' => 'Ordem de exibição',
      'name' => 'hotel_ordem',
      'type' => 'number',
      'default_value' => 10,
      'instructions' => 'Quanto menor, mais no topo das listas.',
    ],
    [
      'key' => 'field_sd_hotel_destaque',
      'label' => 'Destacar no grid',
      'name' => 'hotel_destaque',
      'type' => 'true_false',
      'ui' => 1,
      'message' => 'Aplicar borda e efeito de destaque no card.',
    ],
    [
      'key' => 'field_sd_hotel_exibir_contato',
      'label' => 'Exibir na página de contatos',
      'name' => 'hotel_exibir_contato',
      'type' => 'true_false',
      'ui' => 1,
      'message' => 'Se desativar, o hotel não aparece no grid da página Contato.',
      'default_value' => 1,
    ],

    [
      'key' => 'tab_sd_hotel_contato',
      'label' => 'Contato & Reserva',
      'type' => 'tab',
      'placement' => 'left',
    ],
    [
      'key' => 'field_sd_hotel_tel',
      'label' => 'Telefone',
      'name' => 'hotel_tel',
      'type' => 'text',
    ],
    [
      'key' => 'field_sd_hotel_whatsapp',
      'label' => 'WhatsApp',
      'name' => 'hotel_whatsapp',
      'type' => 'text',
    ],
    [
      'key' => 'field_sd_hotel_email',
      'label' => 'E-mail',
      'name' => 'hotel_email',
      'type' => 'email',
    ],
    [
      'key' => 'field_sd_hotel_endereco',
      'label' => 'Endereço',
      'name' => 'hotel_endereco',
      'type' => 'text',
    ],
    [
      'key' => 'field_sd_hotel_url_reserva',
      'label' => 'Link de reserva',
      'name' => 'hotel_url_reserva',
      'type' => 'url',
      'instructions' => 'URL do motor de reservas da unidade.',
    ],

    [
      'key' => 'tab_sd_hotel_conteudo',
      'label' => 'Conteúdo & Mídia',
      'type' => 'tab',
      'placement' => 'left',
    ],
    [
      'key' => 'field_sd_hotel_galeria',
      'label' => 'Galeria',
      'name' => 'hotel_galeria',
      'type' => 'gallery',
      'return_format' => 'array',
      'preview_size' => 'medium',
      'library' => 'all',
      'insert' => 'append',
    ],
    [
      'key' => 'field_sd_hotel_acomodacoes',
      'label' => 'Acomodações relacionadas',
      'name' => 'hotel_acomodacoes',
      'type' => 'relationship',
      'post_type' => ['acomodacao'],
      'filters' => ['search'],
      'return_format' => 'object',
      'instructions' => 'Selecione as acomodações exibidas no single do hotel.',
    ],
    [
      'key' => 'field_sd_hotel_comodidades_obs',
      'label' => 'Observações de comodidades',
      'name' => 'hotel_comodidades_obs',
      'type' => 'textarea',
      'rows' => 2,
      'instructions' => 'Opcional. Complementa os termos da taxonomia Comodidades.',
    ],
  ],
]);
