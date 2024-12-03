<?php get_header(); ?>

<section class="knowledge">
	<div class="container">
		<div class="row">
			<div class="wrap d-flex flex-wrap">

				<?php 
				if ($wp_query->have_posts()) {
					?>
					<h1><?php _e('Zoekresultaten', 'RSG') ?>: <?= get_search_query() ?></h1>
					<?php 
					while ($wp_query->have_posts()): $wp_query->the_post();
						get_template_part('parts/content', 'nieuws');
					endwhile; 
				}
				else { 
					?>
					<h1><?php _e('Geen berichten gevonden', 'RSG') ?></h1>
					<?php 
				}
				?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>