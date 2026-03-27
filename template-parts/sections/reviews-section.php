<?php
// Layout fields
$title = get_sub_field('title');
$text  = get_sub_field('text');
$spacing = get_sub_field('spacing');

$uid = 'reviews-section-' . get_row_index();

$section_classes = 'reviews-section';

if ($spacing === 'Top spacing') {
    $section_classes .= ' spacing-top';
} elseif ($spacing === 'Bottom spacing ') {
    $section_classes .= ' spacing-bottom';
}  elseif ($spacing === 'All spacing ') {
    $section_classes .= ' spacing-all';
}
?>

<section class="<?php echo esc_attr($section_classes); ?> reviews-section--<?php echo esc_attr($uid); ?> main-section">
    <div class="reviews-section__wrapper">

        <div class="reviews-section-header" data-aos="fade-up">
            <?php if (!empty($title)) : ?>
                <h2 class="reviews-section-title main-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if (!empty($text)) : ?>
                <div class="reviews-section-text">
                    <?php echo wp_kses_post($text); ?>
                </div>
            <?php endif; ?>
            <div class="reviews-section-logos">
                <?php if (have_rows('logos')) : ?>
                    <?php while (have_rows('logos')) : the_row();
                        $logo = get_sub_field('image');
                        $image_url = get_sub_field('image_url');
                    ?>
                    <a href="<?php echo esc_url($image_url); ?>" target="_blank">
                        <?php if (!empty($logo['id'])) : ?>
                            <?php
                            echo wp_get_attachment_image(
                                $logo['id'],
                                'full',
                                false,
                                array('class' => 'reviews-section-logo')
                            );
                            ?>
                        <?php endif; ?>
                        </a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

        </div>

        <div class="reviews-section-main">
            <div class="reviews-section-wrapper main-container">

                <div class="reviews-section-swiper swiper-container swiper"
                    data-reviews-section="<?php echo esc_attr($uid); ?>">
                    <div class="swiper-wrapper">
                        <?php
                            $i = 0;
                            $base_duration = 400;
                            ?>
                        <?php if (have_rows('slides')) : ?>
                            <?php while (have_rows('slides')) : the_row();
                                $slide_title = get_sub_field('title');
                                $slide_text  = get_sub_field('text');
                                $slide_name  = get_sub_field('name');
                                $duration = $base_duration + ($i * 100);
                            ?>

                                <div class="swiper-slide"   >
                                    <div class="reviews-section-slide" data-aos="fade-right"
                                data-aos-duration="<?php echo esc_attr($duration); ?>">

                                        <div class="reviews-stars">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                <path d="M6.92888 0.547045C6.5278 -0.182348 5.4722 -0.182348 5.07051 0.547045C4.54227 1.5075 4.10682 2.51619 3.77008 3.55941C3.7542 3.60022 3.72626 3.63522 3.68999 3.65975C3.65373 3.68427 3.61085 3.69715 3.56708 3.69667C2.66463 3.72014 1.76512 3.80983 0.875796 3.96504C0.0533398 4.10845 -0.308984 5.09575 0.316009 5.70696C0.394748 5.78411 0.474308 5.86084 0.554687 5.93717C1.1568 6.50765 1.79435 7.03949 2.4635 7.52952C2.4939 7.54971 2.51693 7.57923 2.52913 7.61364C2.54133 7.64804 2.54205 7.68548 2.53117 7.72033C2.19335 8.73452 1.95196 9.77836 1.81021 10.8379C1.69333 11.7144 2.62098 12.2524 3.34501 11.8806C4.22399 11.4299 5.06445 10.9076 5.8579 10.3191C5.89945 10.2897 5.9491 10.2739 6 10.2739C6.0509 10.2739 6.10055 10.2897 6.1421 10.3191C6.93508 10.9083 7.7756 11.4306 8.65499 11.8806C9.37902 12.2524 10.3067 11.7144 10.1898 10.8379C10.0482 9.77838 9.80706 8.73454 9.46945 7.72033C9.45857 7.68548 9.45928 7.64804 9.47148 7.61364C9.48369 7.57923 9.50672 7.54971 9.53712 7.52952C10.2953 6.97425 11.0127 6.36538 11.684 5.70758C12.309 5.09575 11.9467 4.10845 11.1242 3.96504C10.2347 3.8098 9.33496 3.72011 8.43231 3.69667C8.38864 3.69702 8.3459 3.68409 8.30975 3.65957C8.27361 3.63506 8.24576 3.60012 8.22992 3.55941C7.89424 2.51579 7.45814 1.50699 6.92888 0.547045Z" fill="#2197C1" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                <path d="M6.92888 0.547045C6.5278 -0.182348 5.4722 -0.182348 5.07051 0.547045C4.54227 1.5075 4.10682 2.51619 3.77008 3.55941C3.7542 3.60022 3.72626 3.63522 3.68999 3.65975C3.65373 3.68427 3.61085 3.69715 3.56708 3.69667C2.66463 3.72014 1.76512 3.80983 0.875796 3.96504C0.0533398 4.10845 -0.308984 5.09575 0.316009 5.70696C0.394748 5.78411 0.474308 5.86084 0.554687 5.93717C1.1568 6.50765 1.79435 7.03949 2.4635 7.52952C2.4939 7.54971 2.51693 7.57923 2.52913 7.61364C2.54133 7.64804 2.54205 7.68548 2.53117 7.72033C2.19335 8.73452 1.95196 9.77836 1.81021 10.8379C1.69333 11.7144 2.62098 12.2524 3.34501 11.8806C4.22399 11.4299 5.06445 10.9076 5.8579 10.3191C5.89945 10.2897 5.9491 10.2739 6 10.2739C6.0509 10.2739 6.10055 10.2897 6.1421 10.3191C6.93508 10.9083 7.7756 11.4306 8.65499 11.8806C9.37902 12.2524 10.3067 11.7144 10.1898 10.8379C10.0482 9.77838 9.80706 8.73454 9.46945 7.72033C9.45857 7.68548 9.45928 7.64804 9.47148 7.61364C9.48369 7.57923 9.50672 7.54971 9.53712 7.52952C10.2953 6.97425 11.0127 6.36538 11.684 5.70758C12.309 5.09575 11.9467 4.10845 11.1242 3.96504C10.2347 3.8098 9.33496 3.72011 8.43231 3.69667C8.38864 3.69702 8.3459 3.68409 8.30975 3.65957C8.27361 3.63506 8.24576 3.60012 8.22992 3.55941C7.89424 2.51579 7.45814 1.50699 6.92888 0.547045Z" fill="#2197C1" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                <path d="M6.92888 0.547045C6.5278 -0.182348 5.4722 -0.182348 5.07051 0.547045C4.54227 1.5075 4.10682 2.51619 3.77008 3.55941C3.7542 3.60022 3.72626 3.63522 3.68999 3.65975C3.65373 3.68427 3.61085 3.69715 3.56708 3.69667C2.66463 3.72014 1.76512 3.80983 0.875796 3.96504C0.0533398 4.10845 -0.308984 5.09575 0.316009 5.70696C0.394748 5.78411 0.474308 5.86084 0.554687 5.93717C1.1568 6.50765 1.79435 7.03949 2.4635 7.52952C2.4939 7.54971 2.51693 7.57923 2.52913 7.61364C2.54133 7.64804 2.54205 7.68548 2.53117 7.72033C2.19335 8.73452 1.95196 9.77836 1.81021 10.8379C1.69333 11.7144 2.62098 12.2524 3.34501 11.8806C4.22399 11.4299 5.06445 10.9076 5.8579 10.3191C5.89945 10.2897 5.9491 10.2739 6 10.2739C6.0509 10.2739 6.10055 10.2897 6.1421 10.3191C6.93508 10.9083 7.7756 11.4306 8.65499 11.8806C9.37902 12.2524 10.3067 11.7144 10.1898 10.8379C10.0482 9.77838 9.80706 8.73454 9.46945 7.72033C9.45857 7.68548 9.45928 7.64804 9.47148 7.61364C9.48369 7.57923 9.50672 7.54971 9.53712 7.52952C10.2953 6.97425 11.0127 6.36538 11.684 5.70758C12.309 5.09575 11.9467 4.10845 11.1242 3.96504C10.2347 3.8098 9.33496 3.72011 8.43231 3.69667C8.38864 3.69702 8.3459 3.68409 8.30975 3.65957C8.27361 3.63506 8.24576 3.60012 8.22992 3.55941C7.89424 2.51579 7.45814 1.50699 6.92888 0.547045Z" fill="#2197C1" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                <path d="M6.92888 0.547045C6.5278 -0.182348 5.4722 -0.182348 5.07051 0.547045C4.54227 1.5075 4.10682 2.51619 3.77008 3.55941C3.7542 3.60022 3.72626 3.63522 3.68999 3.65975C3.65373 3.68427 3.61085 3.69715 3.56708 3.69667C2.66463 3.72014 1.76512 3.80983 0.875796 3.96504C0.0533398 4.10845 -0.308984 5.09575 0.316009 5.70696C0.394748 5.78411 0.474308 5.86084 0.554687 5.93717C1.1568 6.50765 1.79435 7.03949 2.4635 7.52952C2.4939 7.54971 2.51693 7.57923 2.52913 7.61364C2.54133 7.64804 2.54205 7.68548 2.53117 7.72033C2.19335 8.73452 1.95196 9.77836 1.81021 10.8379C1.69333 11.7144 2.62098 12.2524 3.34501 11.8806C4.22399 11.4299 5.06445 10.9076 5.8579 10.3191C5.89945 10.2897 5.9491 10.2739 6 10.2739C6.0509 10.2739 6.10055 10.2897 6.1421 10.3191C6.93508 10.9083 7.7756 11.4306 8.65499 11.8806C9.37902 12.2524 10.3067 11.7144 10.1898 10.8379C10.0482 9.77838 9.80706 8.73454 9.46945 7.72033C9.45857 7.68548 9.45928 7.64804 9.47148 7.61364C9.48369 7.57923 9.50672 7.54971 9.53712 7.52952C10.2953 6.97425 11.0127 6.36538 11.684 5.70758C12.309 5.09575 11.9467 4.10845 11.1242 3.96504C10.2347 3.8098 9.33496 3.72011 8.43231 3.69667C8.38864 3.69702 8.3459 3.68409 8.30975 3.65957C8.27361 3.63506 8.24576 3.60012 8.22992 3.55941C7.89424 2.51579 7.45814 1.50699 6.92888 0.547045Z" fill="#2197C1" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                <path d="M6.92888 0.547045C6.5278 -0.182348 5.4722 -0.182348 5.07051 0.547045C4.54227 1.5075 4.10682 2.51619 3.77008 3.55941C3.7542 3.60022 3.72626 3.63522 3.68999 3.65975C3.65373 3.68427 3.61085 3.69715 3.56708 3.69667C2.66463 3.72014 1.76512 3.80983 0.875796 3.96504C0.0533398 4.10845 -0.308984 5.09575 0.316009 5.70696C0.394748 5.78411 0.474308 5.86084 0.554687 5.93717C1.1568 6.50765 1.79435 7.03949 2.4635 7.52952C2.4939 7.54971 2.51693 7.57923 2.52913 7.61364C2.54133 7.64804 2.54205 7.68548 2.53117 7.72033C2.19335 8.73452 1.95196 9.77836 1.81021 10.8379C1.69333 11.7144 2.62098 12.2524 3.34501 11.8806C4.22399 11.4299 5.06445 10.9076 5.8579 10.3191C5.89945 10.2897 5.9491 10.2739 6 10.2739C6.0509 10.2739 6.10055 10.2897 6.1421 10.3191C6.93508 10.9083 7.7756 11.4306 8.65499 11.8806C9.37902 12.2524 10.3067 11.7144 10.1898 10.8379C10.0482 9.77838 9.80706 8.73454 9.46945 7.72033C9.45857 7.68548 9.45928 7.64804 9.47148 7.61364C9.48369 7.57923 9.50672 7.54971 9.53712 7.52952C10.2953 6.97425 11.0127 6.36538 11.684 5.70758C12.309 5.09575 11.9467 4.10845 11.1242 3.96504C10.2347 3.8098 9.33496 3.72011 8.43231 3.69667C8.38864 3.69702 8.3459 3.68409 8.30975 3.65957C8.27361 3.63506 8.24576 3.60012 8.22992 3.55941C7.89424 2.51579 7.45814 1.50699 6.92888 0.547045Z" fill="#2197C1" />
                                            </svg>
                                        </div>
                                        <div class="reviews-section-slide-bottom">
                                            <div>
                                                <?php if (!empty($slide_title)) : ?>
                                                    <h5 class="reviews-section-slide-title"><?php echo esc_html($slide_title); ?></h5>
                                                <?php endif; ?>

                                                <?php if (!empty($slide_text)) : ?>
                                                    <p class="reviews-section-slide-text"><?php echo esc_html($slide_text); ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (!empty($slide_name)) : ?>
                                                <p class="reviews-section-slide-name"><?php echo esc_html($slide_name); ?></p>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                                
                            <?php
                        $i++;
                        endwhile; ?>
                        <?php endif; ?>

                    </div>
                </div>

            </div>

            <div class="reviews-section-controls main-controls" data-reviews-section-controls="<?php echo esc_attr($uid); ?>">
                <div class="reviews-section-progress main-progress">
                    <div class="reviews-section-progress-bar main-progress-bar" data-reviews-section-progress="<?php echo esc_attr($uid); ?>"></div>
                </div>

                <div class="reviews-section-nav main-swiper-nav">
                    <button type="button"
                        class="main-swiper-btn reviews-section-btn--prev"
                        aria-label="Previous"
                        data-reviews-section-prev="<?php echo esc_attr($uid); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19 12H5.5" stroke="#020251" stroke-linecap="square" stroke-linejoin="round" />
                            <path d="M12 5L5 12L12 19" stroke="#020251" stroke-linecap="square" stroke-linejoin="round" />
                        </svg>
                    </button>

                    <button type="button"
                        class="main-swiper-btn reviews-section-btn--next"
                        aria-label="Next"
                        data-reviews-section-next="<?php echo esc_attr($uid); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M5 12H18.5" stroke="#020251" stroke-linecap="square" stroke-linejoin="round" />
                            <path d="M12 5L19 12L12 19" stroke="#020251" stroke-linecap="square" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const uid = <?php echo wp_json_encode($uid); ?>;

        const root = document.querySelector('[data-reviews-section="' + uid + '"]');
        if (!root || typeof Swiper === 'undefined') return;

        const prevEl = document.querySelector('[data-reviews-section-prev="' + uid + '"]');
        const nextEl = document.querySelector('[data-reviews-section-next="' + uid + '"]');
        const progressEl = document.querySelector('[data-reviews-section-progress="' + uid + '"]');

        const swiper = new Swiper(root, {
            slidesPerView: 1,
            spaceBetween: 24,
            speed: 450,
            watchOverflow: true,
            autoHeight: false,
            navigation: {
                prevEl,
                nextEl
            },
            breakpoints: {
                768: {
                    slidesPerView: 2.2
                },
                1024: {
                    slidesPerView: 2.8
                },
                 1200: {
                    slidesPerView: 3.8
                },
                 1441: {
                    slidesPerView: 4
                },
            },
            on: {
                init() {
                    updateProgress(this);
                },
                resize() {
                    updateProgress(this);
                },
                slideChange() {
                    updateProgress(this);
                },
                progress() {
                    updateProgress(this);
                },
            },
        });

        function updateProgress(sw) {
            if (!progressEl) return;
            const total = sw.slides.length;
            let perView = sw.params.slidesPerView;
            perView = perView === 'auto' ? 1 : Number(perView) || 1;
            const minRatio = total > 0 ? Math.min(1, perView / total) : 0;
            const moveRatio = Number.isFinite(sw.progress) ? sw.progress : 0;
            const ratio = minRatio + (1 - minRatio) * moveRatio;
            progressEl.style.transform = `scaleX(${Math.max(0, Math.min(1, ratio))})`;
        }
    });
</script>