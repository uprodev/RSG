<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="home-banner contact-banner"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="bg"></div>
      <div class="container">
        <div class="row justify-content-between ">
          <div class="text col-12 col-lg-5">

            <?php if ($subtitle): ?>
              <h6 class="label"><?= $subtitle ?></h6>
            <?php endif ?>

            <?php if ($title): ?>
              <h1><?= $title ?></h1>
            <?php endif ?>

            <?= $text ?>

            <?php if (is_array($contact_info) && checkArrayForValues($contact_info)): ?>
            <ul class="list-contact">

              <?php foreach ($contact_info as $item): ?>
                <?php if ($item['link'] || $item['text']): ?>
                  <li>

                    <?php if ($item['link']): ?>
                      <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>
                      <?php endif ?>

                      <?php if ($item['icon']): ?>
                        <i class="<?= $item['icon'] ?>"></i>
                      <?php endif ?>

                      <?php if ($item['link']): ?>
                        <?= html_entity_decode($item['link']['title']) ?>
                      </a>
                    <?php endif ?>

                    <?= $item['text'] ?>

                  </li>
                <?php endif ?>
              <?php endforeach ?>

            </ul>
          <?php endif ?>

          <?php if ($text_after_contact_info): ?>
            <?= add_class_content($text_after_contact_info, '', '', 'list-info') ?>
          <?php endif ?>

        </div>

        <?php if (is_array($right_column) && checkArrayForValues($right_column)): ?>
        <div class="right col-12 col-lg-7">
          <div class="wrap-bg">
            <div class="top">

              <?php if ($right_column['image']): ?>
                <div class="img-wrap">
                  <?= wp_get_attachment_image($right_column['image']['ID'], 'full') ?>
                </div>
              <?php endif ?>
              
              <?php if ($right_column['title']): ?>
                <div class="top-info">
                  <h3><?= $right_column['title'] ?></h3>
                </div>
              <?php endif ?>
              
            </div>

            <?php if ($right_column['form']): ?>
              <div class="form-wrap">
                <?= do_shortcode('[contact-form-7 id="' . $right_column['form'] . '" html_class="default-form"]') ?>

                <?php if ($right_column['form_text']): ?>
                  <div class="text-form"><?= $right_column['form_text'] ?></div>
                <?php endif ?>

              </div>
            <?php endif ?>

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