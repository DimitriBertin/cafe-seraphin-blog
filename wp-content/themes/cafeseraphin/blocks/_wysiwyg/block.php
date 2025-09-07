<?php
if (isset($args['parentColumnWidth']) && !empty($args['parentColumnWidth'])) {
  if (
    ($args['parentColumnWidth'] == '1/2' && $args['rootIsFull'] == false) ||
    ($args['parentColumnWidth'] == '1/3' && $args['rootIsDivided'] == false) ||
    ($args['parentColumnWidth'] == '1/4' && $args['rootIsDivided'] == false)
  ) {
    $paddingRight = 'md:pr-[4%]';
  } else {
    $paddingRight = '';
  }
} else {
  $paddingRight = '';
}
?>
<div class="wysiwyg">
  <?php
  $content = $args['content'] ?? '';

  $content = preg_replace('/<p[^>]?(class=\"(.*?)\")?/', '<p class="$2 aos animate-fadeinup"', $content);
  $content = str_replace('<pre>', '<p class="small aos animate-fadeinup">', $content);
  $content = str_replace('</pre>', '</p>', $content);
  $content = str_replace('<h1', '<h1 class="aos animate-fadeinup" ', $content);
  $content = str_replace('<h2', '<h2 class="aos animate-fadeinup" ', $content);
  $content = str_replace('<h3', '<h3 class="aos animate-fadeinup" ', $content);
  $content = str_replace('<h4', '<h4 class="aos animate-fadeinup" ', $content);
  $content = str_replace('<h5', '<h5 class="aos animate-fadeinup" ', $content);
  $content = str_replace('<h6', '<p class="lead aos animate-fadeinup" ', $content);
  $content = str_replace('</h6>', '</p>', $content);
  $content = str_replace('<ul', '<ul class="aos animate-fadeinup" ', $content);
  $content = str_replace('<ol', '<ol class="aos animate-fadeinup" ', $content);

  echo $content;
  ?>
</div>