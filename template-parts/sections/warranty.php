<?php
$title = get_sub_field('title');
$text  = get_sub_field('text');
$link  = get_sub_field('link');
?>

<section class="warranty main-section">
    <div class="warranty-wrapper">
        <div class="warranty-left" data-aos="fade-right">
            <?php if (!empty($title)) : ?>
                <h3 class="warranty-title main-title-h3"><?php echo esc_html($title); ?></h3>
            <?php endif; ?>
            <?php if (!empty($text)) : ?>
                <p class="warranty-content"><?php echo esc_html($text); ?></p>
            <?php endif; ?>
            <?php if (!empty($link) && is_array($link) && !empty($link['url'])) :
                $url        = $link['url'];
                $link_title = !empty($link['title']) ? $link['title'] : 'Learn more';
                $target     = !empty($link['target']) ? $link['target'] : '_self';
            ?>
                <a href="<?php echo esc_url($url); ?>"
                    target="<?php echo esc_attr($target); ?>"
                    class="warranty-button main-button">
                    <?php echo esc_html($link_title); ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="warranty-items" data-aos="fade-left">
            <?php if (have_rows('items')) : ?>
                <?php while (have_rows('items')) : the_row();
                    $image = get_sub_field('image');
                    $title = get_sub_field('text');
                ?>
                    <div class="warranty-item">
                        <?php if (!empty($image['id'])) : ?>
                            <div class="warranty-image-wrapper">
                                <?php
                                echo wp_get_attachment_image(
                                    $image['id'],
                                    'full',
                                    false,
                                    array('class' => 'main-image')
                                );
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($title)) : ?>
                            <div class="warranty-item-title">
                                <?php echo wp_kses_post($title); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php
                endwhile;
                ?>
            <?php endif; ?>
        </div>
    </div>
</section>