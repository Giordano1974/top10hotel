<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<main id="site-content" class="main-content">
	<div class="error-404 not-found entry-content">
		<div class="page-404-error">
			<div class="page-error-code">404</div>
				<h1 class="page-title">Oops! <?php echo _e('404_title', 'top10hotel');?></h1>
				<p><?php echo _e('404_subtitle', 'top10hotel');?></p>
			</div>
			<form method="post" class="search-form" action="<?php echo  pll_home_url();?>">
				<input type="search" name="s" placeholder="<?php echo _e('search', 'top10hotel');?> &hellip;" value class="keyword" />
				<button type="submit" aria-label="cerca"><?php echo _e('search', 'top10hotel');?></button>
			</form>
			<div class="page-suggestions">
		</div>
	</div>
</main>

<?php
get_footer();