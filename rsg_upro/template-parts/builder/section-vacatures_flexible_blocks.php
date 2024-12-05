<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if ($args['index'] == 0): ?>
    <div class="wrap-hidden">
    <?php endif ?>

    <section class="text-default text-default-aside"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="container">
        <div class="row">
          <div class="content w-100 d-block m-0">
            <div class="left">

              <?php 
              foreach ($content as $item):
                if($item['acf_fc_layout'] != 'sticky_block'):

                  switch ($item['acf_fc_layout']) {

                    case 'text_block':
                    ?>

                    <div class="<?php if(!$item['spacing_top']) echo ' mt-0'; if(!$item['spacing_bottom']) echo ' mb-0'; ?>">

                      <?php if ($item['subtitle']): ?>
                        <h4><?= $item['subtitle'] ?></h4>
                      <?php endif ?>

                      <?php if ($item['title']): ?>
                        <<?= $title_h2_h3 ?>><?= $item['title'] ?></<?= $title_h2_h3 ?>>
                      <?php endif ?>

                      <?= $item['text'] ?>

                    </div>

                    <?php 
                    break;

                    case 'image_block':
                    ?>

                    <?php if (is_array($item['images']) && checkArrayForValues($item['images'])): ?>
                    <div class="slier-wrap<?php if(!$item['spacing_top']) echo ' mt-0'; if(!$item['spacing_bottom']) echo ' mb-0'; ?>">
                      <div class="swiper img-full-slider">
                        <div class="swiper-wrapper">

                          <?php foreach ($item['images'] as $item_2): ?>
                            <?php if ($item_2['image']): ?>
                              <div class="swiper-slide">
                                <?= wp_get_attachment_image($item_2['image']['ID'], 'full') ?>

                                <?php if ($item_2['description']): ?>
                                  <p class="line"><?= $item_2['description'] ?></p>
                                <?php endif ?>

                              </div>
                            <?php endif ?>
                          <?php endforeach ?>

                        </div>

                        <?php if (count($item['images']) > 1): ?>
                          <div class="nav-wrap d-flex justify-content-between">
                            <div class="swiper-button-next img-full-next"><i class="fa-solid fa-arrow-right"></i></div>
                            <div class="swiper-button-prev img-full-prev"><i class="fa-solid fa-arrow-left"></i></div>
                          </div>
                        <?php endif ?>

                      </div>
                    </div>
                  <?php endif ?>

                  <?php 
                  break;

                  case 'quote_block':
                  ?>

                  <div class="quote-block d-flex flex-wrap justify-content-between<?php if(!$item['spacing_top']) echo ' mt-0'; if(!$item['spacing_bottom']) echo ' mb-0'; ?>">

                    <?php if ($item['image']): ?>
                      <figure>
                        <?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
                      </figure>
                    <?php endif ?>

                    <div class="icon-wrap">
                      <i class="fa-solid fa-quote-left"></i>
                    </div>
                    <div class="text">

                      <?php if ($item['description']): ?>
                        <div class="quote"><?= $item['description'] ?></div>
                      <?php endif ?>

                      <?php if ($item['name']): ?>
                        <p><?= $item['name'] ?></p>
                      <?php endif ?>

                    </div>
                  </div>

                  <?php 
                  break;

                  case 'social_share_icons':
                  ?>

                  <?php if (($items = get_field('socials_ss', 'option')) && is_array($items) && checkArrayForValues($items)): ?>
                  <div class="bottom-link d-flex flex-wrap justify-content-between align-items-center">

                    <?php if ($field = get_field('back_to_previous_page_text_ss', 'option')): ?>
                      <div class="link-wrap">
                        <a href="#" onclick="window.history.back();"><i class="fa-regular fa-arrow-left"></i><?= $field ?></a>
                      </div>
                    <?php endif ?>

                    <ul class="soc-list d-flex align-items-center">

                      <?php if ($field = get_field('social_text_before_icons_ss', 'option')): ?>
                        <li><p><?= $field ?></p></li>
                      <?php endif ?>

                      <?php foreach ($items as $item_2): ?>
                        <?php if ($item_2['icon'] && $item_2['link']): ?>

                          <?php 
                          $add_link_url = '';
                          if($item_2['is_share']) $add_link_url = get_permalink();
                          if(str_contains($item_2['link']['url'], '//x.com')) $add_link_url = get_the_title() . '&url=' . get_permalink() . '&via=RSG';
                          ?>

                          <li>
                            <a href="<?= $item_2['link']['url'] . $add_link_url ?>"<?php if($item_2['link']['target']) echo ' target="_blank"' ?>>
                              <i class="<?= $item_2['icon'] ?>"></i>
                            </a>
                          </li>
                        <?php endif ?>
                      <?php endforeach ?>

                    </ul>
                  </div>
                <?php endif ?>

                <?php 
                break;

                case 'small_form_block':
                ?>

                <?php 
                $fields = ['image', 'title', 'text', 'form', 'form_text'];

                foreach ($fields as $field) {
                  $$field = $item['default_custom'] == 'Default' ? get_field($field . '_fb2', 'option') : $item[$field];
                }
                ?>

                <div class="download-block">
                  <div class="bg">
                    <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-7.svg" alt="">
                  </div>
                  <div class="wrap d-flex flex-wrap justify-content-between">

                    <?php if ($image): ?>
                      <div class="img-wrap">
                        <?= wp_get_attachment_image($image['ID'], 'full') ?>
                      </div>
                    <?php endif ?>

                    <div class="form-wrap-1">

                      <?php if ($title): ?>
                        <h3><?= $title ?></h3>
                      <?php endif ?>

                      <?= $text ?>

                      <?php if ($form): ?>
                        <?= do_shortcode('[contact-form-7 id="' . $form . '" html_class="default-form"]') ?>
                      <?php endif ?>

                      <?php if ($form_text): ?>
                        <div class="text-form"><?= $form_text ?></div>
                      <?php endif ?>

                    </div>
                  </div>
                </div>

                <?php 
                break;

                case 'form_block':
                ?>

                <div class="form-wrap<?php if(!$item['spacing_top']) echo ' mt-0'; if(!$item['spacing_bottom']) echo ' mb-0'; ?>">

                  <?php if ($item['subtitle']): ?>
                    <h6 class="label"><?= $item['subtitle'] ?></h6>
                  <?php endif ?>

                  <?php if ($item['title']): ?>
                    <<?= $item['title_h2_h3'] ?>><?= $item['title'] ?></<?= $item['title_h2_h3'] ?>>
                  <?php endif ?>

                  <?= $item['text'] ?>

                  <?php if ($item['form']): ?>
                    <?= do_shortcode('[contact-form-7 id="' . $item['form'] . '" html_class="default-form"]') ?>
                  <?php endif ?>

                  <?php if ($item['form_text']): ?>
                    <div class="text-form"><?= $item['form_text'] ?></div>
                  <?php endif ?>

                </div>

                <?php 
                break;


                default:
                break;

              }

            endif;
          endforeach; 
          ?>         

        </div>

        <?php 
        foreach ($content as $item):
          if($item['acf_fc_layout'] == 'sticky_block'):
            ?> 

          <?php 
          $is_default = $item['default_custom'] == 'Default';
          $is_default_and_select = $item['default_custom'] == 'Default' && get_field('select_or_custom_contact_sc2', 'option') == 'Select';
          $is_default_and_custom = $item['default_custom'] == 'Default' && get_field('select_or_custom_contact_sc2', 'option') == 'Custom';
          $is_custom_and_select = $item['default_custom'] == 'Custom' && $item['select_or_custom_contact'] == 'Select';
          $is_custom_and_custom = $item['default_custom'] == 'Custom' && $item['select_or_custom_contact'] == 'Custom';

          $fields = ['title', 'text', 'button'];
          foreach ($fields as $field) {
            $$field = $is_default ? get_field($field . '_sc2', 'option') : $item[$field];
          }
          $contact_person = $is_default ? get_field('select_sc2', 'option') : $item['select'];

          $contact_person_fields = ['phone', 'email', 'function'];
          foreach ($contact_person_fields as $field) {
            $$field = ($is_default_and_custom || $is_custom_and_custom) ? ($is_default_and_custom ? get_field($field . '_sc2', 'option') : $item[$field]) : get_field($field, $contact_person);
          }
          $name = ($is_default_and_custom || $is_custom_and_custom) ? ($is_default_and_custom ? get_field('name_sc2', 'option') : $item['name']) : get_the_title($contact_person);
          $image_html = ($is_default_and_custom || $is_custom_and_custom) ? wp_get_attachment_image($is_default_and_custom ? get_field('image_sc2', 'option')['ID'] : $item['image']['ID'], 'full') : get_the_post_thumbnail($contact_person, 'full');
          ?>

          <div class="aside">
            <div class="wrap-aside">

              <?php if ($title): ?>
                <h4><?= $title ?></h4>
              <?php endif ?>

              <?= $text ?>

              <?php if ($phone || $email): ?>
                <ul class="contact-list">

                  <?php if ($phone): ?>
                    <li><a href="tel:+<?= preg_replace('/[^0-9]/', '', $phone) ?>"><i class="fa-regular fa-phone"></i><?= $phone ?></a></li>
                  <?php endif ?>
                  
                  <?php if ($email): ?>
                    <li><a href="mailto:<?= $email ?>"><i class="fa-regular fa-envelope"></i><?= $email ?></a></li>
                  <?php endif ?>
                  
                </ul>
              <?php endif ?>

              <?php if ($button): ?>
                <div class="btn-wrap d-flex align-items-center w-100">
                  <a href="<?= $button['url'] ?>" class="btn-default btn-big w-100"<?php if($button['target']) echo ' target="_blank"' ?>><?= html_entity_decode($button['title']) ?></a>
                </div>
              <?php endif ?>

              <div class="img-wrap">

                <?php if ($image_html): ?>
                  <figure class="p-0"><?= $image_html ?></figure>
                <?php endif ?>

                <?php if ($name || $function): ?>
                  <div class="name-block">

                    <?php if ($name): ?>
                      <h6><?= $name ?></h6>
                    <?php endif ?>

                    <?php if ($function): ?>
                      <p><?= $function ?></p>
                    <?php endif ?>

                  </div>
                <?php endif ?>

              </div>
            </div>
          </div>  

          <?php 
        endif;
      endforeach; 
      ?> 

    </div>
  </div>
</div>
</section>

<?php if ($args['index'] == 0): ?>
</div>
<?php endif ?>

<?php endif; ?>