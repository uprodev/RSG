<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="usp-block"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="container">
        <div class="row">
          <div class="text col-12 col-lg-6">

            <?php if ($subtitle): ?>
              <h6 class="label"><?= $subtitle ?></h6>
            <?php endif ?>

            <?php if ($title): ?>
              <h2><?= $title ?></h2>
            <?php endif ?>

            <?= $text ?>

            <?php if (is_array($quicklinks) && checkArrayForValues($quicklinks)): ?>
            <ul>

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

        <?php if (is_array($circle_content) && checkArrayForValues($circle_content)): ?>
        <div class="info col-12 col-lg-6">
          <div class="wrap d-flex flex-wrap">

            <?php $items = ['top_left_content', 'top_right_content', 'bottom_left_content', 'bottom_right_content'] ?>

            <?php foreach ($items as $index => $item): ?>
              <?php if (is_array($circle_content[$item]) && checkArrayForValues($circle_content[$item])): ?>
              <div class="item item-<?php echo $index + 1; if($circle_content[$item]['dark_color']) echo ' color-dark' ?>"<?php if($circle_content[$item]['background_color']) echo ' style="background-color: ' . $circle_content[$item]['background_color'] . ';"' ?>>

                <?php if ($circle_content[$item]['number']): ?>
                  <p class="number"><?= $circle_content[$item]['number'] ?></p>
                <?php endif ?>

                <?php if ($circle_content[$item]['light_text']): ?>
                  <p><?= $circle_content[$item]['light_text'] ?></p>
                <?php endif ?>

                <?php if ($circle_content[$item]['bold_text']): ?>
                  <p class="bold"><?= $circle_content[$item]['bold_text'] ?></p>
                <?php endif ?>

              </div>
            <?php endif ?>
          <?php endforeach ?>
          
          <div class="center">

            <?php if ($circle_content['middle_icon_or_image'] == 'Icon' && $circle_content['icon']): ?>
              <i class="<?= $circle_content['icon'] ?>"></i>
            <?php endif ?>

            <?php if ($circle_content['middle_icon_or_image'] == 'Image' && $circle_content['image']): ?>
              <?= wp_get_attachment_image($circle_content['image']['ID'], 'full') ?>
            <?php endif ?>

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