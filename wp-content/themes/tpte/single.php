<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package tpte
 */

get_header();
?>

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		// Post navigation and comments are handled inside content-post.php for 'post' type.
		// For other post types, fall back to default behavior.
		if ( 'post' !== get_post_type() ) :
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'tpte' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'tpte' ) . '</span> <span class="nav-title">%title</span>',
				)
			);


		endif;

	endwhile; // End of the loop.
	?>

<?php
get_footer();
