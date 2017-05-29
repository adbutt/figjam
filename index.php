<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section>

			<h1><?php _e( 'Latest Posts', 'figjam' ); ?></h1>

			<?php get_template_part('partials/loop'); ?>

			<?php get_template_part('partials/pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
