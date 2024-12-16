<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php 
  $post_type = 'contact';

  $is_cases = is_array($select) && !empty($select);
  $is_custom = is_array($custom) && !empty($custom);
  ?>

  <?php if ($is_cases || $is_custom): ?>

    <?php if ($args['index'] == 0): ?>
      <div class="wrap-hidden">
      <?php endif ?>

      <section class="cases">
        <div class="bg">
          <img src="<?= get_stylesheet_directory_uri() ?>/img/img-19.png" alt="">
        </div>
        <div class="container">
          <div class="row">

            <div class="slider-wrap ">
              <div class="swiper cases-slider">
                <div class="swiper-wrapper">

                  <?php if ($is_custom): ?>

                    <?php foreach ($custom as $item): ?>

                      <?php 
                      $params = ['is_slider' => true];
                      $array = ['image', 'label', 'title', 'text', 'link'];
                      foreach ($array as $item_2) {
                        $params[$item_2] = $item[$item_2];
                      }
                      $params['is_custom'] = true;
                      get_template_part('parts/content', $post_type, $params); 
                      ?>

                    <?php endforeach ?>

                  <?php else: ?>

                    <?php 
                    $args = array(
                      'post_type' => $post_type, 
                      'posts_per_page' => -1, 
                      'post__in' => wp_list_pluck($select, 'ID'), 
                      'orderby' => 'post__in', 
                    );

                    $wp_query = new WP_Query($args);
                    if($wp_query->have_posts()):
                      ?>

                      <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                        <?php get_template_part('parts/content', $post_type, ['is_slider' => true]) ?>
                      <?php endwhile; ?>

                      <?php 
                    endif;
                    wp_reset_query(); 
                    ?>

                  <?php endif ?>

                </div>
              </div>
            </div>
            <div class="nav-wrap d-flex align-items-center">
              <div class="swiper-button-prev cases-prev swiper-btn"><i class="fa-regular fa-arrow-left"></i></div>
              <div class="pagination">

                <?php if ($is_custom): ?>

                  <?php foreach ($custom as $item): ?>
                    <a href="#">

                      <?php if ($item['name']): ?>
                        <h6><?= $item['name'] ?></h6>
                      <?php endif ?>

                      <?php if ($item['function']): ?>
                        <p><?= $item['function'] ?></p>
                      <?php endif ?>

                    </a>
                  <?php endforeach ?>

                <?php else: ?>

                  <?php 
                  $args = array(
                    'post_type' => $post_type, 
                    'posts_per_page' => -1, 
                    'post__in' => wp_list_pluck($select, 'ID'), 
                    'orderby' => 'post__in', 
                  );

                  $wp_query = new WP_Query($args);
                  if($wp_query->have_posts()):
                    ?>

                    <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                      <a href="#">
                        <h6><?php the_title() ?></h6>
                        
                        <?php if ($field = get_field('function')): ?>
                          <p><?= $field ?></p>
                        <?php endif ?>
                        
                      </a>
                    <?php endwhile; ?>

                    <?php 
                  endif;
                  wp_reset_query(); 
                  ?>

                <?php endif ?>

              </div>
              <div class="swiper-button-next cases-next swiper-btn"><i class="fa-regular fa-arrow-right"></i></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php if ($args['index'] == 0): ?>
    </div>
  <?php endif ?>

<?php endif ?>

<?php endif; ?>