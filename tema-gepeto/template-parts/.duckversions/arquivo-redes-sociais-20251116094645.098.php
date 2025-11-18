<?php
/**
 * Social icons block displayed alongside the primary navigation.
 *
 * @package Tema_Dev_Gamb
 */

$global_content_id = function_exists('tema_gepeto_get_global_content_post_id') ? tema_gepeto_get_global_content_post_id() : 0;

if (! $global_content_id) {
    return;
}

$configured_socials = get_field('footer_social_links', $global_content_id);
$items              = array();

if (! empty($configured_socials) && is_array($configured_socials)) {
    foreach ($configured_socials as $social_item) {
        $link = $social_item['footer_social_url'] ?? null;

        if (empty($link['url'])) {
            continue;
        }

        $url    = esc_url($link['url']);
        $target = ! empty($link['target']) ? $link['target'] : '_blank';
        $label  = $social_item['footer_social_label'] ?? '';
        $icon   = $social_item['footer_social_icon_class'] ?? 'fab fa-link';

        $items[] = array(
            'url'    => $url,
            'target' => $target,
            'label'  => $label ?: $url,
            'icon'   => $icon,
        );
    }
}

// Backwards compatibility: fall back to legacy instagram/whatsapp fields.
if (empty($items)) {
    $instagram = trim((string) get_field('conta_instagram', $global_content_id));
    $whatsapp  = trim((string) get_field('linkWhatsapp', $global_content_id));

    if ($instagram) {
        $items[] = array(
            'url'    => esc_url('https://www.instagram.com/' . ltrim($instagram, '@/')),
            'target' => '_blank',
            'label'  => __('Instagram', 'temabasegamb'),
            'icon'   => 'fi fi-brands-instagram',
        );
    }

    if ($whatsapp) {
        $items[] = array(
            'url'    => esc_url($whatsapp),
            'target' => '_blank',
            'label'  => __('WhatsApp', 'temabasegamb'),
            'icon'   => 'fi fi-brands-whatsapp',
        );
    }
}

if (empty($items)) {
    return;
}
?>

<div class="iconsRedes" aria-label="<?php esc_attr_e('Redes sociais', 'temabasegamb'); ?>">
  <ul class="redesSociais">
    <?php foreach ($items as $item) : ?>
      <li>
        <a href="<?php echo esc_url($item['url']); ?>" target="<?php echo esc_attr($item['target']); ?>" rel="noopener noreferrer" aria-label="<?php echo esc_attr($item['label']); ?>">
          <?php if (! empty($item['icon'])) : ?>
            <i class="<?php echo esc_attr($item['icon']); ?>" aria-hidden="true"></i>
          <?php else : ?>
            <span class="visually-hidden"><?php echo esc_html($item['label']); ?></span>
          <?php endif; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
