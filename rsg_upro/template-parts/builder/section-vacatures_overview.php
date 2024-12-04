<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php 
  $post_type = 'vacature';
  $args = array(
    'post_type' => $post_type, 
    'posts_per_page' => 15, 
  );

  if($default_custom == 'Custom' && !empty($custom)){
    $args['post__in'] = wp_list_pluck($custom, 'ID');
    $args['orderby'] = 'post__in';
  }

  $wp_query = new WP_Query($args);
  if($wp_query->have_posts()):
    ?>

    <?php if ($args['index'] == 0): ?>
      <div class="wrap-hidden">
      <?php endif ?>

      <section class="knowledge vacancies"<?php if($id) echo ' id="' . $id . '"' ?>>
        <div class="container">
          <div class="row">
            <div class="wrap d-flex flex-wrap" id="response_vacatures">

              <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                <?php get_template_part('parts/content', $post_type) ?>

                <?php if ($wp_query->current_post == 5 && $is_cta_block): ?>
                  <div class="cta-block p-0 d-flex justify-content-between flex-wrap">

                    <?php 
                    $image_html = $contact_person == 'Select' ? get_the_post_thumbnail($select, 'full') : wp_get_attachment_image($image['ID'], 'full');
                    $name = $contact_person == 'Select' ? get_the_title($select) : $name;
                    $function = $contact_person == 'Select' ? get_field('function', $select) : $function;
                    $phone = $contact_person == 'Select' ? get_field('phone', $select) : $phone;
                    ?>

                    <div class="img-wrap">

                      <?php if ($image_html): ?>
                        <figure class="p-0"><?= $image_html ?></figure>
                      <?php endif ?>

                      <div class="name-block">

                        <?php if ($name): ?>
                          <h6><?= $name ?></h6>
                        <?php endif ?>

                        <?php if ($function): ?>
                          <p><?= $function ?></p>
                        <?php endif ?>

                      </div>
                    </div>
                    <div class="info-cta">

                      <?php if ($title): ?>
                        <h3 class="title-h4"><?= $title ?></h3>
                      <?php endif ?>

                      <?= $text ?>

                      <div class="btn-wrap d-flex align-items-center">

                        <?php if ($link): ?>
                          <a href="<?= $link['url'] ?>" class="btn-default btn-big"<?php if($link['target']) echo ' target="_blank"' ?>><?= html_entity_decode($link['title']) ?></a>
                        <?php endif ?>

                        <?php if ($phone): ?>
                          <a href="tel:+<?= preg_replace('/[^0-9]/', '', $phone) ?>" class="link-tel"><i class="fa-regular fa-phone"></i><?= $phone ?></a>
                        <?php endif ?>

                      </div>
                    </div>
                  </div>
                <?php endif ?>

              <?php endwhile ?>

            </div>

            <?php if ($wp_query->max_num_pages > 1): ?>
              <script> var this_page = 1; </script>

              <div class="btn-wrap w-100 d-flex justify-content-center load_vacatures" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'>
                <a href="#" class="btn-default btn-big"><?= $load_more ?></a>
              </div>
            <?php endif ?>

          </div>
        </div>
      </section>

      <?php if ($args['index'] == 0): ?>
      </div>
    <?php endif ?>

    <?php 
  endif;
  wp_reset_query(); 
  ?>

  <?php endif; ?>