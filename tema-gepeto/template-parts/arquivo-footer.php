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
?>

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

$footer_logo       = $footer_entry ? get_field('logomarca_rodape', $footer_entry->ID) : null;
$logo_url          = is_array($footer_logo) ? ($footer_logo['url'] ?? '') : (is_string($footer_logo) ? $footer_logo : '');
$logo_alt          = is_array($footer_logo) ? ($footer_logo['alt'] ?? '') : '';
$company_menu_title = $footer_entry ? get_field('footer_company_menu_title', $footer_entry->ID) : '';
$contact_title      = $footer_entry ? get_field('footer_contact_title', $footer_entry->ID) : '';
$social_title       = $footer_entry ? get_field('footer_social_title', $footer_entry->ID) : '';
$contact_items      = $footer_entry ? get_field('footer_contact_items', $footer_entry->ID) : array();
$company_info_lines = $footer_entry ? get_field('footer_company_info_lines', $footer_entry->ID) : array();
$social_links       = $footer_entry ? get_field('footer_social_links', $footer_entry->ID) : array();

$company_menu_title = $company_menu_title ?: __('Nossa Empresa', 'temabasegamb');
$contact_title      = $contact_title ?: __('Entre em contato', 'temabasegamb');
$social_title       = $social_title ?: __('Siga-nos', 'temabasegamb');
?>

<footer class="site-footer" id="contato">
  <div class="container">
    <div class="footer-grid text-white">
      <div class="footer-brand">
        <?php if (! empty($logo_url)) : ?>
          <a class="footer-logo" href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt ?: get_bloginfo('name')); ?>" />
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
          <nav class="footer-menu" aria-label="<?php echo esc_attr($company_menu_title); ?>">
            <ul class="footer-menu-list">
              <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'temabasegamb'); ?></a></li>
            </ul>
          </nav>
        <?php endif; ?>
      </div>

      <div class="footer-section footer-contact">
        <p class="footer-section-title"><?php echo esc_html($contact_title); ?></p>
        <?php if (! empty($contact_items) && is_array($contact_items)) : ?>
          <ul class="footer-contact-list">
            <?php foreach ($contact_items as $item) :
              $item_label   = $item['footer_contact_label'] ?? '';
              $item_content = $item['footer_contact_content'] ?? '';
              $item_link    = $item['footer_contact_link'] ?? '';
              $link_url     = '';
              $link_target  = '';
              $link_rel     = '';

              if (empty($item_content)) {
                continue;
              }

              if (is_array($item_link)) {
                $link_url    = $item_link['url'] ?? '';
                $link_target = ! empty($item_link['target']) ? $item_link['target'] : '';
              } elseif (is_string($item_link)) {
                $link_url = $item_link;
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

        <?php if (! empty($company_info_lines) && is_array($company_info_lines)) : ?>
          <div class="footer-extra-info">
            <?php foreach ($company_info_lines as $info_line) :
              $info_text = $info_line['footer_company_info_text'] ?? '';

              if (empty($info_text)) {
                continue;
              }
            ?>
              <p><?php echo wp_kses_post($info_text); ?></p>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="footer-section footer-social">
        <p class="footer-section-title"><?php echo esc_html($social_title); ?></p>
        <?php if (! empty($social_links) && is_array($social_links)) : ?>
          <div class="footer-social-links">
            <?php foreach ($social_links as $social) :
              $social_label     = $social['footer_social_label'] ?? '';
              $social_link      = $social['footer_social_url'] ?? '';
              $icon_class       = $social['footer_social_icon_class'] ?? '';
              $social_url       = '';
              $social_target    = '';
              $social_rel       = 'noreferrer noopener';

              if (is_array($social_link)) {
                $social_url    = $social_link['url'] ?? '';
                $social_target = ! empty($social_link['target']) ? $social_link['target'] : '';
              } elseif (is_string($social_link)) {
                $social_url = $social_link;
              }

              if (empty($social_url)) {
                continue;
              }

              if (empty($social_target)) {
                $social_target = '_blank';
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
      <i class="fa-solid fa-arrow-up"></i>
    </a>
  <?php endif; ?>
</footer>

<?php
if ($footer_entry instanceof WP_Post) {
  wp_reset_postdata();
}
