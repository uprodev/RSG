<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php 
  $post_type = ['nieuws', 'vacature'];

  $is_default = $card_settings == 'Default';
  $is_select = $card_settings == 'Select' && is_array($select) && !empty($select);
  $is_custom = $card_settings == 'Custom' && is_array($custom) && !empty($custom);
  ?>

  <?php if ($is_default || $is_select || $is_custom): ?>

    <?php if ($args['index'] == 0): ?>
      <div class="wrap-hidden">
      <?php endif ?>

      <section class="knowledge knowledge-3x"<?php if($id) echo ' id="' . $id . '"' ?>>
        <div class="bg"><img src="<?= get_stylesheet_directory_uri() ?>/img/after-3.png" alt=""></div>
        <div class="container">
          <div class="row">

            <?php if ($subtitle || $title): ?>
              <div class="title-wrap text-center">

                <?php if ($subtitle): ?>
                  <h6 class="label"><?= $subtitle ?></h6>
                <?php endif ?>

                <?php if ($title): ?>
                  <h2><?= $title ?></h2>
                <?php endif ?>

              </div>
            <?php endif ?>

            <div class="wrap d-flex flex-wrap">

              <?php if ($is_custom): ?>

                <?php foreach ($custom as $item): ?>

                  <?php 
                  $params = [];
                  $array = ['tag', 'image', 'subtitle', 'title', 'text', 'link'];
                  foreach ($array as $item_2) {
                    $params[$item_2] = $item[$item_2];
                  }
                  $params['is_custom'] = true;
                  get_template_part('parts/content', $post_type[0], $params); 
                  ?>

                <?php endforeach ?>

              <?php else: ?>

                <?php 
                $args = array(
                  'post_type' => $post_type[0], 
                  'posts_per_page' => 3, 
                );

                if($card_settings == 'Select'){
                  $args['post_type'] = $post_type;
                  $args['post__in'] = wp_list_pluck($select, 'ID');
                  $args['orderby'] = 'post__in';
                }

                $wp_query = new WP_Query($args);
                if($wp_query->have_posts()):
                  ?>

                  <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                    <?php get_template_part('parts/content', get_post_type()) ?>
                  <?php endwhile; ?>

                  <?php 
                endif;
                wp_reset_query(); 
                ?>

              <?php endif ?>

            </div>
          </div>
        </section>

        <?php if ($args['index'] == 0): ?>
        </div>
      <?php endif ?>

    <?php endif ?>

    <?php endif; ?>