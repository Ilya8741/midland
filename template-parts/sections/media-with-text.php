<?php
$subtitle      = get_sub_field('subtitle');
$section_title = get_sub_field('title');
$text1         = get_sub_field('text1');
$text2         = get_sub_field('text2');
$image         = get_sub_field('image');
$video_version = get_sub_field('video_version');
$small_image   = get_sub_field('small_image');
$link          = get_sub_field('link');
$video         = get_sub_field('video');
$small_title         = get_sub_field('small_title');


$image_id = null;
if (is_array($image) && !empty($image['id'])) {
  $image_id = (int) $image['id'];
} elseif (is_numeric($image)) {
  $image_id = (int) $image;
} elseif (is_string($image) && $image) {
}

$video_url  = null;
$video_mime = null;

if (is_array($video)) {
  $video_url  = !empty($video['url']) ? $video['url'] : null;
  $video_mime = !empty($video['mime_type']) ? $video['mime_type'] : null;
} elseif (is_numeric($video)) {
  $video_url  = wp_get_attachment_url((int) $video);
  $video_mime = $video ? get_post_mime_type((int) $video) : null;
} elseif (is_string($video) && $video) {
  $video_url = $video;
}
?>

<section class="media-with-text main-section">
  <div class="media-with-text-wrapper<?php echo $small_image ? ' media-with-text-wrapper--small' : ''; ?><?php echo $video_version ? ' media-with-text-wrapper--video' : ''; ?>">
    <div class="media-with-text-left" data-aos="fade-right">
      <?php if (!empty($subtitle)) : ?>
        <h5 class="media-with-text-subtitle"><?php echo esc_html($subtitle); ?></h5>
      <?php endif; ?>

      <?php if (!empty($section_title)) : ?>
        <h2 class="media-with-text-title <?php if ($small_title): ?> media-with-text--small-title<?php endif; ?>"><?php echo esc_html($section_title); ?></h2>
      <?php endif; ?>

      <?php if (!empty($text1)) : ?>
        <p class="media-with-text-content"><?php echo esc_html($text1); ?></p>
      <?php endif; ?>

      <?php if (!empty($text2)) : ?>
        <p class="media-with-text-content-bold"><?php echo esc_html($text2); ?></p>
      <?php endif; ?>

      <?php if (!empty($link) && is_array($link) && !empty($link['url'])) :
        $url        = $link['url'];
        $link_title = !empty($link['title']) ? $link['title'] : 'Learn more';
        $target     = !empty($link['target']) ? $link['target'] : '_self';
      ?>
        <a href="<?php echo esc_url($url); ?>"
           target="<?php echo esc_attr($target); ?>"
           class="media-with-text-link main-button">
          <?php echo esc_html($link_title); ?>
        </a>
      <?php endif; ?>
    </div>

    <div class="media-with-text-img" data-aos="fade-left">
      <?php if (!empty($image_id)) : ?>
        <?php
          echo wp_get_attachment_image(
            $image_id,
            'full',
            false,
            array('class' => 'media-with-text-image')
          );
        ?>
      <?php endif; ?>

      <?php if (!empty($video_url)) : ?>
        <div class="video-block">
          <button class="video-button" aria-label="Play video">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                        <path d="M0.5 1.83373C0.499931 1.59912 0.561764 1.36865 0.679256 1.16559C0.796748 0.962524 0.96574 0.794055 1.16917 0.677193C1.37259 0.56033 1.60326 0.499211 1.83786 0.500008C2.07246 0.500804 2.3027 0.563488 2.50533 0.681729L10.5033 5.34706C10.7052 5.46418 10.8727 5.63223 10.9893 5.8344C11.1058 6.03657 11.1673 6.26579 11.1675 6.49915C11.1677 6.73251 11.1066 6.96184 10.9904 7.16422C10.8742 7.36659 10.707 7.53493 10.5053 7.65239L2.50533 12.3191C2.3027 12.4373 2.07246 12.5 1.83786 12.5008C1.60326 12.5016 1.37259 12.4405 1.16917 12.3236C0.96574 12.2067 0.796748 12.0383 0.679256 11.8352C0.561764 11.6321 0.499931 11.4017 0.5 11.1671V1.83373Z" stroke="#2197C1" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
            <span>Play video</span>
          </button>

          <video class="media-with-text__video" preload="metadata">
            <source
              src="<?php echo esc_url($video_url); ?>"
              <?php if (!empty($video_mime)) : ?>
                type="<?php echo esc_attr($video_mime); ?>"
              <?php endif; ?>
            >
            Your browser does not support the video tag.
          </video>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>