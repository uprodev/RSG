<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php 
  $post_type = 'dienst';
  
  switch ($background_color) {
    case 'Lightblue':
    $background_color_class = ' bg-lightblue';
    break;
    case 'White':
    $background_color_class = ' bg-white';
    break;

    default:
    $background_color_class = '';
    break;
  }

  $is_default = $cards == 'Default';
  $is_select = $cards == 'Select' && is_array($select) && !empty($select);
  $is_custom = $cards == 'Custom' && is_array($custom_cards) && !empty($custom_cards);
  ?>

  <?php if ($is_default || $is_select || $is_custom): ?>

    <?php if ($args['index'] == 0): ?>
      <div class="wrap-hidden">
      <?php endif ?>

      <section class="cards-slider-block<?= $background_color_class ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
        <div class="bg">
          <img src="<?= get_stylesheet_directory_uri() ?>/img/after-2.png" alt="">
        </div>
        <div class="container">
          <div class="row justify-content-between">

            <?php if ($subtitle): ?>
              <h6 class="label"><?= $subtitle ?></h6>
            <?php endif ?>

            <?php if ($title): ?>
              <h2><?= $title ?></h2>
            <?php endif ?>

            <div class="slider-wrap">
              <div class="swiper cards-slider cards-slider-1">
                <div class="swiper-wrapper">

                  <?php if ($is_custom): ?>

                    <?php foreach ($custom_cards as $item): ?>

                      <?php 
                      $params = ['is_slider' => true];
                      $array = ['image', 'title', 'text', 'link'];
                      foreach ($array as $item_2) {
                        $params[$item_2] = $item[$item_2];
                      }
                      get_template_part('parts/content', $post_type, $params); 
                      ?>

                    <?php endforeach ?>

                  <?php else: ?>

                    <?php 
                    $args = array(
                      'post_type' => $post_type, 
                      'posts_per_page' => -1, 
                    );

                    if($cards == 'Select'){
                      $args['post__in'] = wp_list_pluck($select, 'ID');
                      $args['orderby'] = 'post__in';
                    }

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
            <div class="btn-wrap d-flex justify-content-between flex-wrap align-items-center">
              <div class="nav-wrap d-flex align-items-center">
                <div class="swiper-button-prev cards-prev cards-prev-1 swiper-btn"><i class="fa-regular fa-arrow-left"></i></div>
                <div class="swiper-pagination cards-pagination cards-pagination-1"></div>
                <div class="swiper-button-next cards-next cards-next-1 swiper-btn"><i class="fa-regular fa-arrow-right"></i></div>
              </div>

              <?php if ($button): ?>
                <a href="<?= $button['url'] ?>" class="btn-default btn-border btn-big"<?php if($button['target']) echo ' target="_blank"' ?>><?= html_entity_decode($button['title']) ?></a>
              <?php endif ?>

            </div>
          </div>
        </div>
      </section>

      <?php if ($args['index'] == 0): ?>
      </div>
    <?php endif ?>

  <?php endif ?>

  <?php endif; ?>