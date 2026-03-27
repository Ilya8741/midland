<?php
$title   = get_sub_field('title');
$text    = get_sub_field('text');
$link    = get_sub_field('link');
$maintenance_version = get_sub_field('maintenance_version');
$no_spacing = get_sub_field('no_spacing');

?>

<div class="offer-grid main-container <?php if ($no_spacing): ?> offer-grid--no-spacing<?php endif; ?> <?php if ($maintenance_version): ?> offer-grid--maintenance<?php endif; ?>">
    <?php if (!empty($title)) : ?>
        <div class="main-header-section offer-grid-header-section">
            <div data-aos="fade-right">
                <?php if (!empty($title)) : ?>
                    <h2 class="offer-grid-title main-title-h3"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
            </div>
            <div data-aos="fade-left">
                <?php if (!empty($text)) : ?>
                    <p class="carousel-section-text">
                        <?php echo wp_kses_post($text); ?>
                    </p>
                <?php endif; ?>
                <?php if (!empty($link) && !empty($link['url'])) :
                    $btn_url    = $link['url'];
                    $btn_title  = !empty($link['title']) ? $link['title'] : 'Learn more';
                    $btn_target = !empty($link['target']) ? $link['target'] : '_self';
                    $btn_rel    = ($btn_target === '_blank') ? 'noopener noreferrer' : '';
                ?>
                    <a href="<?php echo esc_url($btn_url); ?>"
                        class="offer-grid-button main-button"
                        target="<?php echo esc_attr($btn_target); ?>"
                        <?php if ($btn_rel) : ?>rel="<?php echo esc_attr($btn_rel); ?>" <?php endif; ?>>
                        <?php echo esc_html($btn_title); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php
    $grid_items = get_sub_field('grid_items');
    $count = is_array($grid_items) ? count($grid_items) : 0;
    ?>
    <div class="offer-grid-main <?php echo ($count > 2) ? 'three-offer-grid-main' : ''; ?>">
        <?php if (have_rows('grid_items')) : ?>
            <?php while (have_rows('grid_items')) : the_row();
                $slide_image = get_sub_field('image');
                $slide_title = get_sub_field('title');
                $slide_link  = get_sub_field('link');
                $slide_tag  = get_sub_field('tag');
                $slide_price  = get_sub_field('price');
                $slide_guarantee  = get_sub_field('guarantee');
            ?>
                <div class="home-slider-slide offer-grid-item" data-aos="fade-up">
                    <?php if (!empty($slide_image['id'])) : ?>
                        <a href="<?php echo esc_url($slide_link['url']); ?>"
                            target="<?php echo esc_attr(!empty($slide_link['target']) ? $slide_link['target'] : '_self'); ?>"
                            <?php if (!empty($slide_link['target']) && $slide_link['target'] === '_blank') : ?>rel="noopener noreferrer" <?php endif; ?>>
                            <div class="home-slider-slide-image-wrapper offer-grid-image-wrapper">
                                <?php if (!$maintenance_version): ?>
                                    <?php if (!empty($slide_tag)) : ?>
                                        <div class="home-slider-slide-tag">
                                            <?php echo esc_html($slide_tag); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php
                                echo wp_get_attachment_image(
                                    $slide_image['id'],
                                    'full',
                                    false,
                                    array('class' => 'home-slider-slide-image')
                                );
                                ?>
                            </div>
                        </a>
                    <?php endif; ?>
                    <?php if ($maintenance_version): ?>
                        <?php if (!empty($slide_tag)) : ?>
                            <p class="maintenance-tag">
                                <?php echo esc_html($slide_tag); ?>
                            </p>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if (!empty($slide_title)) : ?>
                        <h5 class="home-slider-slide-title">
                            <?php echo wp_kses_post($slide_title); ?>
                        </h5>
                    <?php endif; ?>

                    <?php if (!empty($slide_price)) : ?>
                        <p class="home-slider-slide-price">
                            <?php echo esc_html($slide_price); ?>
                        </p>
                    <?php endif; ?>
                    <?php if (!empty($slide_guarantee)) : ?>
                        <p class="home-slider-slide-guarantee">
                            <?php echo esc_html($slide_guarantee); ?>
                        </p>
                    <?php endif; ?>
                    <?php if (!empty($slide_link) && !empty($slide_link['url'])) :
                        $s_url    = $slide_link['url'];
                        $s_title  = !empty($slide_link['title']) ? $slide_link['title'] : 'View';
                        $s_target = !empty($slide_link['target']) ? $slide_link['target'] : '_self';
                        $s_rel    = ($s_target === '_blank') ? 'noopener noreferrer' : '';
                    ?>
                        <a href="<?php echo esc_url($s_url); ?>"
                            class="home-slider-slide-link"
                            target="<?php echo esc_attr($s_target); ?>"
                            <?php if ($s_rel) : ?>rel="<?php echo esc_attr($s_rel); ?>" <?php endif; ?>>
                            <?php echo esc_html($s_title); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>