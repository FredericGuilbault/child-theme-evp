<?php

/**
 * The template for displaying archive pages
 *
 * Used to display custom post type archives if no archive template is found in the theme folder.
 *
 * @link  https://webberzone.com
 * @since 1.1.0
 *
 * @package WZKB
 */

/* This plugin uses the Archive file of TwentyFifteen theme as an example */
get_header();

wp_enqueue_style( 'wzkb_styles' );
wp_enqueue_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
wp_enqueue_script('bootstrap_js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');

?>


	<section id="primary" class="content-area">
		<?php if ( have_posts() ) : ?>

			<header class="page-header"></header><!-- .page-header -->

		<?php
			wzkb_get_search_form();
			echo wzkb_knowledge(); // WPCS: XSS OK.
			// If no content, include the "No posts found" template.
		else :
			esc_html_e( 'No results found', 'wzkb' );
		endif;
		?><!-- .site-main -->
	</section><!-- .content-area -->

<script>
	var acc = document.getElementsByClassName("wzkb_section_name");
	var i;
	for (i = 0; i < acc.length; i++) {

		acc[i].onclick = function(){
			console.log('clicked')
			/* Toggle between adding and removing the "active" class,
			 to highlight the button that controls the panel */
			this.classList.toggle("active");

			/* Toggle between hiding and showing the active panel */
			var panel = this.nextElementSibling;
			if (panel.style.display === "block") {
				panel.style.display = "none";
			} else {
				panel.style.display = "block";
			}
		}
	}
</script>

<?php get_footer();


