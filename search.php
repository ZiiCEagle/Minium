<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Minium
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <p class="site-main-meta"><?php _e( 'Last posts by search', 'minium' ); ?></p>

        <h2 class="archive-meta">
            <?php the_search_query(); ?>
        </h2>

        <?php get_template_part( 'loop' ); ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
