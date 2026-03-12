<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package midland-stairlifts
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'midland-stairlifts'); ?></a>

		<?php
		$acf_ctx = 'header_options';

		$logo       = get_field('logo', $acf_ctx);
		$phone      = get_field('phone', $acf_ctx);
		$book_link  = get_field('book_link', $acf_ctx);

		$uid = 'header-' . uniqid();
		?>

		<header id="masthead" class="site-header main-header" data-header="<?php echo esc_attr($uid); ?>">
			<div class="main-header__inner">

				<!-- LEFT -->
				<div class="main-header__left">
					<a class="main-header__logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>">
						<?php if (!empty($logo) && !empty($logo['id'])) : ?>
							<?php echo wp_get_attachment_image($logo['id'], 'full'); ?>
						<?php else : ?>
							<?php bloginfo('name'); ?>
						<?php endif; ?>
					</a>

					<!-- Desktop nav -->
					<nav class="main-header__nav" aria-label="Primary">
						<ul class="main-nav">
							<?php if (have_rows('header_menu', $acf_ctx)) : ?>
								<?php $i = 0; ?>
								<?php while (have_rows('header_menu', $acf_ctx)) : the_row();
									$i++; ?>
									<?php
									$link = get_sub_field('link');
									$has_sub = have_rows('submenu');
									$item_id = 'menu-item-' . $uid . '-' . $i;
									?>
									<li class="main-nav__item <?php echo $has_sub ? 'has-submenu' : ''; ?>" data-menu-item="<?php echo esc_attr($item_id); ?>">
										<?php if (!empty($link) && !empty($link['url'])) : ?>
											<?php
											$link_url    = !empty($link['url']) ? $link['url'] : '';
											$link_target = !empty($link['target']) ? $link['target'] : '_self';

											$is_active = false;

											$link_page_id = $link_url ? url_to_postid($link_url) : 0;

											if ($link_page_id && is_page($link_page_id)) {
												$is_active = true;
											}

											if (
												is_page_template('page-templates/product-listing.php') ||
												is_page_template('page-templates/product-detailed.php')
											) {
												$is_active = true;
											}
											?>
											<a class="main-nav__link <?php echo $is_active ? ' active' : ''; ?>"
												href="<?php echo esc_url($link_url); ?>"
												target="<?php echo esc_attr($link_target); ?>">
												<?php echo esc_html(!empty($link['title']) ? $link['title'] : 'Link'); ?>
											</a>
											<?php if ($is_active): ?><div class="main-nav__link-border"></div><?php endif; ?>
										<?php endif; ?>

										<?php if ($has_sub) : ?>
											<div class="main-nav__submenu" aria-label="Submenu">
												<ul class="submenu">
													<?php while (have_rows('submenu')) : the_row(); ?>
														<?php $sub_link = get_sub_field('sub_link'); ?>
														<?php if (!empty($sub_link) && !empty($sub_link['url'])) : ?>
															<li class="submenu__item">
																<a class="submenu__link" href="<?php echo esc_url($sub_link['url']); ?>" target="<?php echo esc_attr($sub_link['target'] ?: '_self'); ?>">
																	<?php echo esc_html($sub_link['title'] ?: 'Link'); ?>
																</a>
															</li>
														<?php endif; ?>
													<?php endwhile; ?>
												</ul>
											</div>
										<?php endif; ?>
									</li>
								<?php endwhile; ?>
							<?php endif; ?>
						</ul>
					</nav>
				</div>

				<!-- RIGHT -->
				<div class="main-header__right">
					<?php if (!empty($phone) && !empty($phone['url'])) : ?>
						<a class="main-header__phone" href="<?php echo esc_url($phone['url']); ?>"
							target="<?php echo esc_attr($phone['target'] ?: '_self'); ?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
								<path d="M9.79506 11.737C9.94135 11.8042 10.1062 11.8195 10.2623 11.7805C10.4185 11.7415 10.5568 11.6504 10.6543 11.5223L10.9057 11.193C11.0377 11.017 11.2088 10.8742 11.4055 10.7759C11.6022 10.6775 11.8191 10.6263 12.0391 10.6263H14.1641C14.5398 10.6263 14.9001 10.7756 15.1658 11.0412C15.4315 11.3069 15.5807 11.6672 15.5807 12.043V14.168C15.5807 14.5437 15.4315 14.904 15.1658 15.1697C14.9001 15.4354 14.5398 15.5846 14.1641 15.5846C10.7826 15.5846 7.53954 14.2413 5.14845 11.8502C2.75736 9.45916 1.41406 6.21615 1.41406 2.83464C1.41406 2.45891 1.56332 2.09858 1.82899 1.8329C2.09467 1.56722 2.45501 1.41797 2.83073 1.41797H4.95573C5.33145 1.41797 5.69179 1.56722 5.95746 1.8329C6.22314 2.09858 6.3724 2.45891 6.3724 2.83464V4.95964C6.3724 5.17957 6.32119 5.39648 6.22283 5.59319C6.12448 5.7899 5.98167 5.96101 5.80573 6.09297L5.47423 6.34159C5.34419 6.44089 5.25254 6.58213 5.21483 6.74134C5.17713 6.90055 5.1957 7.0679 5.2674 7.21497C6.23546 9.18121 7.82761 10.7714 9.79506 11.737Z" fill="#2197C1" />
							</svg>
							<span class="main-header__phone-text"><?php echo esc_html($phone['title'] ?: 'Call'); ?></span>
						</a>
					<?php endif; ?>

					<?php if (!empty($book_link) && !empty($book_link['url'])) : ?>
						<a class="main-header__cta main-button" href="<?php echo esc_url($book_link['url']); ?>"
							target="<?php echo esc_attr($book_link['target'] ?: '_self'); ?>">
							<?php echo esc_html($book_link['title'] ?: 'Book'); ?>
						</a>
					<?php endif; ?>

					<!-- Burger (mobile) -->
					<button class="main-header__burger" type="button" aria-label="Open menu" data-burger>

						<svg xmlns="http://www.w3.org/2000/svg" class="icon-burger" width="63" height="30" viewBox="0 0 63 30" fill="none">
							<path d="M10.5 6.25H52.5" stroke="#17172A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M10.5 15H52.5" stroke="#17172A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M10.5 23.75H52.5" stroke="#17172A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>

						<svg xmlns="http://www.w3.org/2000/svg" class="icon-close" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M18 6L6 18" stroke="#020251" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M6 6L18 18" stroke="#020251" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</button>
				</div>

			</div>

			<div class="mobile-menu" data-mobile-menu aria-hidden="true">
				<div class="mobile-menu__overlay" data-mobile-overlay></div>

				<div class="mobile-menu__panel" role="dialog" aria-modal="true" aria-label="Mobile menu">

					<div class="mobile-menu__level is-active" data-level="1">
						<ul class="mobile-menu__list">
							<?php if (have_rows('header_menu', $acf_ctx)) : ?>
								<?php $i = 0; ?>
								<?php while (have_rows('header_menu', $acf_ctx)) : the_row();
									$i++; ?>
									<?php
									$link = get_sub_field('link');
									$has_sub = have_rows('submenu');
									$panel_id = 'submenu-panel-' . $uid . '-' . $i;
									?>
									<li class="mobile-menu__item <?php echo $has_sub ? 'has-submenu' : ''; ?>">
										<?php if (!empty($link) && !empty($link['url'])) : ?>
											<a class="mobile-menu__link"
												href="<?php echo esc_url($link['url']); ?>"
												target="<?php echo esc_attr($link['target'] ?: '_self'); ?>"
												<?php if ($has_sub) : ?>
												data-open-submenu="<?php echo esc_attr($panel_id); ?>"
												aria-haspopup="true"
												aria-expanded="false"
												<?php endif; ?>>
												<?php echo esc_html($link['title'] ?: 'Link'); ?>
											</a>
										<?php endif; ?>
									</li>
								<?php endwhile; ?>
							<?php endif; ?>
						</ul>

						<div class="mobile-menu__bottom">
							<?php if (!empty($phone) && !empty($phone['url'])) : ?>
								<a class="mobile-menu__phone" href="<?php echo esc_url($phone['url']); ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
										<path d="M9.79506 11.737C9.94135 11.8042 10.1062 11.8195 10.2623 11.7805C10.4185 11.7415 10.5568 11.6504 10.6543 11.5223L10.9057 11.193C11.0377 11.017 11.2088 10.8742 11.4055 10.7759C11.6022 10.6775 11.8191 10.6263 12.0391 10.6263H14.1641C14.5398 10.6263 14.9001 10.7756 15.1658 11.0412C15.4315 11.3069 15.5807 11.6672 15.5807 12.043V14.168C15.5807 14.5437 15.4315 14.904 15.1658 15.1697C14.9001 15.4354 14.5398 15.5846 14.1641 15.5846C10.7826 15.5846 7.53954 14.2413 5.14845 11.8502C2.75736 9.45916 1.41406 6.21615 1.41406 2.83464C1.41406 2.45891 1.56332 2.09858 1.82899 1.8329C2.09467 1.56722 2.45501 1.41797 2.83073 1.41797H4.95573C5.33145 1.41797 5.69179 1.56722 5.95746 1.8329C6.22314 2.09858 6.3724 2.45891 6.3724 2.83464V4.95964C6.3724 5.17957 6.32119 5.39648 6.22283 5.59319C6.12448 5.7899 5.98167 5.96101 5.80573 6.09297L5.47423 6.34159C5.34419 6.44089 5.25254 6.58213 5.21483 6.74134C5.17713 6.90055 5.1957 7.0679 5.2674 7.21497C6.23546 9.18121 7.82761 10.7714 9.79506 11.737Z" fill="#2197C1" />
									</svg> <span><?php echo esc_html($phone['title'] ?: 'Call'); ?></span>
								</a>
							<?php endif; ?>

							<?php if (!empty($book_link) && !empty($book_link['url'])) : ?>
								<a class="mobile-menu__cta main-button" href="<?php echo esc_url($book_link['url']); ?>">
									<?php echo esc_html($book_link['title'] ?: 'Book'); ?>
								</a>
							<?php endif; ?>
						</div>
					</div>

					<?php if (have_rows('header_menu', $acf_ctx)) : ?>
						<?php $i = 0; ?>
						<?php while (have_rows('header_menu', $acf_ctx)) : the_row();
							$i++; ?>
							<?php
							$link = get_sub_field('link');
							if (!have_rows('submenu')) continue;
							$panel_id = 'submenu-panel-' . $uid . '-' . $i;
							?>
							<div class="mobile-menu__level" data-level="2" data-submenu-panel="<?php echo esc_attr($panel_id); ?>">
								<button class="mobile-menu__back" type="button" data-back>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M15 18L9 12L15 6" stroke="#17172A" stroke-linecap="round" stroke-linejoin="round" />
									</svg> <span>Back</span>
								</button>

								<ul class="mobile-menu__list">
									<?php while (have_rows('submenu')) : the_row(); ?>
										<?php $sub_link = get_sub_field('sub_link'); ?>
										<?php if (!empty($sub_link) && !empty($sub_link['url'])) : ?>
											<li class="mobile-menu__item">
												<a class="mobile-menu__link mobile-menu__link-level-2" href="<?php echo esc_url($sub_link['url']); ?>"
													target="<?php echo esc_attr($sub_link['target'] ?: '_self'); ?>">
													<?php echo esc_html($sub_link['title'] ?: 'Link'); ?>
												</a>
											</li>
										<?php endif; ?>
									<?php endwhile; ?>
								</ul>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>

				</div>
			</div>
		</header>

		<script>
			document.addEventListener('DOMContentLoaded', () => {
				const header = document.querySelector('[data-header]');
				if (!header) return;

				const burger = header.querySelector('[data-burger]');
				const mobileMenu = header.querySelector('[data-mobile-menu]');
				const overlay = header.querySelector('[data-mobile-overlay]');

				const level1 = header.querySelector('.mobile-menu__level[data-level="1"]');
				const level2Panels = header.querySelectorAll('.mobile-menu__level[data-level="2"]');

				let isAnimating = false;

				function setHeaderHeightVar() {
					const h = header.getBoundingClientRect().height || 72;
					mobileMenu.style.setProperty('--header-h', `${Math.round(h)}px`);
				}

				let scrollY = 0;

				function lockScroll(lock) {
					if (lock) {
						scrollY = window.scrollY || window.pageYOffset || 0;

						const scrollbarW = window.innerWidth - document.documentElement.clientWidth;

						document.body.style.position = 'fixed';
						document.body.style.top = `-${scrollY}px`;
						document.body.style.left = '0';
						document.body.style.right = '0';
						document.body.style.width = '100%';
					} else {
						const top = document.body.style.top;
						document.body.style.position = '';
						document.body.style.top = '';
						document.body.style.left = '';
						document.body.style.right = '';
						document.body.style.width = '';

						const restoreY = top ? Math.abs(parseInt(top, 10)) : scrollY;
						window.scrollTo(0, restoreY);
					}
				}

				function showLevel1() {
					level2Panels.forEach(p => p.classList.remove('is-active'));
					level1.classList.add('is-active');
					level1.classList.remove('is-leaving');
				}

				function openMenu() {
					if (isAnimating) return;
					isAnimating = true;

					setHeaderHeightVar();
					showLevel1();

					mobileMenu.classList.remove('is-closing');
					mobileMenu.classList.add('is-open');
					mobileMenu.setAttribute('aria-hidden', 'false');

					burger && burger.classList.add('is-active');
					lockScroll(true);

					requestAnimationFrame(() => {
						isAnimating = false;
					});
				}

				function closeMenu() {
					if (isAnimating) return;
					if (!mobileMenu.classList.contains('is-open')) return;

					isAnimating = true;

					mobileMenu.classList.add('is-closing');
					mobileMenu.classList.remove('is-open');

					burger && burger.classList.remove('is-active');

					const panel = mobileMenu.querySelector('.mobile-menu__panel');
					const onEnd = (e) => {
						if (e.target !== panel) return;
						panel.removeEventListener('transitionend', onEnd);

						mobileMenu.classList.remove('is-closing');
						mobileMenu.setAttribute('aria-hidden', 'true');
						lockScroll(false);
						showLevel1();

						isAnimating = false;
					};

					panel.addEventListener('transitionend', onEnd);

					setTimeout(() => {
						if (!isAnimating) return;
						mobileMenu.classList.remove('is-closing');
						mobileMenu.setAttribute('aria-hidden', 'true');
						lockScroll(false);
						showLevel1();
						isAnimating = false;
					}, 350);
				}

				burger && burger.addEventListener('click', () => {
					if (mobileMenu.classList.contains('is-open')) closeMenu();
					else openMenu();
				});

				overlay && overlay.addEventListener('click', closeMenu);

				header.querySelectorAll('[data-open-submenu]').forEach(a => {
					a.addEventListener('click', (e) => {
						if (window.matchMedia('(max-width: 992px)').matches) {
							e.preventDefault();

							level1.classList.add('is-leaving');
							level1.classList.remove('is-active');

							const panelId = a.getAttribute('data-open-submenu');
							level2Panels.forEach(p => {
								p.classList.toggle('is-active', p.getAttribute('data-submenu-panel') === panelId);
							});
						}
					});
				});

				header.querySelectorAll('[data-back]').forEach(btn => {
					btn.addEventListener('click', () => showLevel1());
				});

				document.addEventListener('keydown', (e) => {
					if (e.key === 'Escape' && (mobileMenu.classList.contains('is-open') || mobileMenu.classList.contains('is-closing'))) {
						closeMenu();
					}
				});

				window.addEventListener('resize', () => {
					setHeaderHeightVar();
					if (!window.matchMedia('(max-width: 992px)').matches && mobileMenu.classList.contains('is-open')) {
						closeMenu();
					}
				});

				setHeaderHeightVar();
			});
		</script>