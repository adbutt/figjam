<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section>

			<h1><?php echo sprintf( __( '%s Search Results for ', 'figjam' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

			<?php get_template_part('partials/loop'); ?>

			<?php get_template_part('partials/pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
