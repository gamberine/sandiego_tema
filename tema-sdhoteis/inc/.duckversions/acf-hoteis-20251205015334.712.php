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
 * Campos do CPT Hotéis em uma única tela/tab.
 */
acf_add_local_field_group(
  [
  'key' => 'group_sd_cpt_hoteis',
  'title' => 'Detalhes do Hotel',
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
