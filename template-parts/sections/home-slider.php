<?php
// Layout fields
$title = get_sub_field('title');
$text  = get_sub_field('text');
$link  = get_sub_field('link'); // ACF Link

$uid = 'home-slider-' . get_row_index();
?>

<div class="home-slider home-slider--<?php echo esc_attr($uid); ?> main-section">
  <div class="home-slider__wrapper">

    <div class="home-slider-header">
      <div class="home-slider-header-left" data-aos="fade-right">
        <?php if (!empty($title)) : ?>
          <h2 class="home-slider-title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if (!empty($text)) : ?>
          <div class="home-slider-text">
            <?php echo wp_kses_post($text); ?>
          </div>
        <?php endif; ?>
      </div>

      <?php if (!empty($link) && !empty($link['url'])) :
        $btn_url    = $link['url'];
        $btn_title  = !empty($link['title']) ? $link['title'] : 'Learn more';
        $btn_target = !empty($link['target']) ? $link['target'] : '_self';
        $btn_rel    = ($btn_target === '_blank') ? 'noopener noreferrer' : '';
      ?>
      <div data-aos="fade-left">
          <a href="<?php echo esc_url($btn_url); ?>"
          class="home-slider-button main-button"
          target="<?php echo esc_attr($btn_target); ?>"
          <?php if ($btn_rel) : ?>rel="<?php echo esc_attr($btn_rel); ?>" <?php endif; ?>>
          <?php echo esc_html($btn_title); ?>
        </a>
      </div>
      <?php endif; ?>
    </div>

    <div class="home-slider-main">
      <div class="home-slider-wrapper main-container">

        <div class="home-slider-swiper swiper-container swiper"
          data-home-slider="<?php echo esc_attr($uid); ?>">
          <div class="swiper-wrapper">

            <?php if (have_rows('slides')) : ?>

              <?php
              $i = 0;
              $base_duration = 400;
              ?>

              <?php while (have_rows('slides')) : the_row();
                $slide_image = get_sub_field('image');
                $slide_title = get_sub_field('title');
                $slide_text  = get_sub_field('text');
                $slide_link  = get_sub_field('link');

                $slide_tag  = get_sub_field('tag');
                $slide_price  = get_sub_field('price');
                $slide_guarantee  = get_sub_field('guarantee');

                $duration = $base_duration + ($i * 100);
              ?>

                <div class="swiper-slide">
                  <div class="home-slider-slide" data-aos="fade-right"
                    data-aos-duration="<?php echo esc_attr($duration); ?>">

                    <?php if (!empty($slide_image['id'])) : ?>
                      <div class="home-slider-slide-image-wrapper">

                        <?php if (!empty($slide_tag)) : ?>
                          <div class="home-slider-slide-tag">
                            <?php echo esc_html($slide_tag); ?>
                          </div>
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
                    <?php endif; ?>

                    <?php if (!empty($slide_title)) : ?>
                      <h5 class="home-slider-slide-title">
                        <?php echo esc_html($slide_title); ?>
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

                    <?php if (!empty($slide_text)) : ?>
                      <p class="home-slider-slide-text">
                        <?php echo esc_html($slide_text); ?>
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

                </div>

              <?php
                $i++;
              endwhile;
              ?>

            <?php endif; ?>

          </div>
        </div>

      </div>
         <div class="home-slider-controls main-controls" data-home-slider-controls="<?php echo esc_attr($uid); ?>">
                <div class="home-slider-progress main-progress">
                    <div class="home-slider-progress-bar main-progress-bar" data-home-slider-progress="<?php echo esc_attr($uid); ?>"></div>
                </div>

                <div class="home-slider-nav main-swiper-nav">
                    <button type="button"
                        class="main-swiper-btn home-slider-btn--prev"
                        aria-label="Previous"
                        data-home-slider-prev="<?php echo esc_attr($uid); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19 12H5.5" stroke="#020251" stroke-linecap="square" stroke-linejoin="round" />
                            <path d="M12 5L5 12L12 19" stroke="#020251" stroke-linecap="square" stroke-linejoin="round" />
                        </svg>
                    </button>

                    <button type="button"
                        class="main-swiper-btn home-slider-btn--next"
                        aria-label="Next"
                        data-home-slider-next="<?php echo esc_attr($uid); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M5 12H18.5" stroke="#020251" stroke-linecap="square" stroke-linejoin="round" />
                            <path d="M12 5L19 12L12 19" stroke="#020251" stroke-linecap="square" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const uid = <?php echo wp_json_encode($uid); ?>;

    const root = document.querySelector('[data-home-slider="' + uid + '"]');
    if (!root || typeof Swiper === 'undefined') return;

    const prevEl = document.querySelector('[data-home-slider-prev="' + uid + '"]');
    const nextEl = document.querySelector('[data-home-slider-next="' + uid + '"]');
    const progressEl = document.querySelector('[data-home-slider-progress="' + uid + '"]');

    const swiper = new Swiper(root, {
      slidesPerView: 1.2,
      spaceBetween: 24,
      speed: 450,
      watchOverflow: true,
      navigation: {
        prevEl,
        nextEl
      },
      breakpoints: {
        768: {
          slidesPerView: 2.2
        },
        1024: {
          slidesPerView: 3.7
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