<?php
$post_id    = get_the_ID();
$title      = get_the_title($post_id);
$permalink  = get_permalink($post_id);
$date       = get_the_date('d F Y', $post_id);
$thumb_id   = get_post_thumbnail_id($post_id);
$title1     = get_sub_field('title');
$image1     = get_sub_field('image');

$tags = get_the_terms($post_id, 'post_tag');
$first_tag = (!empty($tags) && !is_wp_error($tags)) ? $tags[0] : null;

$facebook_share = 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode($permalink);
$twitter_share  = 'https://twitter.com/intent/tweet?url=' . rawurlencode($permalink) . '&text=' . rawurlencode($title);
$mail_share     = 'mailto:?subject=' . rawurlencode($title) . '&body=' . rawurlencode($permalink);
?>

<section class="article-hero">
  <div class="article-hero-container">
    <div class="article-hero__content">
      <div class="article-hero__top">
        <div class="article-hero__meta">
          <?php if ($first_tag) : ?>
            <p class="article-hero__tag related-articles-slide-article-tag"><?php echo esc_html($first_tag->name); ?></p>
          <?php endif; ?>
          <svg xmlns="http://www.w3.org/2000/svg" width="3" height="3" viewBox="0 0 3 3" fill="none">
            <circle cx="1.5" cy="1.5" r="1.5" fill="#EEF6F8" />
          </svg>
          <?php if (!empty($date)) : ?>
            <p class="article-hero__date related-articles-slide-date"><?php echo esc_html($date); ?></p>
          <?php endif; ?>
        </div>
        <?php if (!empty($title1)) : ?>
          <h1 class="article-hero__title main-title"><?php echo wp_kses_post($title1); ?></h1>
        <?php else : ?>
          <h1 class="article-hero__title main-title"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>

        <div class="article-hero__share">
          <a
            href="<?php echo esc_url($facebook_share); ?>"
            class="article-hero__share-link"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="<?php esc_attr_e('Share on Facebook', 'textdomain'); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <g clip-path="url(#clip0_334_4692)">
                <path d="M13.0516 5.02445C13.0516 4.08007 13.8951 3.74083 14.8395 3.74083C15.7839 3.74083 16.7924 4.03423 16.7924 4.03423L17.3976 0.440097C17.3976 0.440097 16.1139 0 13.0516 0C11.172 0 10.0809 0.715158 9.28327 1.76956C8.53143 2.76895 8.50393 4.37347 8.50393 5.40954V7.76589H6.07422V11.2775H8.50393V23.4719H13.0516V11.2775H16.6549L16.9208 7.76589H13.0516V5.02445Z" fill="#020251" />
              </g>
              <defs>
                <clipPath id="clip0_334_4692">
                  <rect width="23.4719" height="23.4719" fill="white" />
                </clipPath>
              </defs>
            </svg>
          </a>

          <a
            href="<?php echo esc_url($twitter_share); ?>"
            class="article-hero__share-link"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="<?php esc_attr_e('Share on X', 'textdomain'); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <g clip-path="url(#clip0_334_4689)">
                <path d="M13.969 10.1571L22.7069 0H20.6363L13.0491 8.8193L6.9893 0H0L9.16366 13.3363L0 23.9877H2.07073L10.083 14.6742L16.4826 23.9877H23.4719L13.9684 10.1571H13.969ZM11.1328 13.4538L10.2043 12.1258L2.81684 1.55881H5.99736L11.9592 10.0867L12.8876 11.4147L20.6373 22.4998H17.4567L11.1328 13.4544V13.4538Z" fill="#020251" />
              </g>
              <defs>
                <clipPath id="clip0_334_4689">
                  <rect width="23.4719" height="24" fill="white" />
                </clipPath>
              </defs>
            </svg>
          </a>

          <a
            href="<?php echo esc_url($mail_share); ?>"
            class="article-hero__share-link"
            aria-label="<?php esc_attr_e('Share by email', 'textdomain'); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M21.515 6.84595L12.7218 12.4469C12.4234 12.6202 12.0845 12.7115 11.7394 12.7115C11.3944 12.7115 11.0554 12.6202 10.757 12.4469L1.95508 6.84595" stroke="#020251" stroke-width="1.95599" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M19.559 3.91187H3.91107C2.8308 3.91187 1.95508 4.78759 1.95508 5.86786V17.6038C1.95508 18.6841 2.8308 19.5598 3.91107 19.5598H19.559C20.6393 19.5598 21.515 18.6841 21.515 17.6038V5.86786C21.515 4.78759 20.6393 3.91187 19.559 3.91187Z" stroke="#020251" stroke-width="1.95599" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </a>

          <button
            type="button"
            class="article-hero__share-link article-hero__copy-link"
            data-copy-link="<?php echo esc_url($permalink); ?>"
            aria-label="<?php esc_attr_e('Copy link', 'textdomain'); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M9.78125 12.714C10.2013 13.2755 10.7371 13.7401 11.3524 14.0763C11.9678 14.4124 12.6482 14.6124 13.3477 14.6625C14.0471 14.7125 14.7491 14.6116 15.406 14.3666C16.063 14.1215 16.6596 13.738 17.1553 13.2421L20.0893 10.3081C20.9801 9.38584 21.4729 8.15062 21.4618 6.86848C21.4507 5.58634 20.9364 4.35988 20.0298 3.45324C19.1231 2.5466 17.8966 2.03232 16.6145 2.02118C15.3324 2.01004 14.0972 2.50292 13.1749 3.39367L11.4927 5.06604" stroke="#020251" stroke-width="1.95599" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M13.6925 10.7579C13.2725 10.1964 12.7366 9.73177 12.1213 9.39557C11.5059 9.05938 10.8255 8.85946 10.1261 8.80937C9.42665 8.75928 8.72465 8.86019 8.06767 9.10526C7.4107 9.35033 6.81411 9.73383 6.31838 10.2297L3.38439 13.1637C2.49364 14.086 2.00076 15.3212 2.0119 16.6033C2.02305 17.8855 2.53732 19.1119 3.44396 20.0186C4.3506 20.9252 5.57707 21.4395 6.8592 21.4506C8.14134 21.4618 9.37656 20.9689 10.2988 20.0782L11.9712 18.4058" stroke="#020251" stroke-width="1.95599" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div class="article-hero__copy-link-success">
              <p>Copied!</p>
            </div>
          </button>
        </div>
      </div>
      <?php if (!empty($image1['id'])) : ?>
        <div class="article-hero-image-wrapper">
          <?php
          echo wp_get_attachment_image(
            $image1['id'],
            'full',
            false,
            array(
              'class'   => 'article-hero-image',
              'loading' => 'lazy',
              'alt'     => !empty($image1['alt']) ? esc_attr($image1['alt']) : '',
            )
          );
          ?>
        </div>
      <?php else : ?>
        <?php if (!empty($thumb_id)) : ?>
          <div class="article-hero-image-wrapper">
            <?php
            echo wp_get_attachment_image(
              $thumb_id,
              'full',
              false,
              array(
                'class' => 'article-hero-image',
                'alt'   => $title,
              )
            );
            ?>
          </div>
        <?php endif; ?>
      <?php endif; ?>



    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const copyButton = document.querySelector('.article-hero__copy-link');

    if (!copyButton) return;

    copyButton.addEventListener('click', async function() {
      const link = this.getAttribute('data-copy-link');
      if (!link) return;

      try {
        await navigator.clipboard.writeText(link);
        this.classList.add('is-copied');

        setTimeout(() => {
          this.classList.remove('is-copied');
        }, 2000);
      } catch (error) {
        console.error('Copy failed:', error);
      }
    });
  });
</script>