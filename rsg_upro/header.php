<!doctype html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header<?php if(is_404() || is_singular(['nieuws', 'vacature'])) echo ' class="header-blue"' ?>>
    <div class="top-line">
      <div class="container">
        <div class="row justify-content-between">

          <?php if (($logo_1 = get_field('logo_white_h', 'option')) || get_field('logo_white_h', 'option')): ?>
          <div class="logo-wrap ">
            <a href="<?= get_home_url() ?>">
              <?= wp_get_attachment_image($logo_1['ID'], 'full') ?>

              <?php if ($logo_2 = get_field('logo_primary_color_h', 'option')): ?>
                <span>
                  <?= wp_get_attachment_image($logo_2['ID'], 'full') ?>
                </span>
              <?php endif ?>

            </a>
          </div>
        <?php endif ?>

        <nav class="top-menu d-flex justify-content-end align-items-center">

          <?php wp_nav_menu( array(
            'theme_location'  => 'header',
            'container'       => '',
            'items_wrap'      => '<ul class="d-flex align-items-center">%3$s</ul>'
          )); ?>

          <?php if (get_field('ghost_menu_button__h', 'option') || get_field('primary_menu_button_h', 'option')): ?>
          <div class="btn-wrap d-flex">

            <?php if ($field = get_field('ghost_menu_button__h', 'option')): ?>
              <a href="<?= $field['url'] ?>" class="btn-default btn-border"<?php if($field['target']) echo ' target="_blank"' ?>><?= html_entity_decode($field['title']) ?></a>
            <?php endif ?>

            <?php if ($field = get_field('primary_menu_button_h', 'option')): ?>
              <a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= html_entity_decode($field['title']) ?></a>
            <?php endif ?>

          </div>
        <?php endif ?>

        <div class="open-menu d-flex justify-content-end d-xl-none">
          <a href="#">
            <span></span>
            <span></span>
            <span></span>
          </a>
        </div>
      </nav>

    </div>
  </div>
</div>
</header>

<div class="menu-responsive" id="menu-responsive" style="display: none">
  <div class="top">
    <div class="close-menu">
      <a href="#"><i class="fal fa-times"></i></a>
    </div>
  </div>
  <div class="wrap">

    <?php if ($field = get_field('logo_primary_color_h', 'option')): ?>
      <div class="logo-wrap">
        <a href="<?= get_home_url() ?>">
          <?= wp_get_attachment_image($field['ID'], 'full') ?>
        </a>
      </div>
    <?php endif ?>
    
    <nav class="mob-menu-wrap">

      <?php wp_nav_menu( array(
        'theme_location'  => 'header',
        'container'       => '',
        'items_wrap'      => '<ul class="mob-menu p-0">%3$s</ul>'
      )); ?>


      <?php if (get_field('ghost_menu_button__h', 'option') || get_field('primary_menu_button_h', 'option')): ?>
      <div class="btn-wrap">

        <?php if ($field = get_field('ghost_menu_button__h', 'option')): ?>
          <a href="<?= $field['url'] ?>" class="btn-default btn-border btn-border-dark"<?php if($field['target']) echo ' target="_blank"' ?>><?= html_entity_decode($field['title']) ?></a>
        <?php endif ?>

        <?php if ($field = get_field('primary_menu_button_h', 'option')): ?>
          <a href="<?= $field['url'] ?>" class="btn-default"<?php if($field['target']) echo ' target="_blank"' ?>><?= html_entity_decode($field['title']) ?></a>
        <?php endif ?>

      </div>
    <?php endif ?>

  </nav>
</div>
</div>

<main>