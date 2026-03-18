<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package midland-stairlifts
 */

?>

<?php

$ctx = 'footer_options';

$contact_title       = get_field('contact_title', $ctx);
$contact_text        = get_field('contact_text', $ctx);
$contact_phone       = get_field('contact_phone', $ctx);
$contact_mail        = get_field('contact_mail', $ctx);
$contact_hours       = get_field('contact_hours', $ctx);
$contact_hours_text  = get_field('contact_hours_text', $ctx);
$footer_contact_form = get_field('footer_contact_form', $ctx);
$address             = get_field('address', $ctx);

$menu_title_1 = get_field('footer_menu_title_1', $ctx);
$menu_title_2 = get_field('footer_menu_title_2', $ctx);

$copyright = get_field('copyright', $ctx);

$menu_1 = get_field('footer_menu_1', $ctx);
$menu_2 = get_field('footer_menu_2', $ctx);

$normalize_link = function ($link) {
	if (!$link) return null;

	if (is_array($link) && !empty($link['url'])) {
		return [
			'url'    => $link['url'],
			'title'  => $link['title'] ?? $link['url'],
			'target' => $link['target'] ?? '',
		];
	}

	if (is_string($link)) {
		return [
			'url'    => $link,
			'title'  => $link,
			'target' => '',
		];
	}

	return null;
};

$phone = $normalize_link($contact_phone);
$mail  = $normalize_link($contact_mail);
$addr  = $normalize_link($address);
?>

<footer class="ms-footer <?php echo is_page(['contact', 'get-a-quote']) ? 'this-contact' : ''; ?>" data-ms-footer>
	<section class="ms-footer__contact main-section">
		<div class="ms-footer__contact-inner">
			<div class="ms-footer__contact-grid">
				<div class="ms-footer__contact-left" data-aos="fade-right">
					<div class="ms-footer__contact-left-main">
						<?php if (!empty($contact_title)) : ?>
							<h2 class="ms-footer__contact-title"><?php echo esc_html($contact_title); ?></h2>
						<?php endif; ?>

						<?php if (!empty($contact_text)) : ?>
							<p class="ms-footer__contact-text"><?php echo esc_html($contact_text); ?></p>
						<?php endif; ?>

						<div class="ms-footer__contact-links">
							<?php if (!empty($phone)) : ?>
								<a class="ms-footer__contact-link" href="<?php echo esc_url($phone['url']); ?>" <?php echo !empty($phone['target']) ? 'target="' . esc_attr($phone['target']) . '" rel="noopener noreferrer"' : ''; ?>>
									<span class="ms-footer__icon" aria-hidden="true">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<g opacity="0.5">
												<path d="M13.8281 16.57C14.0346 16.6648 14.2673 16.6865 14.4878 16.6314C14.7083 16.5763 14.9034 16.4478 15.0411 16.267L15.3961 15.802C15.5824 15.5536 15.824 15.352 16.1017 15.2131C16.3794 15.0742 16.6856 15.002 16.9961 15.002H19.9961C20.5265 15.002 21.0352 15.2127 21.4103 15.5877C21.7854 15.9628 21.9961 16.4715 21.9961 17.002V20.002C21.9961 20.5324 21.7854 21.0411 21.4103 21.4162C21.0352 21.7912 20.5265 22.002 19.9961 22.002C15.2222 22.002 10.6438 20.1055 7.26817 16.7299C3.89252 13.3542 1.99609 8.77585 1.99609 4.00195C1.99609 3.47152 2.20681 2.96281 2.58188 2.58774C2.95695 2.21267 3.46566 2.00195 3.99609 2.00195H6.99609C7.52653 2.00195 8.03523 2.21267 8.41031 2.58774C8.78538 2.96281 8.99609 3.47152 8.99609 4.00195V7.00195C8.99609 7.31244 8.9238 7.61867 8.78495 7.89638C8.64609 8.17409 8.44449 8.41566 8.19609 8.60195L7.72809 8.95295C7.54451 9.09313 7.41511 9.29254 7.36188 9.5173C7.30866 9.74207 7.33488 9.97833 7.43609 10.186C8.80277 12.9618 11.0505 15.2068 13.8281 16.57Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
											</g>
										</svg>
									</span>
									<span><?php echo esc_html($phone['title']); ?></span>
								</a>
							<?php endif; ?>

							<?php if (!empty($mail)) : ?>
								<a class="ms-footer__contact-link" href="<?php echo esc_url($mail['url']); ?>" <?php echo !empty($mail['target']) ? 'target="' . esc_attr($mail['target']) . '" rel="noopener noreferrer"' : ''; ?>>
									<span class="ms-footer__icon" aria-hidden="true">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<g opacity="0.5">
												<path d="M21.9961 6.99805L13.0051 12.725C12.7 12.9023 12.3534 12.9956 12.0006 12.9956C11.6478 12.9956 11.3012 12.9023 10.9961 12.725L1.99609 6.99805" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
												<path d="M19.9961 3.99805H3.99609C2.89152 3.99805 1.99609 4.89348 1.99609 5.99805V17.998C1.99609 19.1026 2.89152 19.998 3.99609 19.998H19.9961C21.1007 19.998 21.9961 19.1026 21.9961 17.998V5.99805C21.9961 4.89348 21.1007 3.99805 19.9961 3.99805Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
											</g>
										</svg>
									</span>
									<span><?php echo esc_html($mail['title']); ?></span>
								</a>
							<?php endif; ?>
						</div>
					</div>
					<div class="ms-footer__hours">
						<?php if (!empty($contact_hours)) : ?>
							<h3 class="ms-footer__hours-title"><?php echo esc_html($contact_hours); ?></h3>
						<?php endif; ?>
						<?php if (!empty($contact_hours_text)) : ?>
							<p class="ms-footer__hours-text"><?php echo esc_html($contact_hours_text); ?></p>
						<?php endif; ?>
					</div>
				</div>

				<div class="ms-footer__contact-right" data-aos="fade-left">
					<?php
					if (!empty($footer_contact_form)) {
						echo do_shortcode(apply_filters('the_content', $footer_contact_form));
					}
					?>
				</div>
			</div>
		</div>
	</section>

	<section class="ms-footer__bottom main-section">
		<div class="ms-footer__bottom-inner">
			<div class="ms-footer__bottom-grid">
				<div class="ms-footer__col" data-aos="fade-right" data-aos-offset="0">
					<h3 class="ms-footer__col-title">Contact us</h3>

					<ul class="ms-footer__list">
						<?php if (!empty($phone)) : ?>
							<li class="ms-footer__item">
								<a class="ms-footer__link ms-footer__link-with-icon" href="<?php echo esc_url($phone['url']); ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
										<g clip-path="url(#clip0_264_1048)">
											<path d="M9.21808 11.0465C9.35576 11.1097 9.51088 11.1242 9.65787 11.0874C9.80487 11.0507 9.93497 10.965 10.0267 10.8445L10.2634 10.5345C10.3876 10.3689 10.5487 10.2345 10.7338 10.1419C10.9189 10.0493 11.1231 10.0011 11.3301 10.0011H13.3301C13.6837 10.0011 14.0228 10.1416 14.2729 10.3917C14.5229 10.6417 14.6634 10.9809 14.6634 11.3345V13.3345C14.6634 13.6881 14.5229 14.0272 14.2729 14.2773C14.0228 14.5273 13.6837 14.6678 13.3301 14.6678C10.1475 14.6678 7.09523 13.4035 4.8448 11.1531C2.59436 8.90265 1.33008 5.8504 1.33008 2.66781C1.33008 2.31418 1.47055 1.97505 1.7206 1.725C1.97065 1.47495 2.30979 1.33447 2.66341 1.33447H4.66341C5.01703 1.33447 5.35617 1.47495 5.60622 1.725C5.85627 1.97505 5.99674 2.31418 5.99674 2.66781V4.66781C5.99674 4.8748 5.94855 5.07895 5.85598 5.26409C5.76341 5.44923 5.62901 5.61028 5.46341 5.73447L5.15141 5.96847C5.02902 6.06192 4.94276 6.19486 4.90727 6.34471C4.87179 6.49455 4.88927 6.65206 4.95674 6.79047C5.86787 8.64105 7.36636 10.1377 9.21808 11.0465Z" stroke="#2197C1" stroke-linecap="round" stroke-linejoin="round" />
										</g>
										<defs>
											<clipPath id="clip0_264_1048">
												<rect width="16" height="16" fill="white" />
											</clipPath>
										</defs>
									</svg>
									<span><?php echo esc_html($phone['title']); ?></span>
								</a>
							</li>
						<?php endif; ?>

						<?php if (!empty($mail)) : ?>
							<li class="ms-footer__item">
								<a class="ms-footer__link ms-footer__link-with-icon" href="<?php echo esc_url($mail['url']); ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
										<path d="M14.6673 4.6665L8.67332 8.4845C8.46991 8.60265 8.23888 8.66487 8.00365 8.66487C7.76843 8.66487 7.53739 8.60265 7.33398 8.4845L1.33398 4.6665" stroke="#2197C1" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M13.334 2.6665H2.66732C1.93094 2.6665 1.33398 3.26346 1.33398 3.99984V11.9998C1.33398 12.7362 1.93094 13.3332 2.66732 13.3332H13.334C14.0704 13.3332 14.6673 12.7362 14.6673 11.9998V3.99984C14.6673 3.26346 14.0704 2.6665 13.334 2.6665Z" stroke="#2197C1" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
									<span><?php echo esc_html($mail['title']); ?></span></a>
							</li>
						<?php endif; ?>

						<?php if (!empty($addr)) : ?>
							<li class="ms-footer__item">
								<a class="ms-footer__link ms-footer__link-with-icon" href="<?php echo esc_url($addr['url']); ?>" <?php echo !empty($addr['target']) ? 'target="' . esc_attr($addr['target']) . '" rel="noopener noreferrer"' : ''; ?>>
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
										<path d="M13.3327 6.66683C13.3327 9.9955 9.64002 13.4622 8.40002 14.5328C8.2845 14.6197 8.14388 14.6667 7.99935 14.6667C7.85482 14.6667 7.7142 14.6197 7.59868 14.5328C6.35868 13.4622 2.66602 9.9955 2.66602 6.66683C2.66602 5.25234 3.22792 3.89579 4.22811 2.89559C5.22831 1.8954 6.58486 1.3335 7.99935 1.3335C9.41384 1.3335 10.7704 1.8954 11.7706 2.89559C12.7708 3.89579 13.3327 5.25234 13.3327 6.66683Z" stroke="#2197C1" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M8 8.6665C9.10457 8.6665 10 7.77107 10 6.6665C10 5.56193 9.10457 4.6665 8 4.6665C6.89543 4.6665 6 5.56193 6 6.6665C6 7.77107 6.89543 8.6665 8 8.6665Z" stroke="#2197C1" stroke-linecap="round" stroke-linejoin="round" />
									</svg>

									<span><?php echo esc_html($addr['title']); ?></span>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="ms-footer__col-right" data-aos="fade-left" data-aos-offset="0">
					<div class=" ms-footer__col--accordion">
						<details class="ms-footer__details" data-footer-details>
							<summary class="ms-footer__summary">
								<span class="ms-footer__summary-text"><?php echo esc_html($menu_title_1 ?: 'Company'); ?></span>
								<span class="ms-footer__plus" aria-hidden="true">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M5 12H19" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M12 5V19" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</span>
							</summary>

							<div class="ms-footer__details-body">
								<?php if (is_array($menu_1) && !empty($menu_1)) : ?>
									<ul class="ms-footer__list">
										<?php foreach ($menu_1 as $row) :
											$label = $row['label'] ?? $row['title'] ?? '';
											$lnk   = $row['link'] ?? $row['url'] ?? null;
											$lnk   = $normalize_link($lnk);
											if (!$lnk) continue;
											$title = $label ?: $lnk['title'];
										?>
											<li class="ms-footer__item">
												<a class="ms-footer__link" href="<?php echo esc_url($lnk['url']); ?>" <?php echo !empty($lnk['target']) ? 'target="' . esc_attr($lnk['target']) . '" rel="noopener noreferrer"' : ''; ?>>
													<?php echo esc_html($title); ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
						</details>
					</div>

					<div class="ms-footer__col ms-footer__col--accordion">
						<details class="ms-footer__details" data-footer-details>
							<summary class="ms-footer__summary">
								<span class="ms-footer__summary-text"><?php echo esc_html($menu_title_2 ?: 'Stairlifts'); ?></span>
								<span class="ms-footer__plus" aria-hidden="true">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M5 12H19" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M12 5V19" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</span>
							</summary>

							<div class="ms-footer__details-body">
								<?php if (is_array($menu_2) && !empty($menu_2)) : ?>
									<ul class="ms-footer__list">
										<?php foreach ($menu_2 as $row) :
											$label = $row['label'] ?? $row['title'] ?? '';
											$lnk   = $row['link'] ?? $row['url'] ?? null;
											$lnk   = $normalize_link($lnk);
											if (!$lnk) continue;
											$title = $label ?: $lnk['title'];
										?>
											<li class="ms-footer__item">
												<a class="ms-footer__link" href="<?php echo esc_url($lnk['url']); ?>" <?php echo !empty($lnk['target']) ? 'target="' . esc_attr($lnk['target']) . '" rel="noopener noreferrer"' : ''; ?>>
													<?php echo esc_html($title); ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
						</details>
					</div>
				</div>
			</div>

			<div class="ms-footer__legal">
				<div class="ms-footer__copyright">
					<?php echo esc_html($copyright ?: ('Copyright © ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.')); ?>
				</div>

				<div class="ms-footer__privacy">
					<a class="ms-footer__privacy-link ms-footer__link" href="<?php echo esc_url(site_url('/privacy-policy/')); ?>">Privacy Policy</a>
				</div>
			</div>
		</div>
	</section>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const root = document.querySelector('[data-ms-footer]');
  if (!root) return;

  const items = [...root.querySelectorAll('[data-footer-details]')];
  if (!items.length) return;

  const mq = window.matchMedia('(min-width: 992px)');

  const getBody = (item) => item.querySelector('.ms-footer__details-body');
  const getSummary = (item) => item.querySelector('summary');

  const closeItem = (item) => {
    const body = getBody(item);
    if (!body) return;

    body.style.maxHeight = body.scrollHeight + 'px';
    requestAnimationFrame(() => {
      body.style.maxHeight = '0px';
    });

    const onEnd = (e) => {
      if (e.propertyName !== 'max-height') return;
      item.open = false;
      item.removeEventListener('transitionend', onEnd);
    };

    item.addEventListener('transitionend', onEnd);
  };

  const openItem = (item) => {
    const body = getBody(item);
    if (!body) return;

    item.open = true;
    body.style.maxHeight = '0px';

    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        body.style.maxHeight = body.scrollHeight + 'px';
      });
    });
  };

  const closeOthers = (current) => {
    items.forEach((item) => {
      if (item !== current && item.open) closeItem(item);
    });
  };

  const toggleItem = (item) => {
    if (item.open) {
      closeItem(item);
    } else {
      closeOthers(item);
      openItem(item);
    }
  };

  const syncState = () => {
    items.forEach((item) => {
      const body = getBody(item);
      if (!body) return;

      if (mq.matches) {
        item.open = true;
        body.style.maxHeight = 'none';
      } else {
        item.open = false;
        body.style.maxHeight = '0px';
      }
    });
  };

  items.forEach((item) => {
    const summary = getSummary(item);
    if (!summary) return;

    summary.addEventListener('click', (e) => {
      if (mq.matches) return;
      e.preventDefault();
      toggleItem(item);
    });
  });

  mq.addEventListener
    ? mq.addEventListener('change', syncState)
    : mq.addListener(syncState);

  window.addEventListener('resize', () => {
    if (mq.matches) return;

    items.forEach((item) => {
      if (!item.open) return;
      const body = getBody(item);
      if (body) body.style.maxHeight = body.scrollHeight + 'px';
    });
  });

  syncState();
});
</script>
</body>

</html>