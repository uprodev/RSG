<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="services-banner full-img bg-lightblue"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="bg"></div>
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="text col-12 col-lg-6">

            <?php if ($tag || $post_date): ?>
              <ul class="list-label d-flex flex-wrap align-items-center">

                <?php if ($tag): ?>
                  <li><p class="bg-label"><?= $tag ?></p></li>
                <?php endif ?>
                
                <?php if ($post_date): ?>
                  <li><p class="date"><?= $post_date ?></p></li>
                <?php endif ?>
                
              </ul>
            <?php endif ?>

            <?php if ($title): ?>
              <h1><?= $title ?></h1>
            <?php endif ?>

            <?= $text ?>

            <?php if ($button || $secondary_link): ?>
              <div class="btn-wrap d-flex align-items-center">

                <?php if ($button): ?>
                  <a href="<?= $button['url'] ?>" class="btn-default btn-big"<?php if($button['target']) echo ' target="_blank"' ?>><?= html_entity_decode($button['title']) ?></a>
                <?php endif ?>

                <?php if ($secondary_link): ?>
                  <a href="<?= $secondary_link['url'] ?>" class="link link-orange"<?php if($secondary_link['target']) echo ' target="_blank"' ?>><?= html_entity_decode($secondary_link['title']) ?></a>
                <?php endif ?>

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

      <?php if ($anchor_link): ?>
        <div class="btn-scroll link-down">
          <a href="<?= $anchor_link['url'] ?>" class="scroll"<?php if($anchor_link['target']) echo ' target="_blank"' ?>>
            <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-m-1.svg" alt="">
            <span><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-m-2.svg" alt=""></span>
          </a>
        </div>
      <?php endif ?>

    </section>

    <?php if ($args['index'] == 0): ?>
    </div>
  <?php endif ?>

  <?php endif; ?>