<?php get_header(); ?>

<section class="help">
	<div class="container">
		<div class="help__content">
			<div class="help__title title show">
				<h2>Search results: <?= get_search_query() ?></h2>
			</div>
			<div class="help__items">

				<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

					<a href="<?php the_permalink() ?>" class="help__item">
						<?php the_post_thumbnail('full') ?>
						<h4><?php the_title() ?></h4>
					</a>

				<?php endwhile; ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>