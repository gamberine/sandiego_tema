<?php
// Obter o post pelo ID
$post_id = 3042; // Substitua 42 pelo ID do post
$post = get_post($post_id);

// Verificar se o post existe
if ($post) :
    setup_postdata($post); ?>
    <section class="gridBgSecundario" id="novidades">
        <h2 class="text-center title-primary primarypb-4"><?php echo get_the_title($post); ?></h2>
        <div><?php echo apply_filters('the_content', $post->post_content); ?></div>
    </section>
<?php wp_reset_postdata(); // Reseta o contexto global de posts
else :
    echo '<p>Post não encontrado.</p>';
endif;
?>