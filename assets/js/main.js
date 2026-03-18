document.addEventListener('DOMContentLoaded', () => {
	initMainAccordion();
	initVideoBlocks();
	initMobileMenu();
});

function initMainAccordion() {
	const buttons = document.querySelectorAll('.main-accordion-button');
	if (!buttons.length) return;

	buttons.forEach((btn) => {
		btn.addEventListener('click', () => {
			const item = btn.closest('.main-accordion-item');
			if (!item) return;

			const isOpen = item.classList.contains('is-open');

			item.classList.toggle('is-open', !isOpen);
			btn.setAttribute('aria-expanded', (!isOpen).toString());
		});
	});
}

function initVideoBlocks() {
	const blocks = document.querySelectorAll('.video-block');
	if (!blocks.length) return;

	blocks.forEach((block) => {
		const video = block.querySelector('video');
		const btn = block.querySelector('.video-button');

		if (!video || !btn) return;

		const showBtn = () => {
			btn.classList.remove('is-hidden');
			video.removeAttribute('controls');
		};

		const hideBtn = () => {
			btn.classList.add('is-hidden');
			video.setAttribute('controls', 'controls');
		};

		btn.addEventListener('click', async (e) => {
			e.preventDefault();
			e.stopPropagation();
			e.stopImmediatePropagation();

			try {
				await video.play();
				hideBtn();
			} catch (err) {
				showBtn();
			}
		});

		video.addEventListener('click', (e) => {
			e.preventDefault();
			e.stopPropagation();
			e.stopImmediatePropagation();

			if (!video.paused) {
				video.pause();
				showBtn();
			}
		});

		video.addEventListener('ended', showBtn);
		video.addEventListener('pause', showBtn);
		video.addEventListener('play', hideBtn);
	});
}

function initMobileMenu() {
	const header = document.querySelector('[data-header]');
	if (!header) return;

	const burger = header.querySelector('[data-burger]');
	const mobileMenu = header.querySelector('[data-mobile-menu]');
	const overlay = header.querySelector('[data-mobile-overlay]');
	const level1 = header.querySelector('.mobile-menu__level[data-level="1"]');
	const level2Panels = header.querySelectorAll('.mobile-menu__level[data-level="2"]');

	if (!mobileMenu || !level1 || !level2Panels.length) return;

	let isAnimating = false;
	let scrollY = 0;

	function setHeaderHeightVar() {
		const h = header.getBoundingClientRect().height || 72;
		mobileMenu.style.setProperty('--header-h', `${Math.round(h)}px`);
	}

	function lockScroll(lock) {
		if (lock) {
			scrollY = window.scrollY || window.pageYOffset || 0;

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
		level2Panels.forEach((panel) => panel.classList.remove('is-active'));
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

		if (burger) burger.classList.add('is-active');

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

		if (burger) burger.classList.remove('is-active');

		const panel = mobileMenu.querySelector('.mobile-menu__panel');

		if (!panel) {
			mobileMenu.classList.remove('is-closing');
			mobileMenu.setAttribute('aria-hidden', 'true');
			lockScroll(false);
			showLevel1();
			isAnimating = false;
			return;
		}

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

			panel.removeEventListener('transitionend', onEnd);
			mobileMenu.classList.remove('is-closing');
			mobileMenu.setAttribute('aria-hidden', 'true');
			lockScroll(false);
			showLevel1();
			isAnimating = false;
		}, 350);
	}

	if (burger) {
		burger.addEventListener('click', () => {
			if (mobileMenu.classList.contains('is-open')) {
				closeMenu();
			} else {
				openMenu();
			}
		});
	}

	if (overlay) {
		overlay.addEventListener('click', closeMenu);
	}

	header.querySelectorAll('[data-open-submenu]').forEach((link) => {
		link.addEventListener('click', (e) => {
			if (window.matchMedia('(max-width: 992px)').matches) {
				e.preventDefault();

				level1.classList.add('is-leaving');
				level1.classList.remove('is-active');

				const panelId = link.getAttribute('data-open-submenu');

				level2Panels.forEach((panel) => {
					panel.classList.toggle(
						'is-active',
						panel.getAttribute('data-submenu-panel') === panelId
					);
				});
			}
		});
	});

	header.querySelectorAll('[data-back]').forEach((btn) => {
		btn.addEventListener('click', () => {
			showLevel1();
		});
	});

	document.addEventListener('keydown', (e) => {
		if (
			e.key === 'Escape' &&
			(mobileMenu.classList.contains('is-open') ||
				mobileMenu.classList.contains('is-closing'))
		) {
			closeMenu();
		}
	});

	window.addEventListener('resize', () => {
		setHeaderHeightVar();

		if (
			!window.matchMedia('(max-width: 992px)').matches &&
			mobileMenu.classList.contains('is-open')
		) {
			closeMenu();
		}
	});

	setHeaderHeightVar();
}