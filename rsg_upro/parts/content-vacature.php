<?php 
$categories = wp_get_object_terms(get_the_ID(), 'vacature_cat');

$image_html = isset($args['image']) ? wp_get_attachment_image($args['image']['ID'], 'full') : get_the_post_thumbnail(null, 'full');
$image_url = isset($args['image']) && $args['image'] ? $args['image']['url'] : get_the_post_thumbnail_url(null, 'full');
$label = isset($args['label']) ? $args['label'] : (is_array($categories) ? $categories[0]->name : '');
$title = isset($args['title']) ? $args['title'] : get_the_title();
$text = isset($args['text']) ? $args['text'] : apply_filters('the_content', get_the_content());
$hours = isset($args['hours']) ? $args['hours'] : get_field('hours');
$location = isset($args['location']) ? $args['location'] : get_field('location');
$link_url = isset($args['is_custom']) && $args['is_custom'] ? ($args['link'] ? $args['link']['url'] : '') : get_the_permalink();
$link_target = isset($args['link']) && $args['link'] && $args['link']['target'] ? ' target="_blank"' : '';
?>

<div class="<?= isset($args['is_slider']) && $args['is_slider'] ? 'swiper-slide' : 'item' ?>">

  <?php if ($image_html): ?>
    <figure>

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
    <?php if ($label): ?>
      <p class="vacancies-label"><?= $label ?></p>
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
    
    <?= $text ?>

    <?php if ($hours || $location): ?>
      <ul>

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

  </div>
</div>