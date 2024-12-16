<?php 
$categories = wp_get_object_terms(get_the_ID(), 'vacature_cat');

$image_html = isset($args['image']) ? wp_get_attachment_image($args['image']['ID'], 'full') : get_the_post_thumbnail(null, 'full');
$label = isset($args['label']) ? $args['label'] : (is_array($categories) ? $categories[0]->name : '');
$title = isset($args['title']) ? $args['title'] : get_the_title();
$text = isset($args['text']) ? $args['text'] : apply_filters('the_content', get_the_content());
$link_url = isset($args['is_custom']) && $args['is_custom'] ? ($args['link'] ? $args['link']['url'] : '') : get_the_permalink();
$link_title = isset($args['link']) && $args['link'] ? $args['link']['title'] : __('Ontdek de case', 'RSG');
$link_target = isset($args['link']) && $args['link'] && $args['link']['target'] ? ' target="_blank"' : '';
?>

<div class="<?= isset($args['is_slider']) && $args['is_slider'] ? 'swiper-slide' : 'item' ?>">

  <?php if ($image_html): ?>
    <figure>
      <?= $image_html ?>
    </figure>
  <?php endif ?>
  
  <?php if ($subtitle): ?>
    <h6 class="label"><?= $subtitle ?></h6>
  <?php endif ?>

  <?php if ($title): ?>
    <h3><?= $title ?></h3>
  <?php endif ?>
  
  <?= $text ?>

  <?php if ($link_url): ?>
    <div class="btn-wrap">
      <a href="<?= $link_url ?>" class="btn-default btn-big"<?= $link_target ?>><?= $link_title ?></a>
    </div>
  <?php endif ?>
  
</div>