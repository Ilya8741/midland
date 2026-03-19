<?php
$contact_title       = get_sub_field('contact_title');
$contact_text        = get_sub_field('contact_text');
$contact_phone       = get_sub_field('contact_phone');
$contact_mail        = get_sub_field('contact_mail');
$contact_hours       = get_sub_field('contact_hours');
$contact_hours_text  = get_sub_field('contact_hours_text');
$footer_contact_form = get_sub_field('footer_contact_form');
$map_text = get_sub_field('map_text');
$map_title = get_sub_field('map_title');
$map_image = get_sub_field('map_image');
$get_a_quote = get_sub_field('get_a_quote');
$get_a_quote_title = get_sub_field('get_a_quote_title');
$get_a_quote_content = get_sub_field('get_a_quote_content');
$get_a_quote_link = get_sub_field('get_a_quote_link');

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
?>

<div class="ms-footer__contact main-section contact-page <?php if ($get_a_quote): ?> contact-page-get-a-quote<?php endif; ?>">
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

            <div class="ms-footer__contact-right <?php if ($get_a_quote): ?> contact-page-get-a-quote-wrapper<?php endif; ?>" data-aos="fade-left">
                <?php if (!empty($footer_contact_form)) : ?>
                    <div class="contact-page__form-wrap <?php if ($get_a_quote): ?> get-a-quote-form-wrap<?php endif; ?>">
                        <?php echo do_shortcode(apply_filters('the_content', $footer_contact_form)); ?>
                    </div>
                <?php endif; ?>
                <?php if ($get_a_quote) : ?>
                    <div class="contact-page--success">
                        <h2 class="contact-page--success-title">
                            <?php echo esc_html($get_a_quote_title); ?>
                        </h2>

                        <div class="contact-page--success-content">
                            <?php echo wp_kses_post($get_a_quote_content); ?>
                        </div>

                        <?php if (!empty($get_a_quote_link) && !empty($get_a_quote_link['url'])) :
                            $btn_url    = $get_a_quote_link['url'];
                            $btn_title  = !empty($get_a_quote_link['title']) ? $get_a_quote_link['title'] : 'Learn more';
                            $btn_target = !empty($get_a_quote_link['target']) ? $get_a_quote_link['target'] : '_self';
                            $btn_rel    = ($btn_target === '_blank') ? 'noopener noreferrer' : '';
                        ?>
                            <a href="<?php echo esc_url($btn_url); ?>"
                                class="contact-page--success-button main-button"
                                target="<?php echo esc_attr($btn_target); ?>"
                                <?php if ($btn_rel) : ?>rel="<?php echo esc_attr($btn_rel); ?>" <?php endif; ?>>
                                <?php echo esc_html($btn_title); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if (!empty($map_title)) : ?>
            <div class="contact-page-map">
                <div class="contact-page-map-info" data-aos="fade-right">
                    <div class="contact-page-map-info-wrapper">
                        <?php if (!empty($map_title)) : ?>
                            <h2 class="contact-page-map-title main-title"><?php echo esc_html($map_title); ?></h2>
                        <?php endif; ?>

                        <?php if (!empty($map_text)) : ?>
                            <div class="contact-page-map-text">
                                <?php echo wp_kses_post($map_text); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (!empty($map_image['id'])) : ?>
                    <div class="map-image-wrapper" data-aos="fade-left">
                        <?php
                        echo wp_get_attachment_image(
                            $map_image['id'],
                            'full',
                            false,
                            array(
                                'class'   => 'main-image',
                                'loading' => 'lazy',
                                'alt'     => !empty($map_image['alt']) ? esc_attr($map_image['alt']) : '',
                            )
                        );
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php if ($get_a_quote) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('wpcf7mailsent', function(event) {
                const form = event.target;
                if (!form) return;

                const wrapper = form.closest('.contact-page-get-a-quote-wrapper');
                if (!wrapper) return;

                const formWrap = wrapper.querySelector('.get-a-quote-form-wrap');
                const successBlock = wrapper.querySelector('.contact-page--success');

                if (formWrap) {
                    formWrap.classList.add('is-hidden');
                }

                if (successBlock) {
                    successBlock.classList.add('is-visible');
                }
            }, false);
        });
    </script>
<?php endif; ?>