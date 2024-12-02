<?php 
$categories = wp_get_object_terms(get_the_ID(), get_post_type() . '_cat');
$tag = isset($args['tag']) ? $args['tag'] : (is_array($categories) ? $categories[0]->name : '');
$image_html = isset($args['image']) ? wp_get_attachment_image($args['image']['ID'], 'full') : get_the_post_thumbnail(null, 'full');
$image_url = isset($args['image']) && $args['image'] ? $args['image']['url'] : get_the_post_thumbnail_url(null, 'full');
$subtitle = isset($args['subtitle']) ? $args['subtitle'] : get_the_date();
$title = isset($args['title']) ? $args['title'] : get_the_title();
$text = isset($args['text']) ? $args['text'] : (has_excerpt() ? get_the_excerpt() : '');
$link_url = isset($args['link']) ? ($args['link'] ? $args['link']['url'] : '') : get_the_permalink();
$link_target = isset($args['link']) && $args['link'] && $args['link']['target'] ? ' target="_blank"' : '';
?>

<div class="<?= isset($args['is_slider']) && $args['is_slider'] ? 'swiper-slide' : 'item' ?>">

  <?php if ($image_html || $tag): ?>
    <figure>

      <?php if ($tag): ?>
        <p class="tag"><?= $tag ?></p>
      <?php endif ?>

      <?php if ($link_url): ?>
        <a href="<?= $link_url ?>"<?= $link_target ?>>
        <?php endif ?>

        <picture class="img"><source srcset="<?= $image_url ?>" media="(min-width: 992px)"><source srcset="<?= $image_url ?>">
          <?= $image_html ?>
        </picture>

        <?php if ($link_url): ?>
        </a>
      <?php endif ?>

    </figure>
  <?php endif ?>

  <div class="text">

    <?php if ($subtitle): ?>
      <p class="date"><?= $subtitle ?></p>
    <?php endif ?>

    <?php if ($title): ?>
      <h6>

        <?php if ($link_url): ?>
          <a href="<?= $link_url ?>"<?= $link_target ?>>
          <?php endif ?>

          <?= $title ?>

          <?php if ($link_url): ?>
          </a>
        <?php endif ?>

      </h6>
    <?php endif ?>

    <?php if ($text): ?>
      <p><?= $text ?></p>
    <?php endif ?>

  </div>
</div>