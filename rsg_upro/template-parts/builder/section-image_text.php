<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="text-img<?php if($image_right_left == 'Left') echo ' text-img-revers'; if($background_color == 'Lightblue') echo ' bg-lightblue'; if($is_show_cta_block) echo ' mb-290'; ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="text col-12 col-lg-6">

            <?php if ($subtitle): ?>
              <h6 class="label"><?= $subtitle ?></h6>
            <?php endif ?>

            <?php if ($title): ?>
              <h2><?= $title ?></h2>
            <?php endif ?>

            <?php if ($tabs_or_normal_text == 'Tabs' && is_array($tabs) && checkArrayForValues($tabs)): ?>
            <div class="tabs">
              <ul class="tabs-menu">

                <?php foreach ($tabs as $index => $item): ?>
                  <?php if ($item['tab_title'] && $item['text']): ?>
                    <li<?php if($index == 0) echo ' class="is-active"' ?>><?= $item['tab_title'] ?></li>
                  <?php endif ?>
                <?php endforeach ?>

              </ul>
              <div class="tab-content">

                <?php foreach ($tabs as $index => $item): ?>
                  <?php if ($item['tab_title'] && $item['text']): ?>
                    <div class="tab-item"><?= $item['text'] ?></div>
                  <?php endif ?>
                <?php endforeach ?>

              </div>
            </div>
          <?php endif ?>

          <?php if ($tabs_or_normal_text == 'Text' && $normal_text): ?>
            <?= $normal_text ?>
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
              <img src="<?= get_stylesheet_directory_uri() ?>/img/after.svg" alt="">
            </span>
            <picture class="img"><source srcset="<?= $image['url'] ?>" media="(min-width: 992px)"><source srcset="<?= $image['url'] ?>">
              <?= wp_get_attachment_image($image['ID'], 'full') ?>
            </picture>
          </figure>
        <?php endif ?>
        
        <?php if ($is_show_cta_block): ?>
          <div class="cta-block-wrap">
            <div class="cta-block p-0 d-flex justify-content-between flex-wrap">
              <div class="img-wrap">

                <?php if ($image_cta): ?>
                  <figure class="p-0">
                    <?= wp_get_attachment_image($image_cta['ID'], 'full') ?>
                  </figure>
                <?php endif ?>
                
                <?php if ($name_cta || $function_cta): ?>
                  <div class="name-block">

                    <?php if ($name_cta): ?>
                      <h6><?= $name_cta ?></h6>
                    <?php endif ?>
                    
                    <?php if ($function_cta): ?>
                      <p><?= $function_cta ?></p>
                    <?php endif ?>
                    
                  </div>
                <?php endif ?>
                
              </div>
              <div class="info-cta">
                
                <?php if ($title_cta): ?>
                  <h3 class="title"><?= $title_cta ?></h3>
                <?php endif ?>
                
                <?php if ($text_cta): ?>
                  <p><?= $text_cta ?></p>
                <?php endif ?>
                
                <?php if ($form_cta): ?>
                  <?= do_shortcode('[contact-form-7 id="' . $form_cta . '" html_class="form-cta"]') ?>
                <?php endif ?>

              </div>
            </div>
          </div>
        </div>
      <?php endif ?>
      
    </div>
  </div>
</section>

<?php if ($args['index'] == 0): ?>
</div>
<?php endif ?>

<?php endif; ?>