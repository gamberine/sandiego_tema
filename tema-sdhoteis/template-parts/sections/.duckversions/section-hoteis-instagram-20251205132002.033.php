x'<?php
/**
 * Seção: Instagram (página Hotéis)
 */

$page_id = get_the_ID();
$titulo  = sd_field('hoteis_instagram_titulo', $page_id, 'Siga nosso Instagram');
$cards   = sd_field('hoteis_instagram_itens', $page_id);
?>

<?php if ($cards) : ?>
  <section class="sd-hoteis-instagram section-pad">
    <div class="container">
      <div class="sd-section-header text-center mb-4">
        <?php if ($titulo) : ?>
          <h2 class="sd-title display-6 mb-0"><?php echo esc_html($titulo); ?></h2>
        <?php endif; ?>
      </div>

      <div class="row g-3 sd-instagram-grid">
        <?php foreach ($cards as $card) :
          $img     = isset($card['imagem']['url']) ? $card['imagem']['url'] : '';
          $legenda = isset($card['legenda']) ? $card['legenda'] : '';
          $link    = isset($card['link']) ? $card['link'] : '';
        ?>
          <div class="col-6 col-md-3">
            <div class="sd-instagram-card">
              <?php if ($link) : ?>
                <a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener noreferrer">
              <?php endif; ?>

              <?php if ($img) : ?>
                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($legenda); ?>">
              <?php else : ?>
                <div class="sd-instagram-card__placeholder"></div>
              <?php endif; ?>

              <?php if ($legenda) : ?>
                <div class="sd-instagram-card__legend"><?php echo esc_html($legenda); ?></div>
              <?php endif; ?>

              <?php if ($link) : ?>
                </a>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
