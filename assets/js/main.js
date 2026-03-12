document.addEventListener('DOMContentLoaded', () => {
   	document.querySelectorAll('.detailed-hero__accordion-button').forEach((btn) => {
			btn.addEventListener('click', () => {
				const item = btn.closest('.detailed-hero__accordion-item');
				const isOpen = item.classList.contains('is-open');

				item.classList.toggle('is-open', !isOpen);
				btn.setAttribute('aria-expanded', (!isOpen).toString());
			});
		});

    document.querySelectorAll('.faq-section__accordion-button').forEach((btn) => {
      btn.addEventListener('click', () => {
        const item = btn.closest('.faq-section__accordion-item');
        const isOpen = item.classList.contains('is-open');

        item.classList.toggle('is-open', !isOpen);
        btn.setAttribute('aria-expanded', (!isOpen).toString());
      });
    });

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
    } 

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

    video.addEventListener('ended', () => {
      showBtn();
    });

    video.addEventListener('pause', () => {
      showBtn();
    });

    video.addEventListener('play', () => {
      hideBtn();
    });
  });
});