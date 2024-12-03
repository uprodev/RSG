<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="services-banner full-img knowledge-banner vacancies-banner"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="bg"></div>
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="text col-12 col-lg-6">

            <?php if ($subtitle): ?>
              <h6 class="label"><?= $subtitle ?></h6>
            <?php endif ?>

            <?php if ($title): ?>
              <h1><?= $title ?></h1>
            <?php endif ?>

            <?= $text ?>

            <?php if ($button): ?>
              <div class="btn-wrap d-flex align-items-center">
                <a href="<?= $button['url'] ?>" class="btn-default btn-big"<?php if($button['target']) echo ' target="_blank"' ?>>
                  <?= html_entity_decode($button['title']) ?>

                  <?php if ($button_icon): ?>
                    <i class="<?= $button_icon ?>"></i>
                  <?php endif ?>

                </a>
              </div>
            <?php endif ?>

          </div>

          <?php if ($image): ?>
            <figure class="col-12 col-lg-6">
              <div class="img img-1">
                <picture><source srcset="<?= $image['url'] ?>" media="(min-width: 992px)"><source srcset="<?= $image['url'] ?>">
                  <?= wp_get_attachment_image($image['ID'], 'full') ?>
                </picture>
              </div>
            </figure>
          <?php endif ?>

        </div>
      </div>
    </section>

    <?php if ($args['index'] == 0): ?>
    </div>
  <?php endif ?>

  <?php endif; ?>