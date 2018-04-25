<?php

global $wp_query;
$term = $wp_query->get_queried_object();

get_header();

// Hide the first level header when displaying the category archives.
$custom_css = '
	.wzkb-section-name-level-1 {
		display: none;
	}
';
wp_add_inline_style( 'wzkb_styles', $custom_css );
?>



	<section id="primary" class="content-area">
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php echo esc_html( $term->name ); ?></h1>
			</header><!-- .page-header -->

			<?php
			wzkb_get_search_form();

			echo do_shortcode( "[knowledgebase category='{$term->term_id}']" );

			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer();


