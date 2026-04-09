<?php
$contact_title       = get_sub_field('contact_title');
$contact_text        = get_sub_field('contact_text');
$contact_phone       = get_sub_field('contact_phone');
$contact_mail        = get_sub_field('contact_mail');
$contact_whatsapp        = get_sub_field('contact_whatsapp');
$contact_facebook        = get_sub_field('contact_facebook');
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

                             <?php if (!empty($contact_whatsapp)) : ?>
                            <a class="ms-footer__contact-link" href="<?php echo esc_url($contact_whatsapp['url']); ?>" <?php echo !empty($contact_whatsapp['target']) ? 'target="' . esc_attr($contact_whatsapp['target']) . '" rel="noopener noreferrer"' : ''; ?>>
                                <span class="ms-footer__icon" aria-hidden="true">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                <g opacity="0.5">
                                <path d="M12.25 24.25C10.1553 24.25 8.09373 23.7025 6.28813 22.6668L6.19133 22.6113L0.364667 24.1393L1.938 18.3923L1.8804 18.2931C0.813733 16.4667 0.25 14.3771 0.25 12.2501C0.25 5.63326 5.6332 0.25 12.25 0.25C18.8668 0.25 24.25 5.63326 24.25 12.2501C24.25 18.867 18.8671 24.25 12.25 24.25ZM6.26893 22.0284L6.5588 22.195C8.282 23.1833 10.25 23.706 12.25 23.706C18.5665 23.706 23.7057 18.5667 23.7057 12.2501C23.7057 5.93326 18.5665 0.794006 12.25 0.794006C5.9332 0.794006 0.794 5.93326 0.794 12.2501C0.794 14.2811 1.33213 16.2758 2.35 18.019L2.52333 18.3153L1.13853 23.374L6.26893 22.0284Z" fill="white" stroke="white" stroke-width="0.5"/>
                                <path d="M15.3491 17.5614C14.9848 17.5614 14.5646 17.5161 14.112 17.3724C13.6251 17.218 13.079 17.0337 12.3848 16.734C9.8883 15.6558 8.0795 13.435 7.2235 12.207C7.2011 12.1747 7.18536 12.152 7.17656 12.1403C6.7923 11.6275 5.9043 10.2912 5.9043 8.89173C5.9043 7.41092 6.64616 6.61944 6.96296 6.2813L7.01923 6.22077C7.3995 5.8053 7.8403 5.7605 8.0123 5.7605C8.21576 5.7605 8.41976 5.76236 8.59763 5.77116C8.61443 5.77196 8.63203 5.77196 8.6499 5.7717C8.95363 5.7773 9.25416 5.8509 9.50243 6.44771C9.5851 6.64611 9.7059 6.94024 9.83336 7.25065C10.0598 7.80185 10.3699 8.5568 10.4155 8.648C10.4656 8.74826 10.6179 9.0536 10.4406 9.40934L10.3992 9.49281C10.3216 9.65121 10.2547 9.78801 10.1056 9.96161C10.0568 10.0187 10.0064 10.08 9.95576 10.1416C9.8507 10.2696 9.74216 10.4019 9.64323 10.5003C9.4923 10.6507 9.48643 10.6694 9.55443 10.7864C9.76216 11.1427 10.3344 12.0515 11.1624 12.7902C12.0846 13.6129 12.872 13.9542 13.295 14.1377C13.3827 14.1758 13.4536 14.2067 13.5056 14.2326C13.7259 14.3427 13.7592 14.3049 13.8326 14.2209C14.0467 13.9761 14.5766 13.3483 14.7568 13.0779C15.0846 12.5859 15.4958 12.7366 15.7419 12.8259C16.0451 12.9363 17.6102 13.7094 17.8102 13.8094L17.9696 13.8875C18.2142 14.0057 18.3907 14.091 18.4918 14.2595L18.492 14.2598C18.6448 14.5153 18.5782 15.2387 18.3403 15.9065C18.0456 16.7329 16.7307 17.4081 16.1128 17.5004C15.904 17.5316 15.6451 17.5614 15.3491 17.5614ZM8.0123 6.2941C7.93336 6.2941 7.65656 6.3149 7.41283 6.58104L7.35203 6.64611C7.05523 6.96291 6.43763 7.62185 6.43763 8.89173C6.43763 10.1307 7.25123 11.3504 7.6011 11.8174C7.61443 11.8352 7.6339 11.8627 7.66136 11.9019C8.4851 13.0835 10.2216 15.2187 12.5968 16.2443C13.2691 16.5348 13.8003 16.7137 14.2739 16.8638C14.9878 17.0908 15.6203 17.0345 16.0344 16.9724C16.5755 16.8916 17.6424 16.2763 17.8382 15.727C18.0603 15.1043 18.0528 14.6363 18.0288 14.5273C17.9888 14.4886 17.8507 14.4219 17.7384 14.3675L17.572 14.2862C17.1862 14.0929 15.8046 13.416 15.5598 13.3267C15.2966 13.231 15.2856 13.247 15.2011 13.3734C14.9854 13.6977 14.384 14.4011 14.2347 14.5718C13.8958 14.9598 13.5206 14.8361 13.2675 14.7097C13.2222 14.6867 13.16 14.6601 13.0835 14.6267C12.6654 14.4451 11.7944 14.0675 10.8083 13.1878C9.92323 12.3987 9.3147 11.4331 9.09443 11.0547C8.81416 10.5736 9.12056 10.2685 9.2675 10.1221C9.3475 10.0424 9.4475 9.92081 9.5443 9.80294C9.5971 9.73868 9.6499 9.67414 9.7011 9.61441C9.8059 9.49227 9.8491 9.40374 9.92056 9.25787L9.9635 9.17067C10.0062 9.08507 9.9995 9.008 9.9387 8.88613C9.8883 8.78506 9.66883 8.25306 9.3403 7.45278C9.2131 7.14345 9.09283 6.85011 9.01043 6.65224C8.86536 6.30317 8.77176 6.30317 8.65336 6.3045C8.6251 6.30504 8.5979 6.30477 8.5715 6.30344C8.40136 6.2957 8.2067 6.2941 8.0123 6.2941Z" fill="white" stroke="white" stroke-width="0.5"/>
                                </g>
                                </svg>
                                </span>
                                <span><?php echo esc_html($contact_whatsapp['title']); ?></span>
                            </a>
                        <?php endif; ?>

                             <?php if (!empty($contact_facebook)) : ?>
                            <a class="ms-footer__contact-link" href="<?php echo esc_url($contact_facebook['url']); ?>" <?php echo !empty($contact_facebook['target']) ? 'target="' . esc_attr($contact_facebook['target']) . '" rel="noopener noreferrer"' : ''; ?>>
                                <span class="ms-footer__icon" aria-hidden="true">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <g opacity="0.5">
                                <path d="M22.2011 24H15.8008C15.5064 24 15.2675 23.7611 15.2675 23.4667V14.5856C15.2675 14.2912 15.5064 14.0523 15.8008 14.0523H18.3128L18.6216 11.6579H15.8008C15.5064 11.6579 15.2675 11.4189 15.2675 11.1245V8.91493C15.2675 7.96267 15.5005 6.69653 17.516 6.69653L18.8155 6.696V4.61573C18.3165 4.57467 17.5363 4.5304 16.6781 4.5304C14.2248 4.5304 12.76 6.04133 12.76 8.572V11.1245C12.76 11.4189 12.5211 11.6579 12.2267 11.6579H9.7712V14.0523H12.2267C12.5211 14.0523 12.76 14.2912 12.76 14.5856V23.4667C12.76 23.7611 12.5211 24 12.2267 24H1.7992C0.8072 24 0 23.1931 0 22.2008V1.7992C0 0.806933 0.8072 0 1.7992 0H22.2011C23.1931 0 24 0.806933 24 1.7992V22.2008C24 23.1931 23.1931 24 22.2011 24ZM16.3341 22.9333H22.2011C22.6051 22.9333 22.9333 22.6048 22.9333 22.2008V1.7992C22.9333 1.3952 22.6051 1.06667 22.2011 1.06667H1.7992C1.3952 1.06667 1.06667 1.3952 1.06667 1.7992V22.2008C1.06667 22.6048 1.3952 22.9333 1.7992 22.9333H11.6933V15.1189H9.23787C8.94347 15.1189 8.70453 14.88 8.70453 14.5856V11.1245C8.70453 10.8301 8.94347 10.5912 9.23787 10.5912H11.6933V8.572C11.6933 5.42107 13.6035 3.46373 16.6781 3.46373C17.9483 3.46373 19.0731 3.55867 19.4189 3.6048C19.684 3.64 19.8819 3.86613 19.8819 4.13333V7.2288C19.8819 7.5232 19.6432 7.76213 19.3488 7.76213L17.516 7.76293C16.4507 7.76293 16.3339 8.13173 16.3339 8.91467V10.5909H19.228C19.3813 10.5909 19.5272 10.6571 19.6285 10.772C19.7299 10.8872 19.7765 11.0403 19.7568 11.1925L19.3104 14.6536C19.276 14.9195 19.0496 15.1187 18.7816 15.1187H16.3339L16.3341 22.9333Z" fill="white"/>
                                </g>
                                </svg>
                                </span>
                                <span><?php echo esc_html($contact_facebook['title']); ?></span>
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