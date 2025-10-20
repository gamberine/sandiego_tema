<?php
/**
 * Template Name: Contato Hotéis
 *
 * Página que lista as informações de contato de todos os hotéis cadastrados
 * e exibe um formulário de contato.
 */
get_header();
?>
<section class="section-pad">
  <div class="container">
    <h1 class="sd-title display-6 mb-4">Contato Hotéis</h1>
    <div class="row g-4">
      <?php
      $loop = new WP_Query( [ 'post_type' => 'hoteis', 'posts_per_page' => -1 ] );
      while ( $loop->have_posts() ) {
        $loop->the_post();
        ?>
        <div class="col-12 col-md-6">
          <div class="sd-card p-3 h-100">
            <div class="d-flex gap-3 align-items-start">
              <div style="width:84px;height:84px;overflow:hidden;border-radius:12px;">
                <?php the_post_thumbnail( 'thumbnail', [ 'class' => 'w-100 h-100 object-fit-cover' ] ); ?>
              </div>
              <div>
                <h5 class="mb-1"><?php the_title(); ?></h5>
                <div class="small text-muted mb-2">
                  <?php echo esc_html( sd_field('hotel_cidade') ); ?> • <?php echo esc_html( sd_field('hotel_bairro') ); ?>
                </div>
                <div class="small">Telefone: <a href="tel:<?php echo esc_attr( sd_field('hotel_tel') ); ?>"><?php echo esc_html( sd_field('hotel_tel') ); ?></a></div>
                <div class="small">E-mail: <a href="mailto:<?php echo esc_attr( sd_field('hotel_email') ); ?>"><?php echo esc_html( sd_field('hotel_email') ); ?></a></div>
                <div class="small">Endereço: <?php echo esc_html( sd_field('hotel_endereco') ); ?></div>
              </div>
            </div>
          </div>
        </div>
      <?php }
      wp_reset_postdata();
      ?>
    </div>

    <div class="mt-5">
      <h2 class="sd-title h4 mb-3"><?php echo esc_html( sd_field('contato_form_titulo', get_the_ID(), 'Quer conversar sobre os nossos serviços de administração?') ); ?></h2>
      <p><?php echo esc_html( sd_field('contato_form_sub', get_the_ID(), 'Preencha seus dados que entraremos em contato.') ); ?></p>
      <div class="my-3">
        <?php echo do_shortcode( sd_field('contato_form_shortcode', get_the_ID(), '[contact-form-7 id="1" title="Formulário"]') ); ?>
      </div>
      <div class="mt-3">
        <a class="btn btn-outline-primary" href="<?php echo esc_url( sd_field('contato_admin_url', get_the_ID(), '#') ); ?>">Clique aqui para falar com a Administradora da Rede</a>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();
?>
