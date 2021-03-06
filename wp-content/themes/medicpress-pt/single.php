<?php
/**
 * The template for displaying all single posts.
 *
 * @package medicpress-pt
 */

get_header();

$medicpress_sidebar = get_field( 'sidebar', (int) get_option( 'page_for_posts' ) );

if ( ! $medicpress_sidebar ) {
	$medicpress_sidebar = 'left';
}

get_template_part( 'template-parts/page-header' );

?>

	<div id="primary" class="content-area  container">
		<div class="row">
			<main id="main" class="site-main  col-xs-12<?php echo 'left' === $medicpress_sidebar ? '  site-main--left  col-lg-9  push-lg-3' : ''; ?><?php echo 'right' === $medicpress_sidebar ? '  site-main--right  col-lg-9' : ''; ?>">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'single' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					?>

				<?php endwhile; // End of the loop. ?>
			</main>

			<?php get_template_part( 'template-parts/sidebar', 'blog' ); ?>

		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>
