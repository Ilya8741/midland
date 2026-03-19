<?php
  $subtitle     = get_sub_field('hero_subtitle');
  $title        = get_sub_field('hero_title');
  $text         = get_sub_field('hero_text');
  $image        = get_sub_field('hero_image');
  $block_image  = get_sub_field('hero_block_image');
  $tag          = get_sub_field('hero_block_tag');
  $block_text   = get_sub_field('hero_block_text');
  $link         = get_sub_field('link');
  $listing      = get_sub_field('listing_version');
  $location_seo = get_sub_field('location_seo');
?>

<section class="hero-section main-section <?php if ($location_seo): ?> location-seo-section<?php endif; ?> <?php if ($listing): ?> listing-section<?php endif; ?>">
  <div class="hero-section-wrapper">
    <div class="hero-section-header">
      <div class="hero-section-left" data-aos="fade-right">
        <?php if (!empty($subtitle)) : ?>
          <h5 class="hero-section-subtitle">
            <?php echo esc_html($subtitle); ?>
          </h5>
        <?php endif; ?>

        <?php if (!empty($title)) : ?>
          <div class="hero-section-title">
            <?php echo wp_kses_post($title); ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="hero-section-right"  data-aos="fade-left">
        <?php if (!empty($text)) : ?>
          <div class="hero-section-text">
            <?php echo wp_kses_post($text); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="hero-section-image-wrapper" data-aos="fade-up">
      <?php if (!empty($image['id'])) : ?>
        <?php
          echo wp_get_attachment_image(
            $image['id'],
            'full',
            false,
            array('class' => 'hero-section-image')
          );
        ?>
      <?php endif; ?>

      <div class="hero-section-block">
        <?php if (!empty($block_image['id'])) : ?>
          <?php
            echo wp_get_attachment_image(
              $block_image['id'],
              'full',
              false,
              array('class' => 'hero-section-block__image')
            );
          ?>
        <?php endif; ?>

        <?php if (!empty($tag)) : ?>
          <span class="hero-section-block-tag">
            <?php echo esc_html($tag); ?>
          </span>
        <?php endif; ?>

        <div class="hero-section-block__content">
          <?php if (!empty($block_text)) : ?>
            <p class="hero-section-block-text">
              <?php echo esc_html($block_text); ?>
            </p>
          <?php endif; ?>

          <?php if (!empty($link) && !empty($link['url'])) : 
              $url    = $link['url'];
              $title  = $link['title'] ?: 'Learn more';
              $target = $link['target'] ? $link['target'] : '_self';
          ?>
            <a href="<?php echo esc_url($url); ?>"
               target="<?php echo esc_attr($target); ?>"
               class="hero-section-block-link">
              <?php echo esc_html($title); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>