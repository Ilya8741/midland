<?php
$subtitle      = get_sub_field('subtitle');
$title         = get_sub_field('title'); 
$video         = get_sub_field('video');
$autoplay = get_sub_field('autoplay');

$video_url  = null;
$video_mime = null;

if (is_array($video)) {
    $video_url  = !empty($video['url']) ? $video['url'] : null;
    $video_mime = !empty($video['mime_type']) ? $video['mime_type'] : null;
} elseif (is_numeric($video)) {
    $video_url  = wp_get_attachment_url((int) $video);
    $video_mime = $video ? get_post_mime_type((int) $video) : null;
} elseif (is_string($video) && $video) {
    $video_url = $video;
}
?>

<section class="about-hero">
    <div class="about-hero-wrapper main-container">
        <div class="about-hero-header">
            <div class="about-hero-header-left" data-aos="fade-right">
                <?php if (!empty($subtitle)) : ?>
                    <h5 class="about-hero-subtitle">
                        <?php echo esc_html($subtitle); ?>
                    </h5>
                <?php endif; ?>
                <?php if (!empty($title)) : ?>
                    <div class="about-hero-title main-title-h1">
                        <?php echo wp_kses_post($title); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="about-hero-header-right" data-aos="fade-left">
                <?php if (have_rows('items')) : ?>
                    <?php while (have_rows('items')) : the_row();
                        $icon = get_sub_field('icon');
                        $text = get_sub_field('text');
                    ?>
                        <div class="about-hero-item">
                            <?php if (!empty($icon)) : ?>
                                <img
                                    class="about-hero-item-icon"
                                    src="<?php echo esc_url($icon['url']); ?>"
                                    alt="<?php echo esc_attr($icon['alt']); ?>">
                            <?php endif; ?>
                            <?php if (!empty($text)) : ?>
                                <p class="about-hero-item-text">
                                    <?php echo esc_html($text); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
       <div class="about-hero-main" data-aos="fade-up">
    <div class="video-block">
        <?php if (!$autoplay) : ?>
            <button class="video-button" aria-label="Play video">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                    <path d="M0.5 1.83373C0.499931 1.59912 0.561764 1.36865 0.679256 1.16559C0.796748 0.962524 0.96574 0.794055 1.16917 0.677193C1.37259 0.56033 1.60326 0.499211 1.83786 0.500008C2.07246 0.500804 2.3027 0.563488 2.50533 0.681729L10.5033 5.34706C10.7052 5.46418 10.8727 5.63223 10.9893 5.8344C11.1058 6.03657 11.1673 6.26579 11.1675 6.49915C11.1677 6.73251 11.1066 6.96184 10.9904 7.16422C10.8742 7.36659 10.707 7.53493 10.5053 7.65239L2.50533 12.3191C2.3027 12.4373 2.07246 12.5 1.83786 12.5008C1.60326 12.5016 1.37259 12.4405 1.16917 12.3236C0.96574 12.2067 0.796748 12.0383 0.679256 11.8352C0.561764 11.6321 0.499931 11.4017 0.5 11.1671V1.83373Z" stroke="#2197C1" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>Play video</span>
            </button>
        <?php endif; ?>

        <?php if ($video_url) : ?>
            <video
                class="about-hero-video"
                preload="metadata"
                <?php if ($autoplay) : ?>
                    autoplay
                    muted
                    playsinline
                    loop
                <?php endif; ?>
                <?php if (!$autoplay) : ?>
                    controls
                <?php endif; ?>
            >
                <source
                    src="<?php echo esc_url($video_url); ?>"
                    <?php if (!empty($video_mime)) : ?>
                        type="<?php echo esc_attr($video_mime); ?>"
                    <?php endif; ?>
                >
                Your browser does not support the video tag.
            </video>
        <?php endif; ?>
    </div>
</div>
    </div>
</section>