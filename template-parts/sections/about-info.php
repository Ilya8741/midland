<div class="about-info">
    <div class="about-info-wrapper">
        <?php if (have_rows('items')) :
            $i = 0;
        ?>
            <?php while (have_rows('items')) : the_row();
                $i++;
                $subtitle = get_sub_field('subtitle');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
                $aos = $i === 1 ? 'fade-right' : 'fade-left';
            ?>
                <div class="about-info-item" data-aos="<?php echo esc_attr($aos); ?>">
                    <?php if (!empty($subtitle)) : ?>
                        <p class="about-info-subtitle">
                            <?php echo esc_html($subtitle); ?>
                        </p>
                    <?php endif; ?>
                    <?php if (!empty($title)) : ?>
                        <div class="about-info-title main-title-h3">
                            <?php echo wp_kses_post($title); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($content)) : ?>
                        <div class="about-info-content">
                            <?php echo wp_kses_post($content); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>