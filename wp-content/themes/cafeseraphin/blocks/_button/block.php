<?php

?>
<div class="button-wrapper flex ">
  <?php if (isset($args['link']['url']) && !empty($args['link']['url'])) : ?>
    <a href="<?= $args['link']['url'] ?? '#'; ?>" target="<?= $args['link']['target'] ?? '_self'; ?>" class="button">
      <?= $args['link']['title'] ?? ''; ?>
    </a>
  <?php endif; ?>
</div>