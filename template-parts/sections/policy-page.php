<?php
$title       = get_sub_field('title');
?>

<div class="policy-page">
    <div class="policy-page-wrapper"> 
        <?php if (!empty($title)) : ?>
            <h1 class="policy-page-title main-title" data-aos="fade-right">
                <?php echo esc_html($title); ?>
            </h1>
        <?php endif; ?>
             <?php if ( have_rows('content_repeater') ) : ?>
                    <div class="policy-page-content-wrapper" data-aos="fade-left">
      <?php while ( have_rows('content_repeater') ) : the_row(); ?>
        <?php $text = get_sub_field('text'); ?>
        <?php if ( !empty($text) ) : ?>
          <div class="policy-page-content">
            <?php echo wp_kses_post( $text ); ?>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
      </div>
    <?php endif; ?>
    </div>
</div>