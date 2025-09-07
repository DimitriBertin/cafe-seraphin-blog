<?php 
return [
  [
    'key' => 'field_tab_page',
    'label' => 'Pages',
    'type' => 'tab',
    'placement' => 'top',
  ],
  [
    'key' => 'field_tab_page-cta-contact-title',
    'label' => 'CTA Contact Title',
      'instructions' => 'Show in formation page or blog page',
    'type' => 'textarea',
    'name' => 'cta-contact-text',
    'required' => 1,
    'rows' => 2,
    'new_lines' => 'br'
  ],
  [
    'key' => 'field_tab_page-cta-link',
    'label' => 'CTA Contact link',
    'instructions' => 'Show in formation page or blog page',
    'type' => 'link',
    'name' => 'cta-contact-link',
    'required' => 1,
  ],
  [
    'key' => 'field_tab_page-cta-social-title',
    'label' => 'CTA Social Title',
    'instructions' => 'Show in formation page or blog page',
    'type' => 'textarea',
    'name' => 'cta-social-text',
    'required' => 1,
    'rows' => 2,
    'new_lines' => 'br'
  ],
  [
    'key' => 'field_tab_page-blog-noresults',
    'label' => 'No articles message',
    'type' => 'textarea',
    'name' => 'result-no-articles',
    'rows' => 2
    // 'required' => 1,
  ],
  [
    'key' => 'field_tab_page-cs-noresults',
    'label' => 'No case study message',
    'type' => 'textarea',
    'name' => 'result-no-cs',
    'rows' => 2
    // 'required' => 1,
  ],
];