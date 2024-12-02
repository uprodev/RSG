<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <?php 
    $post_type = ['nieuws', 'case'];
    $args = array(
      'post_type' => $post_type, 
      'posts_per_page' => 3, 
    );

    if($default_custom == 'Custom'){
      $args['post__in'] = wp_list_pluck($custom, 'ID');
      $args['orderby'] = 'post__in';
    }

    $wp_query = new WP_Query($args);
    if($wp_query->have_posts()):
      ?>

      <section class="knowledge"<?php if($id) echo ' id="' . $id . '"' ?>>
        <div class="container">
          <div class="row" id="get_kennisbank">
            <div class="wrap d-flex flex-wrap" id="response_kennisbank">

              <?php 
              while ($wp_query->have_posts()): $wp_query->the_post();
               get_template_part('parts/content', $post_type[0]);

               if ($wp_query->current_post == 5 && $is_cta_block) {
                 ?>
                 <div class="cta-block p-0 d-flex justify-content-between flex-wrap">

                  <?php 
                  $image_html = $contact_person == 'Select' ? get_the_post_thumbnail($select, 'full') : wp_get_attachment_image($image['ID'], 'full');
                  $name = $contact_person == 'Select' ? get_the_title($select) : $name;
                  $function = $contact_person == 'Select' ? get_field('function', $select) : $function;
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
                      <h3 class="title"><?= $title ?></h3>
                    <?php endif ?>

                    <?= $text ?>

                    <?php if ($form): ?>
                      <?= do_shortcode('[contact-form-7 id="' . $form . '" html_class="form-cta"]') ?>
                    <?php endif ?>

                  </div>
                </div>
                <?php 
              }
            endwhile; 
            ?>

          </div>

          <?php if ($wp_query->max_num_pages > 1): ?>
            <script> var this_page = 1; </script>

            <div class="btn-wrap w-100 d-flex justify-content-center">
              <a href="#" class="btn-default btn-big load_kennisbank" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'><?= $load_more_button_text ?></a>
            </div>
          <?php endif ?>

        </div>
      </div>
    </section>

    <?php 
  endif;
  wp_reset_query(); 
  ?>

  <?php if ($args['index'] == 0): ?>
  </div>
<?php endif ?>

<?php endif; ?>