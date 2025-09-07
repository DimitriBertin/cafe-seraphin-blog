<?php

if (isset($args['advanced']['alignment'])) {
  switch ($args['advanced']['alignment']) {
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

if (isset($args['advanced']['fullWidthType']) && $args['advanced']['fullWidthType'] !== 'block') {
  $args['my'] = 3;
}

switch ($args['my']) {
  case 1:
    if (isset($args['parentColumnWidth']) && !empty($args['parentColumnWidth'])) {
      $marginClass = '@sm:my-6 @md/lg:-my-2';
    } else {
      $marginClass = '@sm:my-6 @md/lg:my-8';
    }
    break;
  case 2:
    if (isset($args['parentColumnWidth']) && !empty($args['parentColumnWidth'])) {
      $marginClass = '@sm:my-8 @md/lg:my-9';
    } else {
      $marginClass = '@sm:my-8 @md/lg:my-12';
    }
    break;
  case 3:
    if (isset($args['parentColumnWidth']) && !empty($args['parentColumnWidth'])) {
      $marginClass = '@sm:my-10 @md/lg:my-12';
    } else {
      $marginClass = '@sm:my-10 @md/lg:my-16';
    }
    break;
  default:
    if (isset($args['parentColumnWidth']) && !empty($args['parentColumnWidth'])) {
      $marginClass = '@sm:my-6 @md/lg:my-6';
    } else {
      $marginClass = '@sm:my-6 @md/lg:my-8';
    }
    break;
}

$borderColorClass = $args['advanced']['color'] === 'secondary' ? ' border-[--color-separator-secondary]' : ' border-[--color-separator-primary]'
  
?>
<div class="separator-wrapper flex 
    <?= $marginClass ?? '@sm:my-4 @md/lg:my-6'; ?> 
    <?= $alignment; ?> 
    @sm:[--min-px:48px] @md/lg:[--min-px:48px]
    <?= ($args['advanced']['width'] == 100 && isset($args['advanced']['fullWidthType']) && $args['advanced']['fullWidthType'] == 'container') && !(isset($args['parentBlock']) && $args['parentBlock'] == '_group') && !(isset($args['parentBlock']) && $args['parentBlock'] && $args['parentBlock'] == '_accordoen') ? 'w-container xl:w-[calc(var(--container-w)-((98/var(--tw-screen-lg))*var(--tw-screen-max)*var(--tw-scale)))]  ml-[50%] [translate:-50%_0]' : ''; ?> 
    <?= ($args['advanced']['width'] == 100 && isset($args['advanced']['fullWidthType']) && $args['advanced']['fullWidthType'] == 'screen') && !(isset($args['parentBlock']) && $args['parentBlock'] == '_group') && !(isset($args['parentBlock']) && $args['parentBlock'] && $args['parentBlock'] == '_accordoen') ? 'w-screen ml-[50%] [translate:-50%_0]' : ''; ?> 
    aos animate-fadeinup
    last:mb-0 first:mt-0 
    ">
  <hr class="border-0 border-t <?=$borderColorClass?> opacity-[calc(var(--color-separator-opacity)/100)]" style="--percentage: <?= $args['advanced']['width'] ?? '100'; ?>; width: calc((100%) * (var(--percentage) / 100) + (var(--min-px) * ((100 - var(--percentage)) / 100)));" />
</div>