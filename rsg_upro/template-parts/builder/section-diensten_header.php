<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="services-banner<?php if($image_type == 'Transparent background image') echo ' figure-bg' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
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

            <?php if ($button || $secondary_link): ?>
              <div class="btn-wrap d-flex align-items-center">

                <?php if ($button): ?>
                  <a href="<?= $button['url'] ?>" class="btn-default btn-big"<?php if($button['target']) echo ' target="_blank"' ?>><?= html_entity_decode($button['title']) ?></a>
                <?php endif ?>

                <?php if ($secondary_link): ?>
                  <a href="<?= $secondary_link['url'] ?>" class="link"<?php if($secondary_link['target']) echo ' target="_blank"' ?>><?= html_entity_decode($secondary_link['title']) ?></a>
                <?php endif ?>

              </div>
            <?php endif ?>

          </div>
          <figure class="col-12 col-lg-6">

            <?php if ($image): ?>
              <div class="img img-1">
                <picture><source srcset="<?= $image['url'] ?>" media="(min-width: 992px)"><source srcset="<?= $image['url'] ?>">
                  <?= wp_get_attachment_image($image['ID'], 'full') ?>
                </picture>
              </div>
            <?php endif ?>

            <?php if ($is_quicklinks): ?>
              <div class="quick-links">

                <?php if ($quicklinks_title): ?>
                  <h6><?= $quicklinks_title ?></h6>
                <?php endif ?>

                <?php if (is_array($quicklinks) && checkArrayForValues($quicklinks)): ?>
                <ul class="m-0">

                  <?php foreach ($quicklinks as $item): ?>
                    <?php if ($item['link']): ?>
                      <li>
                        <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>
                          <i class="fa-regular fa-arrow-right"></i>
                          <?= html_entity_decode($item['link']['title']) ?>
                        </a>
                      </li>
                    <?php endif ?>
                  <?php endforeach ?>

                </ul>
              <?php endif ?>
              
            </div>
          <?php endif ?>

        </figure>
      </div>
    </div>

    <?php if ($is_scroll_link && $scroll_link): ?>
      <div class="btn-scroll link-down">
        <a href="<?= $scroll_link['url'] ?>" class="scroll"<?php if($scroll_link['target']) echo ' target="_blank"' ?>>

          <?php if ($icon_scroll_link): ?>
            <?= wp_get_attachment_image($icon_scroll_link['ID'], 'full') ?>
            <span><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1-2.svg" alt=""></span>
            <span><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1-2.svg" alt=""></span>
          <?php endif ?>
          
        </a>
      </div>
    <?php endif ?>
    
  </section>

  <?php if ($args['index'] == 0): ?>
  </div>
<?php endif ?>

<?php endif; ?>