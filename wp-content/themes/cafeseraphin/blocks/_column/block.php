<?php
if (isset($args['width'])) {
  switch ($args['width']):
    case '1/2':
      $animateClass = 'md:nth-[2n]:animate-delay-300';
      break;
    case '1/3':
      $animateClass = 'md:nth-[3n-1]:animate-delay-300 md:nth-[3n]:animate-delay-600';
      break;
    case '1/4':
      $animateClass = 'md:nth-[4n-2]:animate-delay-300 md:nth-[4n-1]:animate-delay-600 md:nth-[4n]:animate-delay-900';
      break;
    default:
      $animateClass = '';
      break;
  endswitch;
} else {
  $animateClass = "";
}

if (isset($args['advanced']['isFull']) && $args['advanced']['isFull'] == true) {
  $size = '!w-full';
} else {
  $size = '';
}

$inline = $args['advanced']['inline'];

?>
<div class="<?= (isset($args['advanced']['isFull']) && $args['advanced']['isFull'] == true) ? 'row' : 'column'; ?> aos animate-fadeinup first:*:mt-0 last:*:mb-0 <?= $animateClass; ?> <?= $size; ?> <?= $inline ? 'grid grid-cols-1 md:grid-cols-2 @md/lg:gap-8 md:items-start column-grid-inline' : '' ?>">
  <?php
  $flexibleLayout = $args['content'];
  if ($flexibleLayout) {
    foreach ($flexibleLayout as $block) {

      // Force remove 'acf_fc_layout' value + '_' from keys in $block array to be able to use it as flexible layout name
      // Example: hero_enabled -> enabled
      $block = array_combine(
        array_map(function ($key) use ($block) {
          return str_replace($block['acf_fc_layout'] . '_', '', $key);
        }, array_keys($block)),
        array_values($block)
      );

      
      $block['parentColor'] = $args['parentColor'];
      $block['parentColumnWidth'] = $args['advanced']['isFull'] ? false : $args['width'] ?? false;
      $block['rootIsFull'] = $args['rootIsFull'] ?? false;
      $block['rootIsDivided'] = $args['rootIsDivided'] ?? false;
      
      $block['parentWidth'] = $args['advanced']['isFull'] ? 'full' : $args['width'];

      echo get_template_part('blocks/'.$block['acf_fc_layout'].'/block', null, $block);

    }
  }
  ?>
</div>
<?php if (isset($args['advanced']['isFull']) && $args['advanced']['isFull'] == true) {
  switch ($args['width']) {
    case '1/2':
      $times = 1;
      break;
    case '1/3':
      $times = 2;
      break;
    case '1/4':
      $times = 3;
      break;
  }
  for ($i = 0; $i < $times; $i++) {
?>
    <div class="sr-only !absolute !w-px">&nbsp;</div>
<?php }
} ?>