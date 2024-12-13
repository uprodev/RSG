<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <?php 
    switch ($image_size) {
      case 'Large':
      $image_size_class = ' img-w-550';
      break;
      case 'Full':
      $image_size_class = ' full-img';
      break;
      
      default:
      $image_size_class = '';
      break;
    }
    ?>

    <section class="services-banner<?php if($image_type == 'Transparent background image') echo ' figure-bg'; if($image_background == 'Lightblue') echo ' figure-bg-blue'; if($is_clients_banner) echo ' client-banner'; if($background_color == 'Lightblue') echo ' bg-lightblue' ; echo $image_size_class ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
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

            <?php if ($hours || $location): ?>
              <ul class="list-icon">

                <?php if ($hours): ?>
                  <li>
                    <i class="fa-regular fa-clock"></i>
                    <?= $hours ?>
                  </li>
                <?php endif ?>
                
                <?php if ($location): ?>
                  <li>
                    <i class="fa-regular fa-location-dot"></i>
                    <?= $location ?>
                  </li>
                <?php endif ?>
                
              </ul>
            <?php endif ?>

            <?php if ($button || $secondary_link): ?>
              <div class="btn-wrap d-flex align-items-center">

                <?php if ($button): ?>
                  <a href="<?= $button['url'] ?>" class="btn-default btn-big"<?php if($button['target']) echo ' target="_blank"' ?>>
                    <?= html_entity_decode($button['title']) ?>

                    <?php if ($button_icon): ?>
                      <i class="<?= $button_icon ?>"></i>
                    <?php endif ?>
                    
                  </a>
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