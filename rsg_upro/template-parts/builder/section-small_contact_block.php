<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php 
  $fields = ['small_contact_block_title', 'small_contact_block_text', 'phone', 'email'];

  if ($block_settings == 'Default') {
    foreach ($fields as $field) {
      $$field = get_field('contact_person_sc', 'option') == 'Select' ? get_field($field, get_field('select_contact_sc', 'option')) : get_field($field . '_sc', 'option');
    }
    $image_html = get_field('contact_person_sc', 'option') == 'Select' ? get_the_post_thumbnail(get_field('select_contact_sc', 'option'), 'full') : wp_get_attachment_image(get_field('image_sc', 'option')['ID'], 'full');
  } else {
    foreach ($fields as $field) {
      $$field = $block_settings == 'Select' ? get_field($field, $select) : $$field;
    }
    $image_html = $block_settings == 'Select' ? get_the_post_thumbnail($select, 'full') : wp_get_attachment_image($image['ID'], 'full');
  }
  ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="small-contact-block<?php if(!$spacing_top) echo ' mt-0'; if(!$spacing_bottom) echo ' mb-0'; ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="container">
        <div class="row">
          <div class="content">

            <?php if ($image_html): ?>
              <figure><?= $image_html ?></figure>
            <?php endif ?>
            
            <div class="text">

              <?php if ($small_contact_block_title): ?>
                <h6><?= $small_contact_block_title ?></h6>
              <?php endif ?>

              <?= $small_contact_block_text ?>

              <?php if ($phone || $email): ?>
                <ul class="contact-list d-flex flex-wrap">

                  <?php if ($phone): ?>
                    <li><a href="tel:+<?= preg_replace('/[^0-9]/', '', $phone) ?>"><i class="fa-regular fa-phone"></i><?= $phone ?></a></li>
                  <?php endif ?>

                  <?php if ($email): ?>
                    <li><a href="mailto:<?= $email ?>"><i class="fa-regular fa-envelope"></i><?= $email ?></a></li>
                  <?php endif ?>

                </ul>
              <?php endif ?>
              
              <div class="icon-wrap">
                <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-2.svg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php if ($args['index'] == 0): ?>
    </div>
  <?php endif ?>

  <?php endif; ?>