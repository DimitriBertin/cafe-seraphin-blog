<?php
$key = 'field_tab_cta_footer';
$cta_fields = getfield_ctaFooter($key.'_options', false);

return array_merge(
  [
    [
      'key' => $key,
      'label' => 'CTA Footer',
      'type' => 'tab',
      'placement' => 'top',
    ],
  ],
  $cta_fields,
);