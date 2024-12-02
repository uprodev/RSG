<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php 
  $fields = ['subtitle', 'title', 'text', 'primary_button', 'secondary_link', 'image'];
  foreach ($fields as $field) {
    $$field = $block_settings == 'Default' ? get_field($field . '_faq', 'option') : $$field;
  }

  $custom_items = [];
  $posts = [];

  if($block_settings == 'Default' && get_field('items_faq', 'option') == 'Select') $posts = get_field('select_faq', 'option');
  if($block_settings == 'Custom' && $items == 'Select') $posts = $select;

  if (is_array($posts) && !empty($posts)) {
    foreach ($posts as $post) {
      $custom_item = [];
      $custom_item['icon'] = get_field('icon', $post->ID);
      $custom_item['question'] = get_the_title($post->ID);
      $custom_item['answer'] = get_the_content(null, false, $post->ID);
      $custom_items[] = $custom_item;
    }
  }

  if($block_settings == 'Default' && get_field('items_faq', 'option') == 'Custom') $custom_items = get_field('custom_faq', 'option');
  if($block_settings == 'Custom' && $items == 'Custom') $custom_items = $custom;
  wp_reset_postdata();
  ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="text-img faq<?php if($image_right_left == 'Left') echo ' text-img-revers'; if($background_color == 'Lightblue') echo ' bg-lightblue'; ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="container">
        <div class="row justify-content-between align-items-start">
          <div class="text col-12 col-lg-6">

            <?php if ($subtitle): ?>
              <h6 class="label"><?= $subtitle ?></h6>
            <?php endif ?>
            
            <?php if ($title): ?>
              <h2><?= $title ?></h2>
            <?php endif ?>
            
            <?= $text ?>

            <?php if (is_array($custom_items) && checkArrayForValues($custom_items)): ?>
            <ul class="accordion">

              <?php foreach ($custom_items as $item): ?>
                <li class="accordion-item">
                  <div class="accordion-thumb">
                    <p>

                      <?php if ($item['icon']): ?>
                        <i class="<?= $item['icon'] ?>"></i>
                      <?php endif ?>

                      <?= $item['question'] ?>
                    </p>
                  </div>
                  <div class="accordion-panel">
                    <div class="wrap"><?= $item['answer'] ?></div>
                  </div>
                </li>
              <?php endforeach ?>
              
            </ul>
          <?php endif ?>

          <?php if ($primary_button || $secondary_link): ?>
            <div class="btn-wrap d-flex align-items-center">

              <?php if ($primary_button): ?>
                <a href="<?= $primary_button['url'] ?>" class="btn-default btn-big"<?php if($primary_button['target']) echo ' target="_blank"' ?>><?= html_entity_decode($primary_button['title']) ?></a>
              <?php endif ?>

              <?php if ($secondary_link): ?>
                <a href="<?= $secondary_link['url'] ?>" class="link link-orange"<?php if($secondary_link['target']) echo ' target="_blank"' ?>><?= html_entity_decode($secondary_link['title']) ?></a>
              <?php endif ?>

            </div>
          <?php endif ?>

        </div>

        <?php if ($image): ?>
          <figure class="col-12 col-lg-6">
            <span class="after">
              <img src="<?= get_stylesheet_directory_uri() ?>/img/after.svg" alt="" class="">
            </span>
            <picture><source srcset="<?= $image['url'] ?>" media="(min-width: 992px)"><source srcset="<?= $image['url'] ?>">
              <?= wp_get_attachment_image($image['ID'], 'full') ?>
            </picture>
          </figure>
        <?php endif ?>
        
      </div>
    </div>
  </section>

  <?php if ($args['index'] == 0): ?>
  </div>
<?php endif ?>

<?php endif; ?>