<?php 

$queried_object_id = get_queried_object_id();
$field_id = $queried_object_id;
if(is_tax('vacature_cat')) $field_id = 'term_' . $queried_object_id;
if(get_field('content', $field_id))
    foreach(get_field('content', $field_id) as $index => $row):

        get_template_part('template-parts/builder/section', $row['acf_fc_layout'], ['row' => $row, 'index' => $index,]);

        endforeach; ?>