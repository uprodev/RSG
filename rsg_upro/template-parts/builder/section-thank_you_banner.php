<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="block-404 align-items-center d-flex"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="container">
        <div class="row ">
          <div class="bg">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-8.svg" alt="" class="img img-1">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-9.svg" alt="" class="img img-2">
          </div>
          <div class="content text-center">

            <?php if ($subtitle): ?>
              <h6 class="label"><?= $subtitle ?></h6>
            <?php endif ?>
            
            <?php if ($title): ?>
              <h1><?= $title ?></h1>
            <?php endif ?>
            
            <?= $text ?>

            <?php if ($button): ?>
              <div class="btn-wrap d-flex justify-content-center">
                <a href="<?= $button['url'] ?>" class="btn-default btn-big"<?php if($button['target']) echo ' target="_blank"' ?>><?= html_entity_decode($button['title']) ?></a>
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