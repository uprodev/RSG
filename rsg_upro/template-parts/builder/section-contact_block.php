<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php 
  $is_default = $block_settings == 'Default';
  $is_custom_and_select = $block_settings == 'Custom' && $contact_info == 'Select';
  $is_custom_and_custom = $block_settings == 'Custom' && $contact_info == 'Custom';

  $fields = ['subtitle', 'title', 'text', 'form', 'form_text'];
  foreach ($fields as $field) {
    $$field = $is_default ? get_field($field . '_cb', 'option') : $$field;
  }
  $contact_person = $is_default ? get_field('contact_person_cb', 'option') : $contact_person;

  $contact_person_fields = ['phone', 'email', 'function'];
  foreach ($contact_person_fields as $field) {
    $$field = $is_custom_and_custom ? $contact_info_custom[$field] : get_field($field, $contact_person);
  }
  $name = $is_custom_and_custom ? $contact_info_custom['name'] : get_the_title($contact_person);
  $image_html = $is_custom_and_custom ? wp_get_attachment_image($contact_info_custom['image']['ID'], 'full') : get_the_post_thumbnail($contact_person, 'full');
  ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="contact-block"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="container">
        <div class="row">
          <div class="bg"><img src="<?= get_stylesheet_directory_uri() ?>/img/after-3.png" alt=""></div>
          <div class="wrap d-flex justify-content-between flex-wrap">
            <div class="text col-lg-5 col-12">

              <?php if ($subtitle): ?>
                <h6 class="label"><?= $subtitle ?></h6>
              <?php endif ?>

              <?php if ($title): ?>
                <h3><?= $title ?></h3>
              <?php endif ?>

              <?= $text ?>

              <?php if ($phone || $email): ?>
                <ul class="d-flex flex-wrap">

                  <?php if ($phone): ?>
                    <li><a href="tel:+<?= preg_replace('/[^0-9]/', '', $phone) ?>"><i class="fa-regular fa-phone"></i><?= $phone ?></a></li>
                  <?php endif ?>
                  
                  <?php if ($email): ?>
                    <li><a href="mailto:<?= $email ?>"><i class="fa-regular fa-envelope"></i><?= $email ?></a></li>
                  <?php endif ?>
                  
                </ul>
              <?php endif ?>

            </div>

            <?php if ($form): ?>
              <div class="form-wrap  col-lg-7 col-12">
                <?= do_shortcode('[contact-form-7 id="' . $form . '" html_class="default-form"]') ?>

                <?php if ($form_text): ?>
                  <div class="text-form"><?= $form_text ?></div>
                <?php endif ?>

              </div>
            <?php endif ?>
            
          </div>
          <div class="img-wrap">

            <?php if ($image_html): ?>
              <figure><?= $image_html ?></figure>
            <?php endif ?>
            
            <?php if ($name): ?>
              <h6><?= $name ?></h6>
            <?php endif ?>

            <?php if ($function): ?>
              <p><?= $function ?></p>
            <?php endif ?>

          </div>
        </div>
      </div>
    </section>

    <?php if ($args['index'] == 0): ?>
    </div>
  <?php endif ?>


  <?php endif; ?>