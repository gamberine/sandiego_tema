<?php
$slides = get_sub_field('slides');
if ($slides) :
?>
<section class="banner-section">
    <div class="banner-slider">
        <?php foreach ($slides as $slide) : ?>
            <div class="slide" style="background-image: url('<?php echo esc_url($slide['background_image']); ?>');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="banner-content">
                                <h2><?php echo esc_html($slide['title']); ?></h2>
                                <?php if ($slide['button_text'] && $slide['button_link']) : ?>
                                    <a href="<?php echo esc_url($slide['button_link']); ?>" class="btn btn-primary"><?php echo esc_html($slide['button_text']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>
