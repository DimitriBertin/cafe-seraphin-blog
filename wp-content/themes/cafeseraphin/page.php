<?php 
get_header(); 
?>
<main class="">
  <div class="container">
    <!--  -->
    <?php
      $has_sidebar = get_field('has-sidebar');
      $flexible = get_field('main');
    ?>
    <div class="grid grid-cols-6 md:grid-cols-12 py-8 md:py-16 gap-10 md:gap-0">
      
      <div class="col-span-12 <?php if(!$has_sidebar): ?> md:col-span-8 md:col-start-3 <?php else: ?> md:col-span-7 <?php endif; ?>">
        
        <?php foreach($flexible as $item):?>
          <?php echo get_template_part('/blocks/'.$item['acf_fc_layout'].'/block', null, $item); ?>
        <?php endforeach; ?>
      </div>
      <?php if($has_sidebar):
        
        $sidebar = get_field('sidebar-layout');
      ?>
        <div class="col-span-12 md:col-span-4 md:col-start-9 flex flex-col gap-6 md:gap-10">
          <?php foreach($sidebar as $item):?>
            <?php echo get_template_part('/blocks/'.$item['acf_fc_layout'].'/block', null, $item); ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>
<?php 
get_footer(); 
?>