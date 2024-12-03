<?php

$actions = [
	'load_kennisbank',
	'filter_kennisbank',

];
foreach ($actions as $action) {
	add_action("wp_ajax_{$action}", $action);
	add_action("wp_ajax_nopriv_{$action}", $action);
}


function load_kennisbank () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<?php get_template_part('parts/content', 'nieuws') ?>

		<?php }
	}
	wp_reset_query(); 
	die();
}


function filter_kennisbank(){

	$post_type = ['nieuws'];
	if($_GET['post_type']) $post_type = $_GET['post_type'];
	$args = array(
		'post_type' => $post_type,
		'posts_per_page' => 12,
		'post_status' => 'publish',
	);

	if($_GET['category'])
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'nieuws_cat',
				'field'    => 'id',
				'terms'    => $_GET['category']
			)
		);

	$wp_query = new WP_Query($args);

	if( $wp_query->have_posts() ) : ?>

		
		<div class="wrap d-flex flex-wrap" id="response_kennisbank">

			<?php while($wp_query->have_posts() ): $wp_query->the_post() ?>

					<?php get_template_part('parts/content', 'nieuws') ?>

			<?php endwhile; ?>

			
		</div>

		<?php if ($wp_query->max_num_pages > 1): ?>
			<script> var this_page = 1; </script>

			<div class="btn-wrap w-100 d-flex justify-content-center">
				<a href="#" class="btn-default btn-big load_kennisbank" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'><?= isset($_GET['load_more_button_text']) && $_GET['load_more_button_text'] ? $_GET['load_more_button_text'] : __('Laad meer', 'RSG') ?></a>
			</div>
		<?php endif ?>

		<?php wp_reset_postdata();
	endif;

	die();
}