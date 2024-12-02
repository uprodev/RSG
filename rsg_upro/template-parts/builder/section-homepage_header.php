<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="home-banner"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="bg"></div>
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="text">

            <?php if ($subtitle): ?>
              <h6 class="label"><?= $subtitle ?></h6>
            <?php endif ?>

            <?php if ($title): ?>
              <h1><?= $title ?></h1>
            <?php endif ?>

            <?= $text ?>

            <?php if ($primary_button || $secondary_link): ?>
              <div class="btn-wrap d-flex align-items-center">

                <?php if ($primary_button): ?>
                  <a href="<?= $primary_button['url'] ?>" class="btn-default btn-big"<?php if($primary_button['target']) echo ' target="_blank"' ?>><?= html_entity_decode($primary_button['title']) ?></a>
                <?php endif ?>

                <?php if ($secondary_link): ?>
                  <a href="<?= $secondary_link['url'] ?>" class="link"<?php if($secondary_link['target']) echo ' target="_blank"' ?>><?= html_entity_decode($secondary_link['title']) ?></a>
                <?php endif ?>

              </div>
            <?php endif ?>

          </div>
          <figure class="d-flex justify-content-center flex-wrap">

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

          <?php if ($is_show_cards && is_array($cards) && checkArrayForValues($cards)): ?>
          <div class="bottom d-flex justify-content-between flex-wrap w-100">

            <?php foreach ($cards as $index => $item): ?>
              <div class="item item-<?= $index + 1 ?>">

                <?php if ($item['icon']): ?>
                  <div class="icon-wrap">
                    <i class="<?= $item['icon'] ?>"></i>
                  </div>
                <?php endif ?>

                <div class="info">

                  <?php if ($item['title']): ?>
                    <h3 class="title"><?= $item['title'] ?></h3>
                  <?php endif ?>

                  <?php if ($item['text']): ?>
                    <p><?= $item['text'] ?></p>
                  <?php endif ?>

                </div>

                <?php if (is_array($item['links']) && checkArrayForValues($item['links'])): ?>
                <ul>

                  <?php foreach ($item['links'] as $item_2): ?>
                    <?php if ($item_2['link']): ?>
                      <li>
                        <a href="<?= $item_2['link']['url'] ?>"<?php if($item_2['link']['target']) echo ' target="_blank"' ?>>
                          <i class="fa-regular fa-chevron-right"></i>
                          <?= html_entity_decode($item_2['link']['title']) ?>
                        </a>
                      </li>
                    <?php endif ?>
                  <?php endforeach ?>

                </ul>
              <?php endif ?>

            </div>
          <?php endforeach ?>

        </div>
      <?php endif ?>

    </div>
  </div>
</section>

<?php if ($args['index'] == 0): ?>
</div>
<?php endif ?>

<?php endif; ?>