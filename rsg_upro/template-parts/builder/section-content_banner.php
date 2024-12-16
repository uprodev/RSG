<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="text-img text-img-4x"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="container">
        <div class="row align-items-center">
          <div class="text col-12 col-lg-6">

            <?php if ($subtitle): ?>
              <h6 class="label"><?= $subtitle ?></h6>
            <?php endif ?>

            <?php if ($title): ?>
              <h2><?= $title ?></h2>
            <?php endif ?>

            <?= $text ?>

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
          <figure class="d-flex justify-content-center flex-wrap img-4x col-12 col-lg-6">

            <?php if ($top_left_image): ?>
              <div class="img img-1">
                <picture><source srcset="<?= $top_left_image['url'] ?>" media="(min-width: 992px)"><source srcset="<?= $top_left_image['url'] ?>">
                  <?= wp_get_attachment_image($top_left_image['ID'], 'full') ?>
                </picture>
              </div>
            <?php endif ?>

            <?php if ($top_right_image): ?>
              <div class="img img-2">
                <picture><source srcset="<?= $top_right_image['url'] ?>" media="(min-width: 992px)"><source srcset="<?= $top_right_image['url'] ?>">
                  <?= wp_get_attachment_image($top_right_image['ID'], 'full') ?>
                </picture>
              </div>
            <?php endif ?>

            <?php if ($bottom_left_image): ?>
              <div class="img img-3">
                <picture><source srcset="<?= $bottom_left_image['url'] ?>" media="(min-width: 992px)"><source srcset="<?= $bottom_left_image['url'] ?>">
                  <?= wp_get_attachment_image($bottom_left_image['ID'], 'full') ?>
                </picture>
              </div>
            <?php endif ?>

            <?php if ($bottom_right_image): ?>
              <div class="img img-4">
                <picture><source srcset="<?= $bottom_right_image['url'] ?>" media="(min-width: 992px)"><source srcset="<?= $bottom_right_image['url'] ?>">
                  <?= wp_get_attachment_image($bottom_right_image['ID'], 'full') ?>
                </picture>
              </div>
            <?php endif ?>

            <div class="center">

              <?php if ($middle_icon_or_image == 'Icon' && $icon): ?>
                <i class="<?= $icon ?>"></i>
              <?php endif ?>
              
              <?php if ($middle_icon_or_image == 'Image' && $image): ?>
                <?= wp_get_attachment_image($image['ID'], 'full') ?>
              <?php endif ?>
              
            </div>
          </figure>
        </div>
      </div>
    </section>

    <?php if ($args['index'] == 0): ?>
    </div>
  <?php endif ?>

  <?php endif; ?>