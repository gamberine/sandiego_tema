<?php
/**
 * Floating WhatsApp shortcuts rendered near the footer.
 *
 * @package Tema_Dev_Gamb
 */

$global_content_id = function_exists('tema_gepeto_get_global_content_post_id') ? tema_gepeto_get_global_content_post_id() : 0;

if (! $global_content_id) {
    return;
}

$whatsapp_variations = array(
    array(
        'field' => 'linkWhatsapp_pt',
        'class' => 'btnWhatsAppFooter',
        'label' => __('Abrir atendimento no WhatsApp (Português)', 'temabasegamb'),
    ),
    array(
        'field' => 'linkWhatsapp_ca',
        'class' => 'btnWhatsAppFooter ca',
        'label' => __('Obrir WhatsApp (Català)', 'temabasegamb'),
    ),
);

foreach ($whatsapp_variations as $variation) {
    $url = get_field($variation['field'], $global_content_id);

    if (empty($url)) {
        continue;
    }
    ?>
    <a class="<?php echo esc_attr($variation['class']); ?>" href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($variation['label']); ?>" translate="no">
      <i class="fab fa-whatsapp" aria-hidden="true"></i>
    </a>
    <?php
}
