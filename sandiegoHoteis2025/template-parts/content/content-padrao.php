<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section class="gridGradiente">
        <h1 class="title-primary text-white text-center mt-5 pt-5"><?php the_title(); ?></h1>
    </section>

    <?php if (has_post_thumbnail()) : ?>
        <!-- <header class="entry-header alignwide">
            < ?php tema_base_gamb_post_thumbnail(); ?>
        </header> -->

        <div class="container main-content">
            <div class="row boxPostagem">
                <div class="gridPostSingle col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="imgPost">
                        <!-- <img src="< ?php the_post_thumbnail_url(); ?>" /> -->
                    </div>
                    <div class="contentPost">
                        <?php echo the_content(); ?>
                    </div>
                </div>
            </div>
        </div>


    <?php elseif (! has_post_thumbnail()) : ?>
        <div class="container main-content">
            <div class="row boxPostagem">
                <?php
                the_content();

                wp_link_pages(
                    array(
                        'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'temabasegamb') . '">',
                        'after'    => '</nav>',
                        /* translators: %: page number. */
                        'pagelink' => esc_html__('Page %', 'temabasegamb'),
                    )
                );
                ?>
            </div>
        </div><!-- .entry-content -->
    <?php endif; ?>



    <!-- < ?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer default-max-width">
            < ?php
            edit_post_link(
                sprintf(
                    esc_html__('Edit %s', 'temabasegamb'),
                    '<span class="screen-reader-text">' . get_the_title() . '</span>'
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer>
    < ?php endif; ?> -->
</article><!-- #post-<?php the_ID(); ?> -->

</main>

<!-- < ?php get_sidebar(); ?> -->
<!-- < ?php get_footer(); ?> -->