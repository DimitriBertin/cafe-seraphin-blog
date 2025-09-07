<?php 
get_header(); 
?>
<main class="">
  <div class="container">
    <?php
      $has_sidebar = get_field('has-sidebar');
      $flexible = get_field('main');

      $fields = get_fields(get_the_ID());
      var_dump(get_the_ID());
    ?>
    <div class="grid grid-cols-6 md:grid-cols-12 py-8 md:py-16">
      
      <div class="col-span-12 <?php if(!$has_sidebar): ?> md:col-span-8 md:col-start-3<?php endif; ?>">
        
        <?php foreach($flexible as $item): var_dump($item); ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</main>
<?php 
get_footer(); 
?>