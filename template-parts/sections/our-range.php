<?php
// Layout fields
$title = get_sub_field('title');
$link  = get_sub_field('link');
?>

<div class="our-range section-padding">
    <div class="our-range-wrapper main-container">
        <div class="home-slider-header our-range-header">
            <?php if (!empty($title)) : ?>
                <h2 class="main-title" data-aos="fade-right"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if (!empty($link) && !empty($link['url'])) :
                $btn_url    = $link['url'];
                $btn_title  = !empty($link['title']) ? $link['title'] : 'Learn more';
                $btn_target = !empty($link['target']) ? $link['target'] : '_self';
                $btn_rel    = ($btn_target === '_blank') ? 'noopener noreferrer' : '';
            ?>
                <div data-aos="fade-left">
                    <a href="<?php echo esc_url($btn_url); ?>"
                        class="main-button"
                        target="<?php echo esc_attr($btn_target); ?>"
                        <?php if ($btn_rel) : ?>rel="<?php echo esc_attr($btn_rel); ?>" <?php endif; ?>>
                        <?php echo esc_html($btn_title); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="our-range-grid">
            <?php if (have_rows('grid_items')) : ?>
                <?php
                $duration = 400;
                while (have_rows('grid_items')) : the_row();
                    $slide_image = get_sub_field('image');
                    $slide_title = get_sub_field('title');
                    $slide_link  = get_sub_field('link');
                ?>
                    <div class="our-range-grid-item" data-aos="fade-right" data-aos-duration="<?php echo esc_attr($duration); ?>">
                        <?php if (!empty($slide_image['id'])) : ?>
                            <div class="our-range-image-wrapper">
                                <?php
                                echo wp_get_attachment_image(
                                    $slide_image['id'],
                                    'full',
                                    false,
                                    array('class' => 'main-image')
                                );
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($slide_title)) : ?>
                            <h5 class="home-slider-slide-title">
                                <?php echo esc_html($slide_title); ?>
                            </h5>
                        <?php endif; ?>
                        <?php if (!empty($slide_link) && !empty($slide_link['url'])) :
                            $s_url    = $slide_link['url'];
                            $s_title  = !empty($slide_link['title']) ? $slide_link['title'] : 'View';
                            $s_target = !empty($slide_link['target']) ? $slide_link['target'] : '_self';
                            $s_rel    = ($s_target === '_blank') ? 'noopener noreferrer' : '';
                        ?>
                            <a href="<?php echo esc_url($s_url); ?>"
                                class="home-slider-slide-link our-range-link"
                                target="<?php echo esc_attr($s_target); ?>"
                                <?php if ($s_rel) : ?>rel="<?php echo esc_attr($s_rel); ?>" <?php endif; ?>>
                                <?php echo esc_html($s_title); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php
                    $duration += 100;
                endwhile;
                ?>
            <?php endif; ?>
        </div>
    </div>
</div>