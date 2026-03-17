<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$tags = get_sub_field('tags');
$image = get_sub_field('image');
$process_title = get_sub_field('process_title');
$text = get_sub_field('text');
$process_text = get_sub_field('process_text');
$small_image = get_sub_field('small_image');

?>

<div class="maintenance-hero">
    <div class="maintenance-hero-wrapper">
        <div class="maintenance-hero-header" data-aos="fade-right">
            <?php if (!empty($subtitle)) : ?>
                <p class="maintenance-hero-subtitle"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>

            <?php if (!empty($title)) : ?>
                <h1 class="maintenance-hero-title main-title-h1">
                    <?php echo wp_kses_post($title); ?>
                </h1>
            <?php endif; ?>
            <?php if (!empty($tags)) : ?>
                <div class="detailed-hero__tags maintenance-hero-tags" aria-label="Product tags">
                    <?php foreach ($tags as $tag) : ?>
                        <?php if (!empty($tag['tag_text'])) : ?>
                            <span class="detailed-hero__tag maintenance-hero-tag"><?php echo esc_html($tag['tag_text']); ?></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="maintenance-hero-main">
            <div class="maintenance-hero-left" data-aos="fade-right">
                <?php if (!empty($image['id'])) : ?>
                    <div class="maintenance-hero-image-wrapper <?php if ($small_image): ?> maintenance-hero-image-wrapper--small<?php endif; ?>">
                    <?php
                    echo wp_get_attachment_image(
                        $image['id'],
                        'full',
                        false,
                        array('class' => 'maintenance-hero-image')
                    );
                    ?>
                    </div>
                 
                <?php endif; ?>
                <p class="maintenance-hero-text">
                    <?php echo esc_html($text); ?>
                </p>
            </div>
            <div class="maintenance-hero-right" data-aos="fade-left">
                <p class="maintenance-hero-process-title"><?php echo esc_html($process_title); ?></p>
                <?php if (!empty($process_text)) : ?>
                    <div class="maintenance-hero-richtext">
                        <?php echo wp_kses_post($process_text); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>