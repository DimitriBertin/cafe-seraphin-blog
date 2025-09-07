<?php
$my = $args['my'];

$margin = '@md/lg:my-4';
if ($my == 2) $margin = '@md/lg:my-6';
if ($my == 3) $margin = '@md/lg:my-8';
if ($my == 4) $margin = '@md/lg:my-12';
if ($my == 5) $margin = '@md/lg:my-16';
?>

<div class="<?= $margin ?>"></div>