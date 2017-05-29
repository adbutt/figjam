<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section>

			<h1><?php esc_attr_e( 'Category: ', 'figjam' );
				single_cat_title(); ?>
			</h1>

			<?php get_template_part( 'partials/loop' ); ?>

			<?php get_template_part( 'partials/pagination' ); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
