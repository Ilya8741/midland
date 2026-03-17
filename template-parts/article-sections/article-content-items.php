<?php if (have_rows('items')) : ?>
    <div class="article-content">
        <div class="article-content-wrapper">
            <?php while (have_rows('items')) : the_row();
                $title   = get_sub_field('title');
                $text    = get_sub_field('text');
                $image_1 = get_sub_field('image_1');
                $image_2 = get_sub_field('image_2');
            ?>
                <?php if (!empty($title)) : ?>
                    <div class="article-content-grid">
                        <h2 class="article-content-title main-title-h3">
                            <?php echo esc_html($title); ?>
                        </h2>
                        <?php if (!empty($text)) : ?>
                            <div class="article-content-text">
                                <?php echo wp_kses_post($text); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    <div class="article-content-grid">
                        <?php if (!empty($image_1['id'])) : ?>
                            <div class="article-media-image-wrapper">
                                <?php
                                echo wp_get_attachment_image(
                                    $image_1['id'],
                                    'full',
                                    false,
                                    array('class' => 'article-media-image')
                                );
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($image_2['id'])) : ?>
                            <div class="article-media-image-wrapper">
                                <?php
                                echo wp_get_attachment_image(
                                    $image_2['id'],
                                    'full',
                                    false,
                                    array('class' => 'article-media-image')
                                );
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>