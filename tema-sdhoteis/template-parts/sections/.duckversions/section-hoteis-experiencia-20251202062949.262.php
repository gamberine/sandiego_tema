<?php
/**
 * Seção: Experiência San Diego (página Hotéis)
 */

$page_id = get_the_ID();
$titulo  = sd_field('hoteis_experiencia_titulo', $page_id, 'Experiência San Diego');
$itens   = sd_field('hoteis_experiencia_itens', $page_id);
?>

<?php if ($itens) : ?>
  <section class="sd-hoteis-experiencia section-pad">
    <div class="container">
      <div class="sd-section-header text-center mb-4">
        <?php if ($titulo) : ?>
          <h2 class="sd-title display-6 mb-0"><?php echo esc_html($titulo); ?></h2>
        <?php endif; ?>
      </div>

      <div class="sd-experiencia-carousel">
        <?php foreach ($itens as $item) :
          $img     = isset($item['imagem']['url']) ? $item['imagem']['url'] : '';
          $legenda = isset($item['legenda']) ? $item['legenda'] : '';
          $link    = isset($item['link']) ? $item['link'] : '';
        ?>
          <div class="sd-experiencia-card">
            <?php if ($link) : ?>
              <a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener noreferrer">
            <?php endif; ?>

            <?php if ($img) : ?>
              <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($legenda); ?>">
            <?php else : ?>
              <div class="sd-experiencia-card__placeholder"></div>
            <?php endif; ?>

            <?php if ($legenda) : ?>
              <div class="sd-experiencia-card__legend"><?php echo esc_html($legenda); ?></div>
            <?php endif; ?>

            <?php if ($link) : ?>
              </a>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
