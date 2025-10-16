<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Tema_Dev_Gamb
 * @since Tema Dev-Gamb 1.0
 */

?>

<section class="gridCinza">
    <h2 class="corPrincipal text-center">
        <?php the_title(); ?>
    </h2>
</section>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="container main-content">
        <div class="row boxPostagem">

            <div class="gridPostSingle col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="imgPost">

                    <?php if (has_post_format('video')) : ?>
                        <div>
                            <iframe style="max-width: 32vw; width: 32vw; max-height: 460px;" width="615" height="460" src="https://www.youtube.com/embed/<?php echo wp_kses_post(get_field('link_do_video_ou_audio')); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                        </div>

                    <?php elseif (has_post_format('audio')) : ?>

                    <?php else : ?>
                        <div><img src="<?php the_post_thumbnail_url(); ?>" /></div>
                    <?php endif; ?>
                </div>


                <!-- <div class="dataPost">
                    <h6 class="postDate"> < ?php echo get_the_date('M d/Y'); ?></h6>
                </div> -->
                <p><?php echo the_content(); ?></p>

            </div>
        </div>
    </div>
    <!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->