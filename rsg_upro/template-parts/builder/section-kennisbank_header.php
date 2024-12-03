<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php 
  $sections = get_field('content');
  $load_more_button_text = '';
  if (is_array($sections) && !empty($sections)) {
    foreach ($sections as $section) {
      if ($section['acf_fc_layout'] == 'nieuws_overview') {
        $load_more_button_text = $section['load_more_button_text'];
      }
    }
  }
  ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="services-banner full-img knowledge-banner"<?php if($id) echo ' id="' . $id . '"' ?>>
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

            <?php if ($primary_button || $secondary_link): ?>
              <div class="btn-wrap d-flex align-items-center">

                <?php if ($button): ?>
                  <a href="<?= $button['url'] ?>" class="btn-default btn-big"<?php if($button['target']) echo ' target="_blank"' ?>><?= html_entity_decode($button['title']) ?><i class="fa-light fa-computer-mouse-scrollwheel"></i></a>
                <?php endif ?>

                <?php if ($secondary_link): ?>
                  <a href="<?= $secondary_link['url'] ?>" class="link"<?php if($secondary_link['target']) echo ' target="_blank"' ?>><?= html_entity_decode($secondary_link['title']) ?></a>
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

          <div class="bottom-form-block w-100 ">
            <div class="wrap d-flex flex-wrap justify-content-between ">
              <div class="filter-block col-12 col-lg-6">

                <?php if ($left_block_title): ?>
                  <h6><?= $left_block_title ?></h6>
                <?php endif ?>

                <form action="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); ?>" method="GET" id="filter_kennisbank" class="d-flex flex-wrap form-filter">

                  <?php $post_type = 'case' ?>

                  <div class="input-wrap">
                    <input type="checkbox" name="post_type" id="check-<?= $post_type ?>" value="<?= $post_type ?>">
                    <label for="check-<?= $post_type ?>"><?php _e('Referenties', 'RSG') ?></label>
                  </div>

                  <?php 
                  $taxonomy = 'nieuws_cat';
                  $terms = get_terms( [
                    'taxonomy' => $taxonomy,
                    'hide_empty' => false,
                  ] ); 
                  ?>

                  <?php if (is_array($terms) && !empty($terms)): ?>
                  <?php foreach ($terms as $term): ?>
                    <div class="input-wrap">
                      <input type="checkbox" name="category[]" id="check-<?= $term->slug ?>" value="<?= $term->term_id ?>">
                      <label for="check-<?= $term->slug ?>"><?= $term->name ?></label>
                    </div>
                  <?php endforeach ?>
                <?php endif ?>

                <input type="hidden" name="load_more_button_text" value="<?= $load_more_button_text ?>">
                <input type="hidden" name="action" value="filter_kennisbank">
              </form>
            </div>
            <div class="search-block col-12 col-lg-6">

              <?php if ($right_block_title): ?>
                <h6><?= $right_block_title ?></h6>
              <?php endif ?>

              <form role="search" method="get" action="<?php echo home_url( '/' ) ?>" class="d-flex flex-wrap form-search justify-content-between align-items-center">
                <label for="search"></label>
                <input type="search" name="s" id="s" placeholder="<?= $search_placeholder ?>">
                <input type="hidden" name="post_type" value="nieuws,case" />
                <button type="submit" class="btn-default btn-big"><?= $search_button_text ?><i class="fa-regular fa-magnifying-glass"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php if ($args['index'] == 0): ?>
  </div>
<?php endif ?>

<?php endif; ?>