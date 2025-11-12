<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */


$footer_posts = get_posts(
  array(
    'post_type'      => 'conteudo',
    'posts_per_page' => 1,
    'orderby'        => 'date',
    'order'          => 'DESC',
  )
);

$footer_entry = ! empty($footer_posts) ? $footer_posts[0] : null;

if ($footer_entry instanceof WP_Post) {
  setup_postdata($footer_entry);
}

$footer_logo = $footer_entry ? get_field('logomarca_rodape', $footer_entry->ID) : null;
$logo_url    = is_array($footer_logo) ? ($footer_logo['url'] ?? '') : (is_string($footer_logo) ? $footer_logo : '');
$logo_alt    = is_array($footer_logo) ? ($footer_logo['alt'] ?? '') : '';

$get_footer_field = static function ($field_name, $default = '') use ($footer_entry) {
  if (! ($footer_entry instanceof WP_Post)) {
    return $default;
  }

  $value = get_field($field_name, $footer_entry->ID);

  if (null === $value || false === $value) {
    return $default;
  }

  if (is_string($value)) {
    $value = trim($value);
  }

  if ('' === $value) {
    return $default;
  }

  return $value;
};

$company_menu_title = $get_footer_field('footer_company_menu_title') ?: __('Nossa Empresa', 'temabasegamb');
$contact_title      = $get_footer_field('footer_contact_title') ?: __('Entre em contato', 'temabasegamb');
$social_title       = $get_footer_field('footer_social_title') ?: __('Siga-nos', 'temabasegamb');

$contact_items = array_filter(
  array(
    array(
      'label'   => $get_footer_field('footer_contact_admin_label') ?: __('Administração Hoteleira', 'temabasegamb'),
      'content' => $get_footer_field('footer_contact_admin_value'),
      'link'    => $get_footer_field('footer_contact_admin_link'),
    ),
    array(
      'label'   => $get_footer_field('footer_contact_reservations_label') ?: __('Reservas', 'temabasegamb'),
      'content' => $get_footer_field('footer_contact_reservations_value'),
      'link'    => $get_footer_field('footer_contact_reservations_link'),
    ),
    array(
      'label'   => $get_footer_field('footer_contact_email_label') ?: __('E-mail', 'temabasegamb'),
      'content' => $get_footer_field('footer_contact_email_value'),
      'link'    => $get_footer_field('footer_contact_email_link'),
    ),
  ),
  static function ($item) {
    return ! empty($item['content']);
  }
);

$company_info_blocks = array_filter(
  array(
    $get_footer_field('footer_company_info_primary_text'),
    $get_footer_field('footer_company_info_secondary_text'),
  ),
  static function ($info) {
    return ! empty($info);
  }
);

$company_info_lines = array();

foreach ($company_info_blocks as $info_block) {
  if (! is_string($info_block)) {
    continue;
  }

  $info_rows = preg_split('/\r\n|\r|\n/', $info_block);

  if (empty($info_rows)) {
    $company_info_lines[] = $info_block;
    continue;
  }

  foreach ($info_rows as $row) {
    $row = trim($row);

    if ('' === $row) {
      continue;
    }

    $company_info_lines[] = $row;
  }
}

$social_links = array_filter(
  array(
    array(
      'label'      => __('Facebook', 'temabasegamb'),
      'url'        => $get_footer_field('footer_social_facebook_url'),
      'icon_class' => 'fa-brands fa-facebook-f',
    ),
    array(
      'label'      => __('YouTube', 'temabasegamb'),
      'url'        => $get_footer_field('footer_social_youtube_url'),
      'icon_class' => 'fa-brands fa-youtube',
    ),
    array(
      'label'      => __('Instagram', 'temabasegamb'),
      'url'        => $get_footer_field('footer_social_instagram_url'),
      'icon_class' => 'fa-brands fa-instagram',
    ),
    array(
      'label'      => __('LinkedIn', 'temabasegamb'),
      'url'        => $get_footer_field('footer_social_linkedin_url'),
      'icon_class' => 'fa-brands fa-linkedin-in',
    ),
  ),
  static function ($social) {
    return ! empty($social['url']);
  }
);
?>

<footer class="site-footer" id="contato">
  <div class="container">
    <div class="footer-grid text-white">
      <div class="footer-brand">
        <?php if (! empty($logo_url)) : ?>
          <a class="footer-logo" href="<?php echo esc_url(home_url('/')); ?>">
            <img class="w-auto" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt ?: get_bloginfo('name')); ?>" />
          </a>
        <?php else : ?>
          <a class="footer-logo fallback" href="<?php echo esc_url(home_url('/')); ?>">
            <span><?php bloginfo('name'); ?></span>
          </a>
        <?php endif; ?>
      </div>

      <div class="footer-section footer-navigation">
        <p class="footer-section-title"><?php echo esc_html($company_menu_title); ?></p>
        <?php if (has_nav_menu('footer')) : ?>
          <?php
          wp_nav_menu(
            array(
              'theme_location'      => 'footer',
              'menu_class'          => 'footer-menu-list',
              'container'           => 'nav',
              'container_class'     => 'footer-menu',
              'container_aria_label'=> esc_attr($company_menu_title),
              'depth'               => 1,
              'fallback_cb'         => false,
            )
          );
          ?>
        <?php else : ?>
          <?php
          $fallback_links = array(
            array(
              'label' => __('Home', 'temabasegamb'),
              'url'   => home_url('/'),
            ),
            array(
              'label' => __('Sobre', 'temabasegamb'),
              'url'   => home_url('/sobre'),
            ),
            array(
              'label' => __('Hotéis', 'temabasegamb'),
              'url'   => home_url('/hoteis'),
            ),
            array(
              'label' => __('Ofertas', 'temabasegamb'),
              'url'   => home_url('/ofertas'),
            ),
            array(
              'label' => __('Blog', 'temabasegamb'),
              'url'   => home_url('/blog'),
            ),
            array(
              'label' => __('Contato', 'temabasegamb'),
              'url'   => home_url('/contato'),
            ),
          );
          ?>
          <nav class="footer-menu" aria-label="<?php echo esc_attr($company_menu_title); ?>">
            <ul class="footer-menu-list">
              <?php foreach ($fallback_links as $fallback_link) :
                $fallback_label = $fallback_link['label'] ?? '';
                $fallback_url   = $fallback_link['url'] ?? '';

                if (empty($fallback_label) || empty($fallback_url)) {
                  continue;
                }
              ?>
                <li> teste <a href="<?php echo esc_url($fallback_url); ?>"><?php echo esc_html($fallback_label); ?></a></li>
              <?php endforeach; ?>
            </ul>
          </nav>
        <?php endif; ?>
      </div>

      <div class="footer-section footer-contact">
        <p class="footer-section-title"><?php echo esc_html($contact_title); ?></p>
        <?php if (! empty($contact_items)) : ?>
          <ul class="footer-contact-list">
            <?php foreach ($contact_items as $item) :
              $item_label   = $item['label'] ?? '';
              $item_content = $item['content'] ?? '';
              $item_link    = $item['link'] ?? '';
              $link_url     = '';
              $link_target  = '';
              $link_rel     = '';

              if (is_string($item_link)) {
                $link_url = $item_link;
              } elseif (is_array($item_link)) {
                $link_url    = $item_link['url'] ?? '';
                $link_target = ! empty($item_link['target']) ? $item_link['target'] : '';
              }

              if (! empty($link_url) && is_string($link_url) && 0 === strpos($link_url, 'http')) {
                $link_rel = 'noreferrer noopener';

                if (empty($link_target)) {
                  $link_target = '_blank';
                }
              }
            ?>
              <li class="footer-contact-item">
                <?php if (! empty($item_label)) : ?>
                  <span class="footer-item-label"><?php echo esc_html($item_label); ?></span>
                <?php endif; ?>

                <?php if (! empty($link_url)) : ?>
                  <a class="footer-item-content" href="<?php echo esc_url($link_url); ?>"<?php echo $link_target ? ' target="' . esc_attr($link_target) . '"' : ''; ?><?php echo $link_rel ? ' rel="' . esc_attr($link_rel) . '"' : ''; ?>>
                    <?php echo wp_kses_post($item_content); ?>
                  </a>
                <?php else : ?>
                  <span class="footer-item-content"><?php echo wp_kses_post($item_content); ?></span>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <?php if (! empty($company_info_lines)) : ?>
          <div class="footer-extra-info">
            <?php foreach ($company_info_lines as $info_text) :
              if (! is_string($info_text) || '' === $info_text) {
                continue;
              }
            ?>
              <p><?php echo esc_html($info_text); ?></p>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="footer-section footer-social">
        <p class="footer-section-title"><?php echo esc_html($social_title); ?></p>
        <?php if (! empty($social_links)) : ?>
          <div class="footer-social-links">
            <?php foreach ($social_links as $social) :
              $social_label  = $social['label'] ?? '';
              $social_url    = $social['url'] ?? '';
              $icon_class    = $social['icon_class'] ?? '';
              $social_target = '_blank';
              $social_rel    = '';

              if (! is_string($social_url) || '' === $social_url) {
                continue;
              }

              if (0 === strpos($social_url, 'http')) {
                $social_rel = 'noreferrer noopener';
              } else {
                $social_target = '';
              }
            ?>
              <a class="footer-social-link" href="<?php echo esc_url($social_url); ?>"<?php echo $social_target ? ' target="' . esc_attr($social_target) . '"' : ''; ?><?php echo $social_rel ? ' rel="' . esc_attr($social_rel) . '"' : ''; ?> aria-label="<?php echo esc_attr($social_label ?: $social_url); ?>">
                <?php if (! empty($icon_class)) : ?>
                  <i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
                <?php else : ?>
                  <span class="footer-social-text"><?php echo esc_html($social_label); ?></span>
                <?php endif; ?>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <?php if ($footer_entry instanceof WP_Post) : ?>
    <?php get_template_part('template-parts/arquivo-whatsapp'); ?>

    <a class="btnTop" href="#top">
      <i class="fa fa-arrow-up"></i>
    </a>
  <?php endif; ?>
</footer>

<?php
if ($footer_entry instanceof WP_Post) {
  wp_reset_postdata();
}
