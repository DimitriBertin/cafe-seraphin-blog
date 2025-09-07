<?php
if (isset($args['alignment'])) {
  switch ($args['alignment']) {
    case 'left':
      $alignment = 'justify-start';
      break;
    case 'center':
      $alignment = 'justify-center';
      break;
    case 'right':
      $alignment = 'justify-end';
      break;
    default:
      $alignment = '';
      break;
  }
} else {
  $alignment = '';
}

  $classes = 'h-auto';


?>
<div class="media-wrapper flex  flex-col w-full overflow-hidden @sm:my-6 @md/lg:my-8 [.media-wrapper+&]:@sm:-mt-2 [.media-wrapper+&]:@md/lg:-mt-4 last:mb-0 first:mt-0  aos animate-fadeinup <?= $alignment; ?>">
  <img src="<?= $args['image']['url'] ?? ''; ?>" srcset="<?= $args['image']['sizes']['thumbnail'] ?? ''; ?> 640w, <?= $args['image']['sizes']['medium'] ?? ''; ?> 1280w, <?= $args['image']['sizes']['large'] ?? ''; ?> 2560w" sizes="(max-width: 640px) 640px, (max-width: 1280px) 1280px, 2560px" alt="<?= $args['image']['alt'] ?? ''; ?>" class="media h-auto w-full h-full object-cover" style="" loading="lazy" decoding="async" />
  <?php if($args['caption']): ?> <p class="caption text-sm text-gray-400"><?= $args['caption'] ?></p><?php endif; ?>
</div>