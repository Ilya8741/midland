<?php
$tabs = get_sub_field('tabs');
if (empty($tabs) || !is_array($tabs)) return;

$uid = 'tab-section-' . get_row_index();

$callout_title = get_sub_field('callout_title');
$callout_text  = get_sub_field('callout_text');
$callout_icon  = get_sub_field('callout_icon');
?>

<section class="tab-section main-section" id="<?php echo esc_attr($uid); ?>" data-tab-section>
  <div class="tab-section__inner">

    <!-- DESKTOP: Tabs -->
    <div class="tab-section__desktop" data-tabs-desktop>
      <div class="tab-section__grid">
        <div class="tab-section__left" data-aos="fade-right">

          <div class="tab-section__tablist" role="tablist" aria-label="Services">
            <?php foreach ($tabs as $i => $t) :
              $label = $t['main_title'] ?? '';
              if (!$label) continue;

              $tab_id   = $uid . '-tab-' . $i;
              $panel_id = $uid . '-panel-' . $i;
            ?>
              <button
                type="button"
                class="tab-section__tab <?php echo $i === 0 ? 'is-active' : ''; ?>"
                role="tab"
                id="<?php echo esc_attr($tab_id); ?>"
                aria-controls="<?php echo esc_attr($panel_id); ?>"
                aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                tabindex="<?php echo $i === 0 ? '0' : '-1'; ?>"
                data-tab-btn
                data-index="<?php echo esc_attr($i); ?>"
              >
                <span class="tab-section__tab-label"><?php echo esc_html($label); ?></span>
                <span class="tab-section__tab-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <path d="M8.32812 20H30.8281" stroke="#2197C1" stroke-linecap="square" stroke-linejoin="round"/>
                        <path d="M20 8.33203L31.6667 19.9987L20 31.6654" stroke="#2197C1" stroke-linecap="square" stroke-linejoin="round"/>
                    </svg>
                </span>
              </button>
            <?php endforeach; ?>
          </div>

          <?php if (!empty($callout_icon['id']) || $callout_title || $callout_text) : ?>
            <div class="tab-section__callout">
              <div class="tab-section__callout-head">
                <?php if (!empty($callout_icon['id'])) : ?>
                  <?php
                    echo wp_get_attachment_image(
                      $callout_icon['id'],
                      'full',
                      false,
                      array('class' => 'tab-section__callout-icon', 'aria-hidden' => 'true')
                    );
                  ?>
                <?php endif; ?>

                <?php if ($callout_title) : ?>
                  <p class="tab-section__callout-title"><?php echo esc_html($callout_title); ?></p>
                <?php endif; ?>
              </div>

              <?php if ($callout_text) : ?>
                <div class="tab-section__callout-text"><?php echo wp_kses_post($callout_text); ?></div>
              <?php endif; ?>
            </div>
          <?php endif; ?>

        </div>

        <div class="tab-section__right" data-aos="fade-left">
          <?php foreach ($tabs as $i => $t) :
            $panel_id = $uid . '-panel-' . $i;
            $tab_id   = $uid . '-tab-' . $i;

            $subtitle         = $t['subtitle'] ?? '';
            $text             = $t['text'] ?? '';
            $image            = $t['image'] ?? null;
            $text_after_image = $t['text_after_image'] ?? '';
            $link             = $t['link'] ?? null;
          ?>
            <div
              class="tab-section__panel <?php echo $i === 0 ? 'is-active' : ''; ?>"
              role="tabpanel"
              id="<?php echo esc_attr($panel_id); ?>"
              aria-labelledby="<?php echo esc_attr($tab_id); ?>"
              data-tab-panel
              data-index="<?php echo esc_attr($i); ?>"
            >
              <?php if ($subtitle) : ?>
                <h4 class="tab-section__panel-title"><?php echo esc_html($subtitle); ?></h4>
              <?php endif; ?>

              <?php if ($text) : ?>
                <div class="tab-section__panel-text"><?php echo wp_kses_post($text); ?></div>
              <?php endif; ?>

              <?php if (!empty($image['id'])) : ?>
                <div class="tab-section__panel-image">
                  <?php
                    echo wp_get_attachment_image(
                      $image['id'],
                      'full',
                      false,
                      array('class' => 'tab-section__image')
                    );
                  ?>
                </div>
              <?php endif; ?>

              <?php if ($text_after_image) : ?>
                <div class="tab-section__panel-text--after-image">
                  <?php echo wp_kses_post($text_after_image); ?>
                </div>
              <?php endif; ?>

              <?php if (!empty($link) && !empty($link['url'])) :
                $url    = $link['url'];
                $ltitle = !empty($link['title']) ? $link['title'] : 'Explore maintenance';
                $target = !empty($link['target']) ? $link['target'] : '_self';
                $rel    = ($target === '_blank') ? 'noopener noreferrer' : '';
              ?>
                <a class="tab-section__panel-btn main-button"
                   href="<?php echo esc_url($url); ?>"
                   target="<?php echo esc_attr($target); ?>"
                   <?php if ($rel) : ?>rel="<?php echo esc_attr($rel); ?>"<?php endif; ?>>
                  <?php echo esc_html($ltitle); ?>
                </a>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- MOBILE: Accordion -->
    <div class="tab-section__mobile" data-tabs-mobile>
      <div class="tab-section__accordion">
        <?php foreach ($tabs as $i => $t) :
          $label            = $t['main_title'] ?? '';
          $subtitle         = $t['subtitle'] ?? '';
          $text             = $t['text'] ?? '';
          $image            = $t['image'] ?? null;
          $text_after_image = $t['text_after_image'] ?? '';
          $link             = $t['link'] ?? null;

          if (!$label) continue;

          $acc_btn_id   = $uid . '-acc-btn-' . $i;
          $acc_panel_id = $uid . '-acc-panel-' . $i;

          $is_open = ($i === 0);
        ?>
          <div class="tab-section__acc-item  <?php echo $is_open ? 'is-open' : ''; ?>" data-acc-item data-aos="fade-up">
            <button
              type="button"
              class="tab-section__acc-btn"
              id="<?php echo esc_attr($acc_btn_id); ?>"
              aria-controls="<?php echo esc_attr($acc_panel_id); ?>"
              aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>"
              data-acc-btn
            >
              <span class="tab-section__acc-label"><?php echo esc_html($label); ?></span>
              <span class="tab-section__acc-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                  <path d="M12 5V19" stroke="currentColor" stroke-linecap="square" />
                  <path d="M5 12H19" stroke="currentColor" stroke-linecap="square" />
                </svg>
              </span>
            </button>

            <div
              class="tab-section__acc-panel"
              id="<?php echo esc_attr($acc_panel_id); ?>"
              role="region"
              aria-labelledby="<?php echo esc_attr($acc_btn_id); ?>"
              data-acc-panel
            >
              <div class="tab-section__acc-panel-inner" data-acc-inner>

                <?php if ($subtitle) : ?>
                  <h4 class="tab-section__panel-title"><?php echo esc_html($subtitle); ?></h4>
                <?php endif; ?>

                <?php if ($text) : ?>
                  <div class="tab-section__panel-text"><?php echo wp_kses_post($text); ?></div>
                <?php endif; ?>

                <?php if (!empty($image['id'])) : ?>
                  <div class="tab-section__panel-image">
                    <?php
                      echo wp_get_attachment_image(
                        $image['id'],
                        'full',
                        false,
                        array('class' => 'tab-section__image')
                      );
                    ?>
                  </div>
                <?php endif; ?>

                <?php if ($text_after_image) : ?>
                  <div class="tab-section__panel-text tab-section__panel-text--after-image">
                    <?php echo wp_kses_post($text_after_image); ?>
                  </div>
                <?php endif; ?>

                <?php if (!empty($link) && !empty($link['url'])) :
                  $url    = $link['url'];
                  $ltitle = !empty($link['title']) ? $link['title'] : 'Explore';
                  $target = !empty($link['target']) ? $link['target'] : '_self';
                  $rel    = ($target === '_blank') ? 'noopener noreferrer' : '';
                ?>
                  <a class="tab-section__panel-btn main-button"
                     href="<?php echo esc_url($url); ?>"
                     target="<?php echo esc_attr($target); ?>"
                     <?php if ($rel) : ?>rel="<?php echo esc_attr($rel); ?>"<?php endif; ?>>
                    <?php echo esc_html($ltitle); ?>
                  </a>
                <?php endif; ?>

              </div>
            </div>
          </div>
        <?php endforeach; ?>

        <?php if (!empty($callout_icon['id']) || $callout_title || $callout_text) : ?>
          <div class="tab-section__callout tab-section__callout--mobile" data-aos="fade-up">
            <div class="tab-section__callout-head">
              <?php if (!empty($callout_icon['id'])) : ?>
                <?php
                  echo wp_get_attachment_image(
                    $callout_icon['id'],
                    'full',
                    false,
                    array('class' => 'tab-section__callout-icon', 'aria-hidden' => 'true')
                  );
                ?>
              <?php endif; ?>

              <?php if ($callout_title) : ?>
                <p class="tab-section__callout-title"><?php echo esc_html($callout_title); ?></p>
              <?php endif; ?>
            </div>

            <?php if ($callout_text) : ?>
              <div class="tab-section__callout-text"><?php echo wp_kses_post($callout_text); ?></div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

      </div>
    </div>

  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const section = document.getElementById(<?php echo wp_json_encode($uid); ?>);
  if (!section) return;

  const tabButtons = Array.from(section.querySelectorAll('[data-tabs-desktop] [data-tab-btn]'));
  const panels = Array.from(section.querySelectorAll('[data-tabs-desktop] [data-tab-panel]'));

  function activateTab(index) {
    tabButtons.forEach((btn, i) => {
      btn.classList.toggle('is-active', i === index);
      btn.setAttribute('aria-selected', i === index ? 'true' : 'false');
      btn.setAttribute('tabindex', i === index ? '0' : '-1');
    });

    panels.forEach((p, i) => {
      const isActive = i === index;
      p.classList.toggle('is-active', isActive);
    });
  }

  tabButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      const idx = Number(btn.getAttribute('data-index') || 0);
      activateTab(idx);
    });
  });

  const accItems = Array.from(section.querySelectorAll('[data-tabs-mobile] [data-acc-item]'));

  accItems.forEach((item) => {
    const btn = item.querySelector('[data-acc-btn]');
    if (!btn) return;

    btn.addEventListener('click', () => {
      const isOpen = item.classList.contains('is-open');
      item.classList.toggle('is-open', !isOpen);
      btn.setAttribute('aria-expanded', !isOpen ? 'true' : 'false');
    });
  });
});
</script>