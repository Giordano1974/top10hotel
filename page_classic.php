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
<main id="site-content" class="main-content is-loaded">
    <article class="page type-page entry">
        <header class="alignfull entry-header page-header single-entry-header">
            <div class="header-content">
                <div class="tripp-container">
                    <h1 class="entry-title"><?php the_title() ?></h1>
                </div>
            </div>
        </header>
        <div class="entry-content">

			    <?php the_content() ?>

	    </div><!-- #entry-content -->
    </article>
</main><!-- #main-content -->

<?php
get_footer();