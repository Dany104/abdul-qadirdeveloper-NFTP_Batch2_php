<?php get_header(); ?>
<!-- page.php -->
<?php if(is_front_page()){
  get_template_part('partials/content','hero');
  } ?>
<!-- the loop -->

<div class="container-fluid">
  <div class="row">
    <?php
      $isDark = true;
    if (have_posts()) {
      while (have_posts()) {
        the_post();
        if($isDark == true) {
          $isDark = false;
    ?>     
        <div class="col-12">
          <div class="bg-dark mb-5 mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
            <div class="my-3 py-3">
              <h2 class="display-5"><?php get_the_title(); ?></h2>
              <p class="lead">Last Updated On <?php the_time('F j, Y'); ?> by <span style="font-weight: 600"><?php the_author(); ?></span></p>
            </div>
            <div class="bg-light shadow-sm mx-auto text-body fs-4" style="font-size: 1.5em;padding: 30px; width: 80%; border-radius: 21px 21px 0 0;">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
          <?php }else{ $isDark = true; ?>
        <div class="col-6">
        <div class="bg-light mb-5 mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
          <div class="my-3 p-3">
            <h2 class="display-5"><?php the_shortlink(get_the_title()); ?></h2>
            <p class="lead">Last Updated On <?php the_time('F j, Y'); ?> by <span style="font-weight: 600"><?php the_author(); ?></span></p>
          </div>
          <div class="bg-dark shadow-sm mx-auto text-white" style="font-size: 1.5em; padding: 30px;width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
              <?php the_excerpt(); ?>
          </div>
        </div>
        </div>
    <?php
          }
      }
    }
    ?>

  </div>
</div>
<!--/the loop -->
<?php
     get_sidebar();
?>
<?php get_footer(); ?>