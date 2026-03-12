<?php
$title = get_sub_field('title');
$text  = get_sub_field('text');
$link  = get_sub_field('link');
$spacing = get_sub_field('spacing');

$uid = 'carousel-section-' . get_row_index();

$section_classes = 'carousel-section';

if ($spacing === 'No spacing top') {
    $section_classes .= ' no-top';
} elseif ($spacing === 'No spacing bottom') {
    $section_classes .= ' no-bottom';
}
?>

<section class="<?php echo esc_attr($section_classes); ?>">
    <div class="carousel-section-wrapper ">
        <div class="main-header-section main-container">
            <div class="carousel-section-header-left" data-aos="fade-right">
                <?php if (!empty($title)) : ?>
                    <h2 class="carousel-section-title main-title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
            </div>
            <div class="carousel-section-header-right" data-aos="fade-left">
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
                        class="carousel-section-button main-button"
                        target="<?php echo esc_attr($btn_target); ?>"
                        <?php if ($btn_rel) : ?>rel="<?php echo esc_attr($btn_rel); ?>" <?php endif; ?>>
                        <?php echo esc_html($btn_title); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="carousel-section-swiper-wrapper">
            <div class="carousel-section-swiper swiper-container swiper"
                data-carousel-section="<?php echo esc_attr($uid); ?>">
                <div class="swiper-wrapper">
                    <?php if (have_rows('slides')) : ?>

                        <?php
                        $i = 0;
                        $base_duration = 400;
                        ?>
                        <?php while (have_rows('slides')) : the_row();
                            $slide_image = get_sub_field('image');
                            $duration = $base_duration + ($i * 100);
                        ?>
                            <div class="swiper-slide">
                                <div class="carousel-section-slide" data-aos="fade-right"
                                    data-aos-duration="<?php echo esc_attr($duration); ?>">
                                    <?php if (!empty($slide_image['id'])) : ?>
                                        <?php
                                        echo wp_get_attachment_image(
                                            $slide_image['id'],
                                            'full',
                                            false,
                                            array('class' => 'carousel-section-slide-image')
                                        );
                                        ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php
                            $i++;
                        endwhile;
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const uid = <?php echo wp_json_encode($uid); ?>;

        const root = document.querySelector('[data-carousel-section="' + uid + '"]');
        if (!root || typeof Swiper === 'undefined') return;

        const swiper = new Swiper(root, {
            slidesPerView: 1.1,
            spaceBetween: 24,
            speed: 600,
            autoplay: true,
            loop: true,
            breakpoints: {
                768: {
                    slidesPerView: 2.2
                },
                1024: {
                    slidesPerView: 3.7
                },
                1441: {
                    slidesPerView: 4
                },
            },
        });

    });
</script>