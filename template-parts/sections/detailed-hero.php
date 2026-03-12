<?php
$breadcrumb_link   = get_sub_field('breadcrumb_link');
$breadcrumb_text   = get_sub_field('breadcrumb_text');

$title             = get_sub_field('title');
$price_text        = get_sub_field('price_text');
$description_text  = get_sub_field('description_text');
$description_title = get_sub_field('description_title') ?: 'Description';
$features_title    = get_sub_field('features_title') ?: 'Key features';
$features_text     = get_sub_field('features_text');
$short_description = get_sub_field('short_description');

$tags              = get_sub_field('tags');
$slider_items      = get_sub_field('slider_items');

$section_id = 'detailed-hero-' . get_row_index();
$last_four_items = array_slice($slider_items, -4);
?>

<section class="detailed-hero" id="<?php echo esc_attr($section_id); ?>" aria-labelledby="<?php echo esc_attr($section_id); ?>-title">
	<div class="main-container detailed-hero__wrapper">
		<?php if ($breadcrumb_link || $breadcrumb_text) : ?>
			<nav class="detailed-hero__breadcrumbs detailed-hero__breadcrumbs-mobile" aria-label="Breadcrumb">
				<?php if (!empty($breadcrumb_link) && !empty($breadcrumb_link['url'])) : ?>
					<a
						href="<?php echo esc_url($breadcrumb_link['url']); ?>"
						<?php echo !empty($breadcrumb_link['target']) ? 'target="' . esc_attr($breadcrumb_link['target']) . '"' : ''; ?>>
						<?php echo esc_html($breadcrumb_link['title'] ?: 'Back'); ?>
					</a>
				<?php endif; ?>

				<?php if (!empty($breadcrumb_link) && !empty($breadcrumb_text)) : ?>
					<span class="detailed-hero__breadcrumbs-separator"><svg xmlns="http://www.w3.org/2000/svg" width="5" height="9" viewBox="0 0 5 9" fill="none">
							<path d="M0.5 8.5L4.5 4.5L0.5 0.5" stroke="#17172A" stroke-linecap="round" stroke-linejoin="round" />
						</svg></span>
				<?php endif; ?>

				<?php if (!empty($breadcrumb_text)) : ?>
					<span aria-current="page"><?php echo esc_html($breadcrumb_text); ?></span>
				<?php endif; ?>
			</nav>
		<?php endif; ?>
		<div class="detailed-hero__content">
			<div class="detailed-hero__left" data-aos="fade-right">
				<?php if ($breadcrumb_link || $breadcrumb_text) : ?>
					<nav class="detailed-hero__breadcrumbs detailed-hero__breadcrumbs-desktop" aria-label="Breadcrumb">
						<?php if (!empty($breadcrumb_link) && !empty($breadcrumb_link['url'])) : ?>
							<a
								href="<?php echo esc_url($breadcrumb_link['url']); ?>"
								<?php echo !empty($breadcrumb_link['target']) ? 'target="' . esc_attr($breadcrumb_link['target']) . '"' : ''; ?>>
								<?php echo esc_html($breadcrumb_link['title'] ?: 'Back'); ?>
							</a>
						<?php endif; ?>

						<?php if (!empty($breadcrumb_link) && !empty($breadcrumb_text)) : ?>
							<span class="detailed-hero__breadcrumbs-separator"><svg xmlns="http://www.w3.org/2000/svg" width="5" height="9" viewBox="0 0 5 9" fill="none">
									<path d="M0.5 8.5L4.5 4.5L0.5 0.5" stroke="#17172A" stroke-linecap="round" stroke-linejoin="round" />
								</svg></span>
						<?php endif; ?>

						<?php if (!empty($breadcrumb_text)) : ?>
							<span aria-current="page"><?php echo esc_html($breadcrumb_text); ?></span>
						<?php endif; ?>
					</nav>
				<?php endif; ?>

				<?php if (!empty($title)) : ?>
					<h1 id="<?php echo esc_attr($section_id); ?>-title" class="detailed-hero__title main-title">
						<?php echo esc_html($title); ?>
					</h1>
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

				<div class="detailed-hero__accordion">
					<div class="detailed-hero__accordion-item">
						<button
							class="detailed-hero__accordion-button"
							type="button"
							aria-expanded="true">
							<span><?php echo esc_html($description_title); ?></span>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M5 12H19" stroke="#2197C1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M12 5V19" stroke="#2197C1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</button>

						<div class="detailed-hero__accordion-content">
							<div class="detailed-hero__accordion-inner">
								<?php if (!empty($description_text)) : ?>
									<div class="detailed-hero__accordion-text">
										<?php echo wp_kses_post($description_text); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<div class="detailed-hero__accordion-item is-open">
						<button
							class="detailed-hero__accordion-button"
							type="button"
							aria-expanded="true">
							<span><?php echo esc_html($features_title); ?></span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
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

			<div class="detailed-hero__right" data-aos="fade-left">
				<?php if (!empty($slider_items)) : ?>
					<div class="detailed-hero__slider-wrapper">
						<div class="swiper detailed-hero__slider js-detailed-hero-slider">
							<div class="swiper-wrapper">
								<?php foreach ($slider_items as $slide) : ?>
									<?php
									$image = $slide['image'] ?? null;
									$alt   = !empty($slide['alt']) ? $slide['alt'] : (!empty($image['alt']) ? $image['alt'] : $title);
									?>
									<?php if (!empty($image['id'])) : ?>
										<div class="swiper-slide">
											<div class="detailed-hero__slide-image">
												<?php
												echo wp_get_attachment_image(
													$image['id'],
													'full',
													false,
													array(
														'class'   => 'detailed-hero__image',
														'loading' => 'lazy',
														'alt'     => esc_attr($alt),
													)
												);
												?>
											</div>
										</div>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>

						<div class="detailed-hero__nav">
							<button class="detailed-hero__nav-btn detailed-hero__nav-btn--prev" type="button" aria-label="Previous slide">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M19 12H5.5" stroke="#020251" stroke-linecap="square" stroke-linejoin="round" />
									<path d="M12 5L5 12L12 19" stroke="#020251" stroke-linecap="square" stroke-linejoin="round" />
								</svg>
							</button>
							<button class="detailed-hero__nav-btn detailed-hero__nav-btn--next" type="button" aria-label="Next slide">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M5 12H18.5" stroke="#020251" stroke-linecap="square" stroke-linejoin="round" />
									<path d="M12 5L19 12L12 19" stroke="#020251" stroke-linecap="square" stroke-linejoin="round" />
								</svg>
							</button>
						</div>
					</div>

					<?php if (!empty($last_four_items)) : ?>
						<div class="detailed-hero__thumbs detailed-hero__thumbs-desktop">
							<?php foreach ($last_four_items as $slide) : ?>
								<?php
								$image = $slide['image'] ?? null;
								$alt   = !empty($slide['alt']) ? $slide['alt'] : (!empty($image['alt']) ? $image['alt'] : $title);
								?>
								<?php if (!empty($image['id'])) : ?>
									<div class="detailed-hero__thumb">
										<?php
										echo wp_get_attachment_image(
											$image['id'],
											'large',
											false,
											array(
												'class'   => 'detailed-hero__thumb-image',
												'loading' => 'lazy',
												'alt'     => esc_attr($alt),
											)
										);
										?>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
		<?php if (!empty($last_four_items)) : ?>
			<div class="detailed-hero__thumbs detailed-hero__thumbs-mobile">
				<?php foreach ($last_four_items as $slide) : ?>
					<?php
					$image = $slide['image'] ?? null;
					$alt   = !empty($slide['alt']) ? $slide['alt'] : (!empty($image['alt']) ? $image['alt'] : $title);
					?>
					<?php if (!empty($image['id'])) : ?>
						<div class="detailed-hero__thumb">
							<?php
							echo wp_get_attachment_image(
								$image['id'],
								'large',
								false,
								array(
									'class'   => 'detailed-hero__thumb-image',
									'loading' => 'lazy',
									'alt'     => esc_attr($alt),
								)
							);
							?>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<script>
	document.addEventListener('DOMContentLoaded', () => {
		document.querySelectorAll('.js-detailed-hero-slider').forEach((slider) => {
			const section = slider.closest('.detailed-hero');

			new Swiper(slider, {
				slidesPerView: 1,
				spaceBetween: 16,
				loop: true,
				navigation: {
					prevEl: section.querySelector('.detailed-hero__nav-btn--prev'),
					nextEl: section.querySelector('.detailed-hero__nav-btn--next'),
				},
				keyboard: {
					enabled: true
				},
				a11y: {
					enabled: true
				},
				on: {
					init(swiper) {
						swiper.el.classList.add('is-ready');
					}
				}
			});
		});
	});
</script>