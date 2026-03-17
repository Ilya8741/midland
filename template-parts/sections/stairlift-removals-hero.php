<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$tags = get_sub_field('tags');
$text = get_sub_field('text');

$contact_title = get_sub_field('contact_title');
$contact_text = get_sub_field('contact_text');
$link = get_sub_field('contact_link');
?>


<div class="stairlift-removals-hero">
    <div class="stairlift-removals-hero-wrapper main-container">
        <div class="stairlift-removals-hero-content" data-aos="fade-right">
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
            <?php if (!empty($text)) : ?>
                <p class="maintenance-hero-text stairlift-removals-hero-text">
                    <?php echo esc_html($text); ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="stairlift-removals-item" data-aos="fade-left">
            <div class="stairlift-removals-item-content">
                <?php if (!empty($contact_title)) : ?>
                    <h5 class="stairlift-removals-item-title">
                        <?php echo wp_kses_post($contact_title); ?>
                    </h5>
                <?php endif; ?>
                <?php if (!empty($contact_text)) : ?>
                    <p class="stairlift-removals-item-text">
                        <?php echo wp_kses_post($contact_text); ?>
                    </p>
                <?php endif; ?>
            </div>
            <?php if (!empty($link) && !empty($link['url'])) :
                $btn_url    = $link['url'];
                $btn_title  = !empty($link['title']) ? $link['title'] : 'Learn more';
                $btn_target = !empty($link['target']) ? $link['target'] : '_self';
                $btn_rel    = ($btn_target === '_blank') ? 'noopener noreferrer' : '';
            ?>
                <a href="<?php echo esc_url($btn_url); ?>"
                    class="stairlift-removals-item-button main-button"
                    target="<?php echo esc_attr($btn_target); ?>"
                    <?php if ($btn_rel) : ?>rel="<?php echo esc_attr($btn_rel); ?>" <?php endif; ?>>
                    <?php echo esc_html($btn_title); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>