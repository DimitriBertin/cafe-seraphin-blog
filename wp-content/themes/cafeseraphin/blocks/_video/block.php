<?php
switch ($args['advanced']['aspect']) {
  case '16/9':
    $classes = 'aspect-[16/9]';
    break;
  case '9/16':
    $classes = 'aspect-[9/16]';
    break;
  case '2/1':
    $classes = 'aspect-[2/1]';
    break;
  case '21/9':
    $classes = 'aspect-[21/9]';
    break;
  case '1/1':
    $classes = 'aspect-[1/1]';
    break;
  case '4/5':
    $classes = 'aspect-[4/5]';
    break;
  case '4/3':
    $classes = 'aspect-[4/3]';
    break;
  case '3/2':
    $classes = 'aspect-[3/2]';
    break;
  case '3/4':
    $classes = 'aspect-[3/4]';
    break;
  default:
    $classes = 'aspect-[16/9]';
    break;
}

?>
<div class="<?= isset($args['parentColumnWidth']) && !empty($args['parentColumnWidth']) ? ' @sm:my-6 @md/lg:my-6 ' : '@sm:my-6 @md/lg:my-8'; ?> <?= isset($args['advanced']['isFull']) && $args['advanced']['isFull'] == true ? 'w-container ml-[50%] [translate:-50%_0] @md/lg:!my-16' : ''; ?> cursor-pointer aos animate-fadeinup @@:rounded-[12px] overflow-hidden last:mb-0 first:mt-0 ">
  <?php if (!$args['isUrl']): ?>
    <?php if ($classes !== 'h-auto') : ?>
      <?php if (isset($args['advanced']['fit']) && $args['advanced']['fit'] == true) : ?>
        <div class="media w-full <?= $classes ?? 'h-auto'; ?>">
          <video class="object-cover object-center" playsinline <?= $args['advanced']['controls'] ? 'controls' : ''; ?> <?= $args['advanced']['loop'] ? 'loop' : ''; ?> <?= $args['advanced']['autoplay'] ? 'autoplay muted' : ''; ?> <?= $args['advanced']['muted'] ? 'muted' : ''; ?>>
            <source src="<?= $args['video']['url'] ?? ''; ?>" type="<?= $args['video']['mime_type'] ?? ''; ?>">
          </video>
          <?php if (isset($args['poster']['url']) && !empty($args['poster']['url'])): ?>
            <img class="media-poster" src="<?= $args['poster']['sizes']['large'] ?? ''; ?>" alt="<?= $args['poster']['alt'] ?? ''; ?>" loading="lazy" decoding="async" />
            <div class="media-overlay"></div>
            <div class="media-icon">
              <?php echo icon('play', '@@:w-[22px] @@:h-[22px]'); ?>
            </div>
          <?php endif; ?>
        </div>
      <?php else : ?>
        <div class="media w-full <?= $classes ?? 'h-auto'; ?>">
          <video class="object-contain object-center" playsinline <?= $args['advanced']['controls'] ? 'controls' : ''; ?> <?= $args['advanced']['loop'] ? 'loop' : ''; ?> <?= $args['advanced']['autoplay'] ? 'autoplay muted' : ''; ?> <?= $args['advanced']['muted'] ? 'muted' : ''; ?>>
            <source src="<?= $args['video']['url'] ?? ''; ?>" type="<?= $args['video']['mime_type'] ?? ''; ?>">
          </video>
          <?php if (isset($args['poster']['url']) && !empty($args['poster']['url'])): ?>
            <img class="media-poster" src="<?= $args['poster']['sizes']['large'] ?? ''; ?>" alt="<?= $args['poster']['alt'] ?? ''; ?>" loading="lazy" decoding="async" />
            <div class="media-overlay"></div>
            <div class="media-icon">
              <?php echo icon('play', '@@:w-[22px] @@:h-[22px]'); ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    <?php else : ?>
      <div class="media w-full h-auto">
        <video class="w-full !h-auto" playsinline <?= $args['advanced']['controls'] ? 'controls' : ''; ?> <?= $args['advanced']['loop'] ? 'loop' : ''; ?> <?= $args['advanced']['autoplay'] ? 'autoplay muted' : ''; ?> <?= $args['advanced']['muted'] ? 'muted' : ''; ?>>
          <source src="<?= $args['video']['url'] ?? ''; ?>" type="<?= $args['video']['mime_type'] ?? ''; ?>">
        </video>
        <?php if (isset($args['poster']['url']) && !empty($args['poster']['url'])): ?>
          <img class="media-poster" src="<?= $args['poster']['sizes']['large'] ?? ''; ?>" alt="<?= $args['poster']['alt'] ?? ''; ?>" loading="lazy" decoding="async" />
          <div class="media-overlay"></div>
          <div class="media-icon">
            <?php echo icon('play', '@@:w-[22px] @@:h-[22px]'); ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  <?php else: ?>
    <div class="media w-full <?= $classes ?? 'aspect-[16/9]'; ?>">
      <?php
      if (strpos($args['url'], 'vimeo') !== false) {
        $embedUrl = vimeoEmbedFromUrl($args['url']);
        echo '<iframe loading="lazy" class="w-full h-full relative  z-[-1]" src="' . $embedUrl . '" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write"  data-iframe="vimeo"></iframe>';
      } elseif (strpos($args['url'], 'youtube') !== false) {
        $embedUrl = youtubeEmbedFromUrl($args['url']);
        $embedUrl .= (strpos($embedUrl, '?') !== false ? '&' : '?') . 'enablejsapi=1&rel=0&modestbranding=1';
        $uid = uniqid('yt_');

        echo '<iframe id="' . $uid . '" loading="lazy" class="w-full h-full relative z-[-1]" src="' . $embedUrl . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" data-iframe="youtube" allowfullscreen></iframe>';
      } else {
        echo '<div class="paragraph paragraph-size-m paragraph-color-primary">Invalid Video URL. Please provide a valid YouTube or Vimeo URL.</div>';
      }
      ?>
      <?php if (
        (strpos($args['url'], 'vimeo') !== false || strpos($args['url'], 'youtube') !== false) &&
        (isset($args['poster']['url']) && !empty($args['poster']['url']))
      ): ?>
        <img class="media-poster" src="<?= $args['poster']['sizes']['large'] ?? ''; ?>" alt="<?= $args['poster']['alt'] ?? ''; ?>" loading="lazy" decoding="async" />
        <div class="media-overlay"></div>
        <div class="media-icon">
          <?php echo icon('play', '@@:w-[22px] @@:h-[22px]'); ?>

        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>