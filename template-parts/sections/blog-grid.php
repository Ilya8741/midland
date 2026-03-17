<?php

$subtitle = get_sub_field('subtitle');
$title  = get_sub_field('title');

?>

<div class="blog-grid">
    <div class="blog-grid-wrapper">
        <div class="blog-grid-header" data-aos="fade-right">
            <?php if (!empty($subtitle)) : ?>
                <p class="blog-grid-subtitle"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>

            <?php if (!empty($title)) : ?>
                <h1 class="blog-grid-title main-title">
                    <?php echo wp_kses_post($title); ?>
                </h1>
            <?php endif; ?>
        </div>
        <?php
        $manual_posts = get_sub_field('manual_posts');

        if (!empty($manual_posts) && is_array($manual_posts)) :
        ?>
            <div class="blog-grid-main">
                <?php foreach ($manual_posts as $index => $post_id) : ?>
                    <?php
                    $thumb_id = get_post_thumbnail_id($post_id);
                    $p_title  = get_the_title($post_id);
                    $p_url    = get_permalink($post_id);
                    $p_date   = get_the_date('d M Y', $post_id);
                    ?>

                    <div class="related-articles-slide blog-grid-item" data-aos="fade-up">
                        <div class="related-articles-slide-top">

                            <?php if (!empty($thumb_id)) : ?>
                                <div class="related-articles-slide-image-wrapper">
                                    <?php
                                    echo wp_get_attachment_image(
                                        $thumb_id,
                                        'full',
                                        false,
                                        array(
                                            'class' => 'related-articles-slide-image',
                                            'alt'   => $p_title,
                                        )
                                    );
                                    ?>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($p_title)) : ?>
                                <h5 class="related-articles-slide-title">
                                    <?php echo esc_html($p_title); ?>
                                </h5>
                            <?php endif; ?>

                            <div class="related-articles-slide-info">
                                <?php
                                $tags = get_the_terms($post_id, 'post_tag');
                                if (!empty($tags) && !is_wp_error($tags)) :
                                    $first_tag = $tags[0];
                                ?>
                                    <p class="related-articles-slide-article-tag">
                                        <?php echo esc_html($first_tag->name); ?>
                                    </p>
                                <?php endif; ?>

                                <svg xmlns="http://www.w3.org/2000/svg" width="3" height="3" viewBox="0 0 3 3" fill="none">
                                    <circle cx="1.5" cy="1.5" r="1.5" fill="#EEF6F8" />
                                </svg>

                                <?php if (!empty($p_date)) : ?>
                                    <p class="related-articles-slide-date">
                                        <?php echo esc_html($p_date); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                        </div>

                        <a href="<?php echo esc_url($p_url); ?>" class="home-slider-slide-link">
                            <?php echo esc_html__('Read article', 'textdomain'); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>