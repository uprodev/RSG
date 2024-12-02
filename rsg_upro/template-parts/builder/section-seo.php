<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="seo-block"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="container">
        <div class="row">
          <div class="bg">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-3.svg" alt="" class="img-1">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt="" class="img-2">
          </div>
          <div class="content col-12 col-lg-8">

            <?php if ($subtitle): ?>
              <h6 class="label"><?= $subtitle ?></h6>
            <?php endif ?>
            
            <?php if ($title): ?>
              <<?= $title_heading ?>><?= $title ?></<?= $title_heading ?>>
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
        </div>
      </div>
    </section>

    <?php if ($args['index'] == 0): ?>
    </div>
  <?php endif ?>

  <?php endif; ?>