<?php
$title         = get_sub_field('title');
$text          = get_sub_field('text');

$contact_title = get_sub_field('contact_title');
$contact_text  = get_sub_field('contact_text');
$contact_phone = get_sub_field('contact_phone');
$contact_icon  = get_sub_field('contact_icon');

$faq_items     = get_sub_field('faq_items');

$uid = 'faq-section-' . get_row_index();
?>

<section class="faq-section" id="<?php echo esc_attr($uid); ?>" aria-labelledby="<?php echo esc_attr($uid); ?>-title">
    <div class="main-container faq-section-wrapper">
        <div class="faq-section__content">
            <div class="faq-section__left" data-aos="fade-right">
                <div class="faq-section__top">
                    <?php if (!empty($title)) : ?>
                        <h2 id="<?php echo esc_attr($uid); ?>-title" class="faq-section__title main-title-h3">
                            <?php echo esc_html($title); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if (!empty($text)) : ?>
                        <div class="faq-section__text">
                            <?php echo wp_kses_post($text); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($contact_title || $contact_text || $contact_phone || !empty($contact_icon['id'])) : ?>
                    <div class="faq-section__contact faq-section__contact-desktop">
                        <?php if (!empty($contact_icon['id'])) : ?>
                            <?php
                            echo wp_get_attachment_image(
                                $contact_icon['id'],
                                'full',
                                false,
                                array(
                                    'class'   => 'faq-section__contact-icon-image',
                                    'loading' => 'lazy',
                                    'alt'     => !empty($contact_icon['alt']) ? esc_attr($contact_icon['alt']) : '',
                                )
                            );
                            ?>
                        <?php endif; ?>
                        <?php if (!empty($contact_title)) : ?>
                            <h3 class="faq-section__contact-title">
                                <?php echo esc_html($contact_title); ?>
                            </h3>
                        <?php endif; ?>
                        <?php if (!empty($contact_text) || !empty($contact_phone)) : ?>
                            <div class="faq-section__contact-text">
                                <?php if (!empty($contact_text)) : ?>
                                    <?php echo wp_kses_post($contact_text); ?>
                                <?php endif; ?>

                                <?php if (!empty($contact_phone)) : ?>
                                    <p>
                                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $contact_phone)); ?>">
                                            <?php echo esc_html($contact_phone); ?>
                                        </a>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="faq-section__right" data-aos="fade-left">
                <?php if (!empty($faq_items)) : ?>
                    <div class="faq-section__accordion">
                        <?php foreach ($faq_items as $index => $item) : ?>
                            <?php
                            $question = $item['question'] ?? '';
                            $answer   = $item['answer'] ?? '';
                            ?>
                            <?php if (!empty($question) || !empty($answer)) : ?>
                                <div class="faq-section__accordion-item">
                                    <button
                                        class="faq-section__accordion-button"
                                        type="button"
                                        aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>">
                                        <span class="faq-section__accordion-title">
                                            <?php echo esc_html($question); ?>
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="faq-section__accordion-icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12H19" stroke="#17172A" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 5V19" stroke="#17172A" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>

                                    <div class="faq-section__accordion-content">
                                        <div class="faq-section__accordion-inner">
                                            <?php if (!empty($answer)) : ?>
                                                <div class="faq-section__accordion-text">
                                                    <?php echo wp_kses_post($answer); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($contact_title || $contact_text || $contact_phone || !empty($contact_icon['id'])) : ?>
                <div class="faq-section__contact faq-section__contact-mobile">
                    <?php if (!empty($contact_icon['id'])) : ?>
                        <?php
                        echo wp_get_attachment_image(
                            $contact_icon['id'],
                            'full',
                            false,
                            array(
                                'class'   => 'faq-section__contact-icon-image',
                                'loading' => 'lazy',
                                'alt'     => !empty($contact_icon['alt']) ? esc_attr($contact_icon['alt']) : '',
                            )
                        );
                        ?>
                    <?php endif; ?>
                    <?php if (!empty($contact_title)) : ?>
                        <h3 class="faq-section__contact-title">
                            <?php echo esc_html($contact_title); ?>
                        </h3>
                    <?php endif; ?>
                    <?php if (!empty($contact_text) || !empty($contact_phone)) : ?>
                        <div class="faq-section__contact-text">
                            <?php if (!empty($contact_text)) : ?>
                                <?php echo wp_kses_post($contact_text); ?>
                            <?php endif; ?>

                            <?php if (!empty($contact_phone)) : ?>
                                <p>
                                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $contact_phone)); ?>">
                                        <?php echo esc_html($contact_phone); ?>
                                    </a>
                                </p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>