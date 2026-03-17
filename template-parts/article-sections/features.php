
<section class="features main-section">
  <div class="features-wrapper">
    <?php if (have_rows('features_items')) : ?>
      <?php 
      $i = 0;
      $base_duration = 400;
      ?>

      <?php while (have_rows('features_items')) : the_row();
        $image = get_sub_field('image');
        $title = get_sub_field('title');
        $text  = get_sub_field('text');
        $duration = $base_duration + ($i * 100);
      ?>

        <div 
          class="features-item"
          data-aos="fade-right"
          data-aos-duration="<?php echo esc_attr($duration); ?>"
        >

          <?php if (!empty($image['id'])) : ?>
            <?php
              echo wp_get_attachment_image(
                $image['id'],
                'full',
                false,
                array('class' => 'features-icon')
              );
            ?>
          <?php endif; ?>

          <div class="features-item-content">
            <?php if (!empty($title)) : ?>
              <h5 class="features-item-title">
                <?php echo esc_html($title); ?>
              </h5>
            <?php endif; ?>

            <?php if (!empty($text)) : ?>
              <p class="features-item-text">
                <?php echo esc_html($text); ?>
              </p>
            <?php endif; ?>
          </div>

        </div>

      <?php 
        $i++; 
      endwhile; 
      ?>

    <?php endif; ?>

  </div>
</section>