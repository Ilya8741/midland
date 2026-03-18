<?php

$title = get_sub_field('title');
$link  = get_sub_field('link');

$posts_selected = get_sub_field('posts_selected');

$uid = 'related-articles-' . get_row_index();

$posts = array();
if (!empty($posts_selected) && is_array($posts_selected)) {
  $posts = $posts_selected;
}

if (empty($posts)) {
  return;
}
?>

<section class="related-articles related-articles--<?php echo esc_attr($uid); ?> main-section">
  <div class="related-articles__wrapper">

    <div class="home-slider-header">
      <?php if (!empty($title)) : ?>
        <div class="related-articles-title main-title" data-aos="fade-right"><?php echo wp_kses_post($title); ?></div>
      <?php endif; ?>

      <?php if (!empty($link) && !empty($link['url'])) :
        $btn_url    = $link['url'];
        $btn_title  = !empty($link['title']) ? $link['title'] : 'Learn more';
        $btn_target = !empty($link['target']) ? $link['target'] : '_self';
        $btn_rel    = ($btn_target === '_blank') ? 'noopener noreferrer' : '';
      ?>
        <div data-aos="fade-left">
          <a href="<?php echo esc_url($btn_url); ?>"
            class="related-articles-button main-button"
            target="<?php echo esc_attr($btn_target); ?>"
            <?php if ($btn_rel) : ?>rel="<?php echo esc_attr($btn_rel); ?>" <?php endif; ?>>
            <?php echo esc_html($btn_title); ?>
          </a>
        </div>
      <?php endif; ?>
    </div>

    <div class="related-articles-main">
      <div class="main-container">
        <div class="related-articles-swiper swiper-container swiper" data-related-articles="<?php echo esc_attr($uid); ?>">
          <div class="swiper-wrapper">

            <?php
            $i = 0;
            $base_duration = 400;
            ?>

            <?php foreach ($posts as $post_obj) :
              $post_id = is_object($post_obj) ? (int) $post_obj->ID : (int) $post_obj;

              $p_title   = get_the_title($post_id);
              $p_url     = get_permalink($post_id);
              $p_date    = get_the_date('d M Y', $post_id);
              $p_excerpt = get_the_excerpt($post_id);
              $thumb_id  = get_post_thumbnail_id($post_id);

              $duration = $base_duration + ($i * 100);
            ?>

              <div class="swiper-slide">
                <div class="related-articles-slide" data-aos="fade-right"
                  data-aos-duration="<?php echo esc_attr($duration); ?>">
                  <div class="related-articles-slide-top">

                    <?php if (!empty($thumb_id)) : ?>
                      <div class="related-articles-slide-image-wrapper">
                        <?php
                        echo wp_get_attachment_image(
                          $thumb_id,
                          'full',
                          false,
                          array('class' => 'related-articles-slide-image')
                        );
                        ?>
                      </div>
                    <?php endif; ?>

                    <?php if (!empty($p_title)) : ?>
                      <h5 class="related-articles-slide-title"><?php echo esc_html($p_title); ?></h5>
                    <?php endif; ?>

                    <div class="related-articles-slide-info">
                      <?php
                      $tags = get_the_terms($post_id, 'post_tag');
                      if (!empty($tags) && !is_wp_error($tags)) :
                        $first_tag = $tags[0];
                      ?>
                        <p class="related-articles-slide-article-tag"><?php echo esc_html($first_tag->name); ?></p>
                      <?php endif; ?>

                      <svg xmlns="http://www.w3.org/2000/svg" width="3" height="3" viewBox="0 0 3 3" fill="none">
                        <circle cx="1.5" cy="1.5" r="1.5" fill="#EEF6F8" />
                      </svg>

                      <?php if (!empty($p_date)) : ?>
                        <p class="related-articles-slide-date"><?php echo esc_html($p_date); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <a href="<?php echo esc_url($p_url); ?>" class="home-slider-slide-link">
                    <?php echo esc_html__('Read article', 'textdomain'); ?>
                  </a>
                </div>
              </div>
            <?php
              $i++;
            endforeach; ?>
          </div>
        </div>
      </div>

      <div class="related-articles-controls main-controls" data-related-articles-controls="<?php echo esc_attr($uid); ?>">
        <div class="related-articles-progress main-progress">
          <div class="related-articles-progress-bar main-progress-bar" data-related-articles-progress="<?php echo esc_attr($uid); ?>"></div>
        </div>

        <div class="related-articles-nav main-swiper-nav">
          <button type="button"
            class="main-swiper-btn related-articles-btn--prev"
            aria-label="Previous"
            data-related-articles-prev="<?php echo esc_attr($uid); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M19 12H5.5" stroke="#020251" stroke-linecap="square" stroke-linejoin="round" />
              <path d="M12 5L5 12L12 19" stroke="#020251" stroke-linecap="square" stroke-linejoin="round" />
            </svg>
          </button>

          <button type="button"
            class="main-swiper-btn related-articles-btn--next"
            aria-label="Next"
            data-related-articles-next="<?php echo esc_attr($uid); ?>">
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

    const root = document.querySelector('[data-related-articles="' + uid + '"]');
    if (!root || typeof Swiper === 'undefined') return;

    const prevEl = document.querySelector('[data-related-articles-prev="' + uid + '"]');
    const nextEl = document.querySelector('[data-related-articles-next="' + uid + '"]');
    const progressEl = document.querySelector('[data-related-articles-progress="' + uid + '"]');
    const controlsEl = document.querySelector('[data-related-articles-controls="' + uid + '"]');

    const swiper = new Swiper(root, {
      slidesPerView: 1.1,
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
          slidesPerView: 2
        },
        1024: {
          slidesPerView: 3
        },
      },
      on: {
        init() {
          updateProgress(this);
          toggleControls(this);
        },
        resize() {
          updateProgress(this);
          toggleControls(this);
        },
        slideChange() {
          updateProgress(this);
        },
        progress() {
          updateProgress(this);
        },
        lock() {
          toggleControls(this);
        },
        unlock() {
          toggleControls(this);
        }
      },
    });

    function toggleControls(sw) {
      if (!controlsEl) return;

      const shouldHide = !!sw.isLocked || sw.slides.length <= 1;

      controlsEl.style.display = shouldHide ? 'none' : '';
    }

    function updateProgress(sw) {
      if (!progressEl) return;

      if (sw.isLocked) {
        progressEl.style.transform = 'scaleX(1)';
        return;
      }

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