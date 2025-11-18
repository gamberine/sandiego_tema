<?php
/**
 * Template exibido quando o modo de manutenção está ativo.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
  <style>
    body.sd-maintenance-body {
      margin: 0;
      min-height: 100vh;
      background: #f4f6f8;
      color: #05252c;
      font-family: 'Fira Sans', 'Helvetica Neue', Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .sd-maintenance-wrapper {
      width: 100%;
      max-width: 560px;
      padding: 64px 24px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 48px;
    }
    .sd-maintenance-logo img {
      max-width: 220px;
      width: 100%;
      height: auto;
    }
    .sd-maintenance-logo .site-title {
      font-size: 1.5rem;
      font-weight: 600;
      letter-spacing: 0.05em;
    }
    .sd-maintenance-card {
      background: #ffffff;
      border-radius: 20px;
      padding: 48px 32px;
      box-shadow: 0 15px 50px rgba(5, 37, 44, 0.1);
      width: 100%;
    }
    .sd-maintenance-icon {
      width: 140px;
      height: 140px;
      margin: 0 auto 24px;
    }
    .sd-maintenance-icon img {
      width: 100%;
      height: 100%;
    }
    .sd-maintenance-message {
      font-size: 1.25rem;
      font-weight: 500;
      margin: 0;
      color: #005b69;
    }
    .sd-maintenance-footer {
      font-size: 0.9rem;
      color: #5a6b72;
    }
    @media (max-width: 480px) {
      .sd-maintenance-wrapper {
        padding: 48px 16px;
      }
      .sd-maintenance-card {
        padding: 36px 24px;
      }
    }
  </style>
</head>
<body <?php body_class('sd-maintenance-body'); ?>>
  <div class="sd-maintenance-wrapper">
    <header class="sd-maintenance-logo">
      <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <div class="site-title"><?php bloginfo('name'); ?></div>
      <?php endif; ?>
    </header>

    <main class="sd-maintenance-card" role="main">
      <div class="sd-maintenance-icon">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/imagens/sinc-icon.svg'); ?>" alt="Ícone de sincronização" loading="lazy" />
      </div>
      <p class="sd-maintenance-message">Em sincronização com o repositório para atualização</p>
    </main>

    <footer class="sd-maintenance-footer">
      <p>&copy; <?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?>.</p>
    </footer>
  </div>
  <?php wp_footer(); ?>
</body>
</html>
