<section class="about-grid">
    <div class="about-grid-wrapper main-container">
        <h2 class="about-grid-title main-title" data-aos="fade-right">
            <?php the_sub_field('title'); ?>
        </h2>
        <div class="about-grid-main">
       <?php if (have_rows('items')) : ?>
            <?php while (have_rows('items')) : the_row();
                $image = get_sub_field('image');
                $name = get_sub_field('name');
                $job  = get_sub_field('job');
            ?>
                <div class="about-grid-item" data-aos="fade-up">
                    <?php if (!empty($image['id'])) : ?>
                        <div class="about-grid-item-image-wrapper">
                            <?php
                            echo wp_get_attachment_image(
                                $image['id'],
                                'full',
                                false,
                                array('class' => 'about-grid-item-image')
                            );
                            ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($name)) : ?>
                        <h4 class="about-grid-item-name">
                            <?php echo esc_html($name); ?>
                        </h4>
                    <?php endif; ?>
                    <?php if (!empty($job)) : ?>
                        <p class="about-grid-item-job">
                            <?php echo esc_html($job); ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php
            endwhile;
            ?>
        <?php endif; ?>
        </div>
 
    </div>
</section>