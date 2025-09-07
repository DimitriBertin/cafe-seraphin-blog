<?php
if (isset($args['alignment'])) {
  switch ($args['alignment']) {
    case 'left':
      $alignment = 'justify-center md:justify-start';
      break;
    case 'center':
      $alignment = 'justify-center';
      break;
    case 'right':
      $alignment = 'justify-center md:justify-end';
      break;
    default:
      $alignment = 'justify-center md:justify-start';
      break;
  }
} else {
  $alignment = 'justify-center md:justify-start';
}

if (isset($args['parentWidth']) && !empty($args['parentWidth'])) {
  switch ($args['parentWidth']) {
    case '1/2':
      if ($args['rootIsFull']) {
        $cols = 'flex-grid-cols-2 md:flex-grid-cols-3 lg:flex-grid-cols-5 xl:flex-grid-cols-6 *:stagger-2 md:*:stagger-3 lg:*:stagger-5 xl:*:stagger-6';
      } else {
        $cols = 'flex-grid-cols-2 md:flex-grid-cols-3 lg:flex-grid-cols-3 xl:flex-grid-cols-4 *:stagger-2 md:*:stagger-3 lg:*:stagger-3 xl:*:stagger-4';
      }
      break;
    case '2/3':  
      $cols = 'flex-grid-cols-2 md:flex-grid-cols-3 lg:flex-grid-cols-4 xl:flex-grid-cols-5 *:stagger-2 md:*:stagger-3 lg:*:stagger-4 xl*:stagger-5';
    break;
    case '1/3':
      if ($args['rootIsFull']) {
        $cols = 'flex-grid-cols-2 md:flex-grid-cols-3 lg:flex-grid-cols-5 xl:flex-grid-cols-6 *:stagger-2 md:*:stagger-3 lg:*:stagger-5 xl:*:stagger-6';
      } else {
        $cols = 'flex-grid-cols-2 md:flex-grid-cols-2 lg:flex-grid-cols-3 *:stagger-2 md:*:stagger-2 lg:*:stagger-3';
      }
      break;
    case '1/4':
        $cols = 'flex-grid-cols-2 md:flex-grid-cols-2 lg:flex-grid-cols-3 *:stagger-2 md:*:stagger-2 lg:*:stagger-3';
      break;
    default:
      $cols = 'flex-grid-cols-2 md:flex-grid-cols-3 lg:flex-grid-cols-5 xl:flex-grid-cols-6 *:stagger-2 md:*:stagger-3 lg:*:stagger-5 xl:*:stagger-6';
      break;
  }
} else {
   $cols = 'flex-grid-cols-2 md:flex-grid-cols-3 lg:flex-grid-cols-5 xl:flex-grid-cols-6 *:stagger-2 md:*:stagger-3 lg:*:stagger-5 xl:*:stagger-6';
  }

$animate = 'aos animate-fadeinup stagger-delay-150';

$filter = 'grayscale brightness-50 contrast-00 transition-all duration-300 group-hover/logo:grayscale-0  group-hover/logo:invert-0  group-hover/logo:brightness-100 group-hover/logo:contrast-100';
$mode = $args['view'];
$color = $args['parentColor'];
if ($color == 'gunmetal') $filter = 'grayscale invert brightness-50 contrast-200 transition-all duration-300 group-hover/logo:grayscale-0  group-hover/logo:invert-0  group-hover/logo:brightness-100 group-hover/logo:contrast-100';

// var_dump($args);
?>
<!--  GRID VIEW -->
<?php if ((is_array($args['logos']) && count($args['logos']) > 0 && $mode == 0 )|| (is_array($args['logos']) && count($args['logos']) <= 6  && $mode == 1)) : ?>
  <div class="logos @@:py-[6px] flex-grid @sm:flex-grid-gap-3 @md/lg:flex-grid-gap-3 <?= $cols; ?> <?= $alignment; ?> <?= isset($args['parentWidth']) && !empty($args['parentWidth']) ? '@sm:my-6 @sm:[.logos+&]:-mt-3 @md/lg:my-6 @sm:[.logos+&]:-mt-4' : '@sm:my-6 @sm:[.logos+&]:-mt-3 @md/lg:my-12 @md/lg:[.logos+&]:-mt-10'; ?> first:mt-0 last:mb-0">
    <?php foreach ($args['logos'] as $logo) : 
      ?>
      <div class="col-span-1 relative inline-block group/logo w-full duration-150 ease-out-cubic <?= $animate; ?>">
        <?php if($logo['link']): ?>
          <a class="p-[15%] w-full relative inline-block cursor-pointer group/logo transition-colors duration-150 ease-out-cubic <?php if($args['parentColor'] == 'white') echo 'border-[--color-primitives-custom-secondary-green-mid] border' ?>" href="<?= $logo['link']['url']; ?>" target="<?= $logo['link']['target'] ?? '_self'; ?>" <?= $logo['link']['target'] === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>>
            <div class="logo-wrapper relative transform" style="--tw-scale-x: <?= ($logo['scale'] / 10) + 1 ?? '0'; ?>; --tw-scale-y: <?= ($logo['scale'] / 10) + 1 ?? '0'; ?>;">
            <img src="<?= $logo['image']['url'] ?? ''; ?>" alt="<?= $logo['image']['alt'] ?? ''; ?>" class="aspect-square object-contain w-full <?= $filter ?> <?= (isset($logo['link']) && !empty($logo['link']['url'])) ? 'duration-150 ease-out-cubic ' : ''; ?>" loading="lazy" decoding="async" />
            </div>
          </a>
          <?php else: ?>
          <div class="relative p-[15%] <?php if($args['parentColor'] == 'white') echo 'border-[--color-primitives-custom-secondary-green-mid] border' ?>">
            <div class="logo-wrapper relative transform" style="--tw-scale-x: <?= ($logo['scale'] / 10) + 1 ?? '0'; ?>; --tw-scale-y: <?= ($logo['scale'] / 10) + 1 ?? '0'; ?>;">
            <img src="<?= $logo['image']['url'] ?? ''; ?>" alt="<?= $logo['image']['alt'] ?? ''; ?>" class="aspect-square object-contain w-full <?= $filter ?> <?= (isset($logo['link']) && !empty($logo['link']['url'])) ? 'duration-150 ease-out-cubic' : ''; ?>" loading="lazy" decoding="async" />
            </div>
          </div>
          <?php endif; ?>
      </div>      
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<!-- SLIDER MODE -->
<?php if (is_array($args['logos']) && count($args['logos']) > 6 && $mode == 1) : ?>
<div class="logos slider-logos @@:py-[6px]  <?= isset($args['parentWidth']) && !empty($args['parentWidth']) ? '@sm:my-6 @sm:[.logos+&]:-mt-3 @md/lg:my-6 @sm:[.logos+&]:-mt-4' : '@sm:my-6 @sm:[.logos+&]:-mt-3 @md/lg:my-12 @md/lg:[.logos+&]:-mt-10'; ?> first:mt-0 last:mb-0">
  <div class="logos-slide flex-grid @sm:flex-grid-gap-3 @md/lg:flex-grid-gap-3 flex-grid-cols-2 md:flex-grid-cols-4">
    <?php foreach ($args['logos'] as $logo) : 
      ?>
      <div class="col-span-1 relative inline-block group/logo duration-150 ease-out-cubic ">
        <?php if($logo['link']): ?>
          <a class="p-[15%] w-full relative inline-block cursor-pointer group/logo transition-colors duration-150 ease-out-cubic <?php if($args['parentColor'] == 'white') echo 'border-[--color-primitives-custom-secondary-green-mid] border' ?>" href="<?= $logo['link']['url']; ?>" target="<?= $logo['link']['target'] ?? '_self'; ?>" <?= $logo['link']['target'] === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>>
            <div class="logo-wrapper relative flex items-center justify-center transform " style="--tw-scale-x: <?= ($logo['scale'] / 10) + 1 ?? '0'; ?>; --tw-scale-y: <?= ($logo['scale'] / 10) + 1 ?? '0'; ?>;">
            <img src="<?= $logo['image']['url'] ?? ''; ?>" alt="<?= $logo['image']['alt'] ?? ''; ?>" class="@@:h-[70px] object-contain w-auto <?= $filter ?> <?= (isset($logo['link']) && !empty($logo['link']['url'])) ? 'duration-150 ease-out-cubic ' : ''; ?>" loading="lazy" decoding="async" />
            </div>
          </a>
          <?php else: ?>
          <div class="relative p-[15%] <?php if($args['parentColor'] == 'white') echo 'border-[--color-primitives-custom-secondary-green-mid] border' ?>">
            <div class="logo-wrapper relative flex items-center justify-center transform style="--tw-scale-x: <?= ($logo['scale'] / 10) + 1 ?? '0'; ?>; --tw-scale-y: <?= ($logo['scale'] / 10) + 1 ?? '0'; ?>;">
            <img src="<?= $logo['image']['url'] ?? ''; ?>" alt="<?= $logo['image']['alt'] ?? ''; ?>" class="@@:h-[70px] object-contain w-auto <?= $filter ?> <?= (isset($logo['link']) && !empty($logo['link']['url'])) ? 'duration-150 ease-out-cubic ' : ''; ?>" loading="lazy" decoding="async" />
            </div>
          </div>
          <?php endif; ?>
      </div>      
    <?php endforeach; ?>
    <?php foreach ($args['logos'] as $logo) : 
      ?>
      <!-- DUPLKICATE -->
      <div class="col-span-1 relative inline-block group/logo duration-150 ease-out-cubic ">
        <?php if($logo['link']): ?>
          <a class="p-[15%] w-full relative inline-block cursor-pointer group/logo transition-colors duration-150 ease-out-cubic <?php if($args['parentColor'] == 'white') echo 'border-[--color-primitives-custom-secondary-green-mid] border' ?>" href="<?= $logo['link']['url']; ?>" target="<?= $logo['link']['target'] ?? '_self'; ?>" <?= $logo['link']['target'] === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>>
            <div class="logo-wrapper relative flex items-center justify-center transform transition-[filter]" style="--tw-scale-x: <?= ($logo['scale'] / 10) + 1 ?? '0'; ?>; --tw-scale-y: <?= ($logo['scale'] / 10) + 1 ?? '0'; ?>;">
            <img src="<?= $logo['image']['url'] ?? ''; ?>" alt="<?= $logo['image']['alt'] ?? ''; ?>" class="@@:h-[70px]  object-containw-auto <?= $filter ?> <?= (isset($logo['link']) && !empty($logo['link']['url'])) ? 'duration-150 ease-out-cubic ' : ''; ?>" loading="lazy" decoding="async" />
            </div>
          </a>
          <?php else: ?>
          <div class="relative p-[15%] <?php if($args['parentColor'] == 'white') echo 'border-[--color-primitives-custom-secondary-green-mid] border' ?>">
            <div class="logo-wrapper relative flex items-center justify-center transform" style="--tw-scale-x: <?= ($logo['scale'] / 10) + 1 ?? '0'; ?>; --tw-scale-y: <?= ($logo['scale'] / 10) + 1 ?? '0'; ?>;">
            <img src="<?= $logo['image']['url'] ?? ''; ?>" alt="<?= $logo['image']['alt'] ?? ''; ?>" class="@@:h-[70px]  object-contain w-auto <?= $filter ?> <?= (isset($logo['link']) && !empty($logo['link']['url'])) ? 'duration-150 ease-out-cubic ' : ''; ?>" loading="lazy" decoding="async" />
            </div>
          </div>
          <?php endif; ?>
      </div>      
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>