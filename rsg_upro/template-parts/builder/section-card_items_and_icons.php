<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="card-icon-block<?php if($background_color == 'White') echo ' bg-white' ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="container">
        <div class="row">
          <div class="title-wrap text-center col-12 col-lg-7">

            <?php if ($subtitle): ?>
              <h6 class="label"><?= $subtitle ?></h6>
            <?php endif ?>
            
            <?php if ($title): ?>
              <h2><?= $title ?></h2>
            <?php endif ?>
            
            <?= $text ?>

          </div>

          <?php if (is_array($cards) && checkArrayForValues($cards)): ?>
          <div class="content d-flex flex-wrap justify-content-center text-center ">

            <?php foreach ($cards as $item): ?>
              <div class="item">

                <?php if ($item['icon']): ?>
                  <div class="icon-wrap">
                    <i class="<?= $item['icon'] ?>"></i>
                  </div>
                <?php endif ?>
                
                <?php if ($item['title']): ?>
                  <h6><?= $item['title'] ?></h6>
                <?php endif ?>

                <?= $item['text'] ?>

              </div>
            <?php endforeach ?>
            
          </div>
        <?php endif ?>

        <?php if ($button): ?>
          <div class="btn-wrap d-flex justify-content-center">
            <a href="<?= $button['url'] ?>" class="btn-default btn-big"<?php if($button['target']) echo ' target="_blank"' ?>><?= html_entity_decode($button['title']) ?></a>
          </div>
        <?php endif ?>
        
      </div>
    </div>
  </section>

  <?php if ($args['index'] == 0): ?>
  </div>
<?php endif ?>

<?php endif; ?>