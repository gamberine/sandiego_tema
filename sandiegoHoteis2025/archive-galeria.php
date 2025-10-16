<?php
get_header();
?>

<div class="galeria-container">
  <h1>Galeria de Fotos</h1>
  <div class="galeria-grid">
    <?php
    $args = array(
      'post_type' => 'galeria',
      'posts_per_page' => -1, // Exibir todos os posts
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();
        // $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large'); 
      $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Pega a imagem na melhor qualidade disponível
    ?>
        <div class="galeria-item">
          <a href="<?php echo esc_url($thumbnail); ?>" target="_blank">
            <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php the_title(); ?>">
          </a>
          <h2><?php the_title(); ?> asdf</h2>
        </div>
    <?php
      endwhile;
      wp_reset_postdata();
    else :
      echo '<p>Nenhuma foto encontrada.</p>';
    endif;
    ?>
  </div>
</div>

<?php
get_footer();
?>