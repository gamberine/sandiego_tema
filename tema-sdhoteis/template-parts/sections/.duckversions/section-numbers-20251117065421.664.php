
<?php
/**
 * Section: Numbers
 * Repeater: items (number, label)
 */
?>
<section id="numeros" class="numbers py-5">
  <div class="container">
    <?php $section_title = get_sub_field('titulo_sessao_numeros'); ?>
    <?php if (! empty($section_title)) : ?>
      <h2 class="title-xl text-center text-white mb-5"><?php echo esc_html($section_title); ?></h2>
    <?php endif; ?>
    <div class="row g-4 mt-3">
      <?php if (have_rows('items')) : ?>
        <?php
        while (have_rows('items')) :
            the_row();
            $icon         = get_sub_field('icon');
            $number_value = (string) get_sub_field('number');
            $label_value  = (string) get_sub_field('label');
            $number_clean = preg_replace('/[^\d.,]/', '', $number_value);
            $number_clean = str_replace(',', '.', $number_clean);
            $count_target = is_numeric($number_clean) ? $number_clean : '';
            $icon_url     = '';
            $icon_alt     = '';

            if (is_array($icon)) {
                $icon_url = $icon['url'] ?? '';
                $icon_alt = $icon['alt'] ?? '';
            } elseif (is_string($icon)) {
                $icon_url = $icon;
            }

            if (! $icon_url) {
                $icon_url = get_stylesheet_directory_uri() . '/assets/img/logo_white.png';
            }
            ?>
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="item h-100 text-center">
              <div class="icon mx-auto">
                <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($icon_alt ?: $label_value); ?>" style="width:64px;height:64px;object-fit:contain">
              </div>
              <div class="contagem display-5 fw-bold" <?php echo $count_target !== '' ? 'data-count="' . esc_attr($count_target) . '"' : ''; ?>>
                <?php echo esc_html($number_value); ?>
              </div>
              <?php if ($label_value) : ?>
                <div class="small"><?php echo esc_html($label_value); ?></div>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
