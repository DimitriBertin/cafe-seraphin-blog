<?php 

add_action('wp_ajax_filter_news', 'ajax_filter_news');
add_action('wp_ajax_nopriv_filter_news', 'ajax_filter_news');

add_action('wp_ajax_filter_cs', 'ajax_filter_cs');
add_action('wp_ajax_nopriv_filter_cs', 'ajax_filter_cs');

function generate_pagination($current_page, $total_pages) {

  
  $html = '<nav class="pagination flex items-center justify-between @@:w-[222px] aos animate-fadeinup autoscale">';

  // Prev
  $html .= '<div class="page-button">';
  if ($current_page > 1) {
      $prev = $current_page - 1;
      $html .= '<button class="page-prev" data-page="'.$prev.'" @click.prevent="$store.news.changePage(' . $current_page - 1 . ')" >'._icon('arrow', '@@:w-6 @@:h-6').'</button> ';
  }
  $html .= '</div>';


  // Pages around current page
  $start = max(1, $current_page - 1);
  $end = min($total_pages, $current_page + 1);
  $html .= '<div class="flex items-center @@:gap-2">';


  // Always show page 1
  if ($current_page > 3) {
    $html .= '<button data-page="1" class="@@:text-[14px]" >1</button> ';
    if ($current_page > 4) {
        $html .= '... ';
    }
  }

  for ($i = $start; $i <= $end; $i++) {
      if ($i == $current_page) {
          $html .= '<span class="current-page @@:text-[14px] font-bold">'.$i.'</span> ';
      } else {
          $html .= '<button data-page="'.$i.'" class="@@:text-[14px] opacity-50" @click.prevent="$store.news.changePage(' . $i . ')" >'.$i.'</button> ';
      }

      if ($i < $end) {
        $html .= '<span class="@@:text-[14px] opacity-25">-</span>';
      }
  }

  // Ellipsis and last page

  if ($current_page < $total_pages - 2) {
      if ($current_page < $total_pages - 3) {
          $html .= '... ';
      }
      $html .= '<button data-page="'.$total_pages.'" class="@@:text-[14px]" @click.prevent="$store.news.changePage(' . $total_pages . ')" >'.$total_pages.'</button> ';
  }
  $html .= '</div>';


  // Next
  $html .= '<div class="page-button">';
  if ($current_page < $total_pages) {
      $next = $current_page + 1;
      $html .= '<button class="page-next" data-page="'.$next.'" @click.prevent="$store.news.changePage(' . $current_page + 1 . ')">'._icon('arrow', '@@:w-6 @@:h-6').'</button>';
  }
  $html .= '</div>';

  $html .= '</nav>';

  return $html;
}

// NEWS ------->
function ajax_filter_news() {
  $filters = $_POST['filters'] ?? [];
  $filtersDecode = json_decode(stripslashes($filters));
  $paged = $_POST['page'] ?? 1;
  $tax_query = ['relation' => 'AND'];

  if (!empty($filtersDecode->services)) {
    $tax_query[] = [
      'taxonomy' => 'services',
      'field' => 'term_id',
      'terms' => $filtersDecode->services,
    ];
  }

  if (!empty($filtersDecode->expertises)) {
    $tax_query[] = [
      'taxonomy' => 'expertises',
      'field' => 'term_id',
      'terms' => $filtersDecode->expertises,
    ];
  }

  if (!empty($filtersDecode->sujets)) {
    $tax_query[] = [
      'taxonomy' => 'subjects',
      'field' => 'term_id',
      'terms' => $filtersDecode->sujets,
    ];
  }

  $args = [
    'post_type' => 'post',
    'posts_per_page' => 10,
    'paged' => $paged,
    'tax_query' => count($tax_query) > 1 ? $tax_query : '',
  ];

  $query = new WP_Query($args);
  $posts = $query->posts;
  $none = get_field('result-no-articles', 'options');


  ob_start();

  if ($posts): 
    foreach($posts as $i => $post):
      $order =  "order-1"; 
      if($i >= 5 && $i < 8) $order = "order-6";
      if($i >= 8) $order = "order-9";

      echo '<div class="col-span-1 '.$order.'">';
      echo get_template_part('/blocks/news', null, ['id' => $post->ID]);
      echo '</div>';
    endforeach;
  else: 
    echo "<div class='col-span-1 md:col-span-2'><p class='paragraph paragraph-size-l'>".$none."</p>";
  endif; 
  echo get_template_part('/blocks/block-newsletter');
  echo get_template_part('/blocks/block-social');

  $html = ob_get_clean();

  wp_send_json([
    'html' => $html,
    'pagination' => sizeOf($posts) > 0 && $query->max_num_pages > 1 ? generate_pagination($paged, $query->max_num_pages) : '',
  ]);
}

// CS ------->
function ajax_filter_cs() {
  $filters = $_POST['filters'] ?? [];
  $filtersDecode = json_decode(stripslashes($filters));
  $paged = $_POST['page'] ?? 1;
  $tax_query = ['relation' => 'AND'];

  if (!empty($filtersDecode->services)) {
    $tax_query[] = [
      'taxonomy' => 'services',
      'field' => 'term_id',
      'terms' => $filtersDecode->services,
    ];
  }

  if (!empty($filtersDecode->expertises)) {
    $tax_query[] = [
      'taxonomy' => 'expertises',
      'field' => 'term_id',
      'terms' => $filtersDecode->expertises,
    ];
  }

  $args = [
    'post_type' => 'case_study',
    'posts_per_page' => 5,
    'paged' => $paged,
    'tax_query' => count($tax_query) > 1 ? $tax_query : '',
  ];

  $query = new WP_Query($args);
  $posts = $query->posts;
  $none = get_field('result-no-cs', 'options');


  ob_start();

  if ($posts): 
    foreach($posts as $i => $post):
    
      echo '<div class="col-span-1">';
      echo get_template_part('/blocks/case-study', null, ['id' => $post->ID, 'list' => true, 'reverse' => $i%2]);
      echo '</div>';
    endforeach;
  else: 
    echo "<div class='col-span-1 md:col-span-2'><p class='paragraph paragraph-size-l'>".$none."</p>";
  endif; 


  $html = ob_get_clean();

  wp_send_json([
    'html' => $html,
    'pagination' => sizeOf($posts) > 0 && $query->max_num_pages > 1 ? generate_pagination($paged, $query->max_num_pages) : '',
  ]);
}
