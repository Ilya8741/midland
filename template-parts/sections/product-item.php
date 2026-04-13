<?php
    $title             = get_sub_field('title');
    $price_text        = get_sub_field('price_text');
    $features_title    = get_sub_field('features_title') ?: 'Key features';
    $features_text     = get_sub_field('features_text');
    $short_description = get_sub_field('short_description');
    $tags              = get_sub_field('tags');
    $spacing = get_sub_field('spacing');
    $section_classes = 'product-item';
    $image = get_sub_field('image');
    $small_container = get_sub_field('small_container');
	$reverse = get_sub_field('reverse');
	$gray_bg = get_sub_field('gray_bg');

    if ($spacing === 'No spacing top') {
        $section_classes .= ' no-top';
    } elseif ($spacing === 'Small spacing bottom') {
        $section_classes .= ' small-bottom';
    } elseif ($spacing === 'No spacing') {
        $section_classes .= ' no-spacing';
    } elseif ($spacing === 'All spacing') {
        $section_classes .= ' all-spacing';
    } 
?>

<section class="<?php echo esc_attr($section_classes); ?> <?php if ($gray_bg): ?> product-item--gray-bg<?php endif; ?> <?php if ($small_container): ?> product-item--small<?php endif; ?>">
	<div class="main-container detailed-hero__wrapper">
	
		<div class="product-item__content <?php if ($reverse): ?> product-item__content-reverse<?php endif; ?>">
			<div class="product-item__left" data-aos="fade-right">
				<?php if (!empty($title)) : ?>
					<h2 id="<?php echo esc_attr($section_id); ?>-title" class="product-item__title main-title-h3">
						<?php echo esc_html($title); ?>
					</h2>
				<?php endif; ?>

				<?php if (!empty($price_text)) : ?>
					<p class="detailed-hero__price"><?php echo esc_html($price_text); ?></p>
				<?php endif; ?>

				<?php if (!empty($tags)) : ?>
					<div class="detailed-hero__tags" aria-label="Product tags">
						<?php foreach ($tags as $tag) : ?>
							<?php if (!empty($tag['tag_text'])) : ?>
								<span class="detailed-hero__tag"><?php echo esc_html($tag['tag_text']); ?></span>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<?php if (!empty($short_description)) : ?>
					<div class="detailed-hero__description-text">
						<?php echo wp_kses_post($short_description); ?>
					</div>
				<?php endif; ?>

				<div class="product-item__accordion">
					<div class="detailed-hero__accordion-item main-accordion-item">
						<button
							class="detailed-hero__accordion-button main-accordion-button"
							type="button"
							aria-expanded="true">
							<span><?php echo esc_html($features_title); ?></span>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M5 12H19" stroke="#2197C1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M12 5V19" stroke="#2197C1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</button>

						<div class="detailed-hero__accordion-content">
							<div class="detailed-hero__accordion-inner">
								<?php if (!empty($features_text)) : ?>
									<div class="detailed-hero__accordion-text">
										<?php echo wp_kses_post($features_text); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="product-item__right" data-aos="fade-left">
			   <?php if (!empty($image['id'])) : ?>
                <?php
                    echo wp_get_attachment_image(
                    $image['id'],
                    'full',
                    false,
                    array('class' => 'main-image')
                    );
                ?>
                <?php endif; ?>
			</div>
		</div>
	</div>
</section>