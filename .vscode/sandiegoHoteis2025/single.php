<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

get_header('vazio');

/* Start the Loop */
while (have_posts()) :
  the_post();

  // get_template_part('template-parts/content/content-galeria');
  get_template_part('template-parts/content/content');



// Previous/next post navigation.
//     $temabasegamb_next = is_rtl() ? tema_base_gamb_get_icon_svg('ui', 'arrow_left') : tema_base_gamb_get_icon_svg('ui', 'arrow_right');
//     $temabasegamb_prev = is_rtl() ? tema_base_gamb_get_icon_svg('ui', 'arrow_right') : tema_base_gamb_get_icon_svg('ui', 'arrow_left');

//     $temabasegamb_next_label     = esc_html__('Próximo', 'temabasegamb');
//     $temabasegamb_previous_label = esc_html__('Anterior', 'temabasegamb');

//     the_post_navigation(
//         array(
//             'next_text' => '<p class="meta-nav proximoPost">' . $temabasegamb_next_label . $temabasegamb_next . '</p>',
//             'prev_text' => '<p class="meta-nav anteriorPost">' . $temabasegamb_prev . $temabasegamb_previous_label . '</p>',
//         )
//     );
endwhile; 
// End of the loop.


// get_footer();
