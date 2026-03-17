<?php
$post_id    = get_the_ID();
$title      = get_the_title($post_id);
$permalink  = get_permalink($post_id);
$date       = get_the_date('d F Y', $post_id);
$thumb_id   = get_post_thumbnail_id($post_id);

$tags = get_the_terms($post_id, 'post_tag');
$first_tag = (!empty($tags) && !is_wp_error($tags)) ? $tags[0] : null;

$facebook_share = 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode($permalink);
$twitter_share  = 'https://twitter.com/intent/tweet?url=' . rawurlencode($permalink) . '&text=' . rawurlencode($title);
$mail_share     = 'mailto:?subject=' . rawurlencode($title) . '&body=' . rawurlencode($permalink);
?>

<section class="article-hero">
  <div class="main-container">
    <div class="article-hero__content">

      <div class="article-hero__top">
        <div class="article-hero__meta">
          <?php if ($first_tag) : ?>
            <p class="article-hero__tag"><?php echo esc_html($first_tag->name); ?></p>
          <?php endif; ?>

          <?php if (!empty($date)) : ?>
            <p class="article-hero__date"><?php echo esc_html($date); ?></p>
          <?php endif; ?>
        </div>

        <?php if (!empty($title)) : ?>
          <h1 class="article-hero__title"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>

        <div class="article-hero__share">
          <a
            href="<?php echo esc_url($facebook_share); ?>"
            class="article-hero__share-link"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="<?php esc_attr_e('Share on Facebook', 'textdomain'); ?>"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
              <path d="M7.222 0.777344H5.33311C4.4975 0.777344 3.69668 1.10923 3.10582 1.70009C2.51495 2.29095 2.18306 3.09175 2.18306 3.92737V5.81626H0.294167V8.33577H2.18306V13.3748H4.70257V8.33577H6.59146L7.222 5.81626H4.70257V3.92737C4.70257 3.76024 4.76897 3.60029 4.88714 3.48212C5.00531 3.36395 5.16526 3.29755 5.33239 3.29755H7.222V0.777344Z" fill="currentColor"/>
            </svg>
          </a>

          <a
            href="<?php echo esc_url($twitter_share); ?>"
            class="article-hero__share-link"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="<?php esc_attr_e('Share on X', 'textdomain'); ?>"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
              <path d="M10.9995 0.875H12.9868L8.64514 5.83887L13.7511 12.625H9.75201L6.62096 8.51539L3.02578 12.625H1.0372L5.68082 7.31767L0.782227 0.875H4.88286L7.71307 4.63124L10.9995 0.875ZM10.3019 11.4357H11.403L4.2847 2.00184H3.1033L10.3019 11.4357Z" fill="currentColor"/>
            </svg>
          </a>

          <a
            href="<?php echo esc_url($mail_share); ?>"
            class="article-hero__share-link"
            aria-label="<?php esc_attr_e('Share by email', 'textdomain'); ?>"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" viewBox="0 0 15 12" fill="none">
              <path d="M13.75 0.75H1.25C0.559644 0.75 0 1.30964 0 2V10.3333C0 11.0237 0.559644 11.5833 1.25 11.5833H13.75C14.4404 11.5833 15 11.0237 15 10.3333V2C15 1.30964 14.4404 0.75 13.75 0.75ZM13.325 1.58333L7.5 5.61667L1.675 1.58333H13.325ZM13.75 10.75H1.25C1.01982 10.75 0.833333 10.5635 0.833333 10.3333V2.37917L7.26375 6.83167C7.33517 6.88107 7.41992 6.90756 7.50675 6.90756C7.59358 6.90756 7.67833 6.88107 7.74975 6.83167L14.1667 2.3875V10.3333C14.1667 10.5635 13.9802 10.75 13.75 10.75Z" fill="currentColor"/>
            </svg>
          </a>

          <button
            type="button"
            class="article-hero__share-link article-hero__copy-link"
            data-copy-link="<?php echo esc_url($permalink); ?>"
            aria-label="<?php esc_attr_e('Copy link', 'textdomain'); ?>"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
              <path d="M5.83333 8.16667C6.08469 8.50261 6.40543 8.7807 6.77372 8.98255C7.142 9.18439 7.54969 9.30535 7.96921 9.33709C8.38873 9.36883 8.81008 9.3106 9.20518 9.16642C9.60028 9.02224 9.9598 8.79544 10.26 8.50167L12.035 6.72667C12.5743 6.16839 12.8728 5.4206 12.8663 4.64446C12.8598 3.86833 12.549 3.12564 12.0004 2.57654C11.4518 2.02745 10.7094 1.71605 9.93329 1.7089C9.15716 1.70176 8.40912 1.99962 7.85 2.53896L6.8325 3.55" stroke="currentColor" strokeWidth="1.4" strokeLinecap="round" strokeLinejoin="round"/>
              <path d="M8.16667 5.83333C7.91531 5.49739 7.59457 5.2193 7.22628 5.01745C6.858 4.81561 6.45031 4.69465 6.03079 4.66291C5.61127 4.63117 5.18992 4.6894 4.79482 4.83358C4.39972 4.97776 4.0402 5.20456 3.74 5.49833L1.965 7.27333C1.42573 7.83161 1.12718 8.5794 1.13368 9.35554C1.14018 10.1317 1.45098 10.8744 1.99958 11.4235C2.54818 11.9726 3.29065 12.284 4.06679 12.2911C4.84292 12.2982 5.59088 12.0004 6.15 11.461L7.16167 10.4492" stroke="currentColor" strokeWidth="1.4" strokeLinecap="round" strokeLinejoin="round"/>
            </svg>
          </button>
        </div>
      </div>

      <?php if (!empty($thumb_id)) : ?>
        <div class="article-hero__image-wrapper">
          <?php
            echo wp_get_attachment_image(
              $thumb_id,
              'full',
              false,
              array(
                'class' => 'article-hero__image',
                'alt'   => $title,
              )
            );
          ?>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const copyButton = document.querySelector('.article-hero__copy-link');

  if (!copyButton) return;

  copyButton.addEventListener('click', async function () {
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