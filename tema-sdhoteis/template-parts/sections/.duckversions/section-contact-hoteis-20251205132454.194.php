<?php

/**
 * Section: contact
 * Repeater: cards (title, image)
 * Fields: cta_title, cta_text
 * Contact form: basic HTML (integrate plugin later)
 */
?>
<section class="section-pad contact-hoteis">
  <div class="container">
    <div class="text-center mx-auto mb-5">
      <h4 class="accent-color mb-0">Contato</h4>
      <h2 class="primary-color">Hotéis</h2>
    </div>
    <div class="row g-4 sd-contato-hotels">
              <?php
              $loop = new WP_Query([
                'post_type'      => 'hoteis',
                'posts_per_page' => -1,
                'meta_key'       => 'hotel_ordem',
                'orderby'        => ['meta_value_num' => 'ASC', 'title' => 'ASC'],
                'meta_query'     => [
                  [
                    'key'     => 'hotel_exibir_contato',
                    'compare' => '!=',
                    'value'   => '0',
                  ],
                ],
              ]);

              if ($loop->have_posts()) :
                while ($loop->have_posts()) :
                  $loop->the_post();
                  $cidade    = sd_field('hotel_cidade');
                  $estado    = sd_field('hotel_estado');
                  $bairro    = sd_field('hotel_bairro');
                  $telefone  = sd_field('hotel_tel');
                  $whatsapp  = sd_field('hotel_whatsapp');
                  $email     = sd_field('hotel_email');
                  $endereco  = sd_field('hotel_endereco');
                  $reserva   = sd_field('hotel_url_reserva');
                  $thumb     = get_the_post_thumbnail_url(get_the_ID(), 'medium');
              ?>
          <div class="col-12 col-md-6 col-xl-3">
            <div class="sd-hotel-contact-card h-100">
              <div class="sd-hotel-contact-card__media">
                <?php if ($thumb) : ?>
                  <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>">
                <?php else : ?>
                  <div class="sd-hotel-contact-card__placeholder"></div>
                <?php endif; ?>
              </div>
              <div class="sd-hotel-contact-card__body">
                <?php if ($cidade || $estado || $bairro) : ?>
                  <div class="sd-hotel-contact-card__location">
                    <?php echo esc_html(trim($cidade . ($estado ? ' - ' . $estado : ''))); ?>
                    <?php if ($bairro) : ?>
                      <span class="sd-hotel-contact-card__bairro">- <?php echo esc_html($bairro); ?></span>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>

                <h3 class="h5 mb-2"><?php the_title(); ?></h3>

                <ul class="sd-hotel-contact-card__list">
                  <?php if ($telefone) : ?>
                    <li><span>Telefone:</span> <a href="tel:<?php echo esc_attr($telefone); ?>"><?php echo esc_html($telefone); ?></a></li>
                  <?php endif; ?>
                  <?php if ($whatsapp) : ?>
                    <li><span>WhatsApp:</span> <a href="https://wa.me/<?php echo preg_replace('/\D+/', '', esc_attr($whatsapp)); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($whatsapp); ?></a></li>
                  <?php endif; ?>
                  <?php if ($email) : ?>
                    <li><span>E-mail:</span> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></li>
                  <?php endif; ?>
                  <?php if ($endereco) : ?>
                    <li><span>Endereço:</span> <?php echo esc_html($endereco); ?></li>
                  <?php endif; ?>
                </ul>

                <div class="d-flex align-items-center gap-2">
                  <?php if ($reserva) : ?>
                    <a class="btn btn-accent flex-grow-1" href="<?php echo esc_url($reserva); ?>" target="_blank" rel="noopener noreferrer">Reservar</a>
                  <?php endif; ?>
                  <a class="btn btn-secondary flex-grow-1" href="<?php the_permalink(); ?>">Ver detalhes</a>
                </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <div class="col-12">
          <p class="text-center mb-0">Nenhum hotel cadastrado no momento.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>