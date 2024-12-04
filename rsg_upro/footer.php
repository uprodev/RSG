</main>

<?php 
$queried_object_id = get_queried_object_id();
$field_id = $queried_object_id;
if(is_tax('vacature_cat')) $field_id = 'term_' . $queried_object_id;
$is_on_cta = get_field('on_cta', $field_id);
?>

<footer<?php if($is_on_cta) echo ' class="footer-cta"' ?>>

  <?php if ($is_on_cta): ?>

    <?php 
    $is_default = get_field('default_custom_cta', $field_id) == 'Default';

    $is_default_select = $is_default && get_field('select_or_custom_fc', 'option') == 'Select';
    $is_default_custom = $is_default && get_field('select_or_custom_fc', 'option') == 'Custom';
    $is_custom_select = !$is_default && get_field('select_or_custom_contactperson_cta') == 'Select';
    $is_custom_custom = !$is_default && get_field('select_or_custom_contactperson_cta') == 'Custom';

    $option_select = get_field('select_fc', 'option');
    $post_select = get_field('select_cta', $field_id);

    $fields = ['title', 'text', 'form'];
    foreach ($fields as $field) {
      $$field = $is_default ? get_field($field . '_fc', 'option') : get_field($field . '_cta', $field_id);
    }

    if ($is_default_select || $is_custom_select) {
      $image_html = get_the_post_thumbnail($is_default_select ? $option_select : $post_select, 'full');
      $name = get_the_title($is_default_select ? $option_select : $post_select);
      $function = get_field('function', $is_default_select ? $option_select : $post_select);
    }
    if ($is_default_custom || $is_custom_custom) {
      $fields = ['image', 'name', 'function'];
      foreach ($fields as $field) {
        $$field = $is_default_custom ? get_field($field . '_fc', 'option') : get_field($field . '_cta', $field_id);
      }
      $image_html = wp_get_attachment_image($image['ID'], 'full');
    }

    ?>

    <div class="container">
      <div class="row">
        <div class="cta-block-wrap">
          <div class="cta-block p-0 d-flex justify-content-between flex-wrap bg-lightblue">
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

              <?php if ($text): ?>
                <p><?= $text ?></p>
              <?php endif ?>

              <?php if ($form): ?>
                <?= do_shortcode('[contact-form-7 id="' . $form . '" html_class="form-cta"]') ?>
              <?php endif ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>

  <div class="container">
    <div class="row">

      <?php if (($field = get_field('contact_info_f', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
      <div class="info col-lg-4 col-12">

        <?php if ($field['logo']): ?>
          <div class="logo-wrap">
            <a href="<?= get_home_url() ?>">
              <?= wp_get_attachment_image($field['logo']['ID'], 'full') ?>
            </a>
          </div>
        <?php endif ?>
        
        <?php if ($field['text']): ?>
          <div class="text"><?= $field['text'] ?></div>
        <?php endif ?>
        
        <?php if (is_array($field['links']) && checkArrayForValues($field['links'])): ?>
        <ul class="contact-list">

          <?php foreach ($field['links'] as $item): ?>
            <?php if ($item['icon'] && $item['link']): ?>
              <li>
                <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>
                  <i class="<?= $item['icon'] ?>"></i>
                  <?= html_entity_decode($item['link']['title']) ?>
                </a>
              </li>
            <?php endif ?>
          <?php endforeach ?>

        </ul>
      <?php endif ?>

      <?php if (is_array($field['socials']) && checkArrayForValues($field['socials'])): ?>
      <ul class="soc-list">

        <?php if ($field['socials_text']): ?>
          <li><?= $field['socials_text'] ?></li>
        <?php endif ?>

        <?php foreach ($field['socials'] as $item): ?>
          <?php if ($item['icon'] && $item['link']): ?>
            <li>
              <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>
                <i class="<?= $item['icon'] ?>"></i>
              </a>
            </li>
          <?php endif ?>
        <?php endforeach ?>

      </ul>
    <?php endif ?>

  </div>
<?php endif ?>

<nav class="footer-menu col-lg-8 col-12 d-flex flex-wrap justify-content-lg-end justify-content-between">

  <?php for ($i = 2; $i <= 4; $i++) { ?>

    <?php if (($field = get_field('footer_column_' . $i . '_f', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
    <div class="item">

      <?php if ($field['title_and_link']): ?>
        <h6>
          <a href="<?= $field['title_and_link']['url'] ?>"<?php if($field['title_and_link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($field['title_and_link']['title']) ?> <span></span></a>
        </h6>
      <?php endif ?>

      <?php if (is_array($field['links']) && checkArrayForValues($field['links'])): ?>
      <ul>

        <?php foreach ($field['links'] as $item): ?>
          <?php if ($item['link']): ?>
            <li>
              <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>
                <?= html_entity_decode($item['link']['title']) ?>
              </a>
            </li>
          <?php endif ?>
        <?php endforeach ?>

      </ul>
    <?php endif ?>

  </div>
<?php endif ?>

<?php } ?>

</nav>
<div class="bottom w-100 d-flex flex-wrap justify-content-lg-between align-items-center justify-content-center">

  <?php if ($field = get_field('text_fb', 'option')): ?>
    <div class="bottom-left">
      <p><?= $field ?></p>
    </div>
  <?php endif ?>
  
  <?php if (($field = get_field('links_fb', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
  <div class="bottom-right">
    <ul class="d-flex flex-wrap justify-content-md-end justify-content-center">

      <?php foreach ($field as $item): ?>
        <?php if ($item['link']): ?>
          <li>
            <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>
              <?= html_entity_decode($item['link']['title']) ?>
            </a>
          </li>
        <?php endif ?>
      <?php endforeach ?>

      <li>Website door  <a href="#">The DISTRIKT</a></li>
    </ul>
  </div>
<?php endif ?>

</div>
</div>
</div>
</footer>



<div class="fix-block">
  <div class="fix-content">

    <?php if ($field = get_field('image_cta', 'option')): ?>
      <figure>
        <?= wp_get_attachment_image($field['ID'], 'full') ?>
      </figure>
    <?php endif ?>
    
    <div class="text">
      <a href="#" class="close-fix"><i class="fa-light fa-xmark"></i></a>

      <?php if ($field = get_field('title_cta', 'option')): ?>
        <h6><?= $field ?></h6>
      <?php endif ?>

      <?php if ($field = get_field('link_cta', 'option')): ?>
        <div class="btn-wrap">
          <a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= html_entity_decode($field['title']) ?></a>
        <?php endif ?>

      </div>
    </div>
  </div>
</div>

<?php wp_footer() ?>
</body>
</html>