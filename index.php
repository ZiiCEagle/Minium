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

        <p class="site-main-meta"><?php _e( 'Last posts', 'minium' ); ?></p>

        <?php if ( have_posts() ) : ?>
            <?php $count = 0; ?>

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php if ( $count % 3 == 1 ) : ?>
                    <div class="row">
                <?php endif; ?>

                <?php get_template_part( 'templates/content', get_post_format() ); ?>

                <?php if ( $count % 3 == 2 || $count + 1 == count( $posts ) ) : ?>
                    </div>
                <?php endif; ?>

                <?php $count ++; ?>

            <?php endwhile; ?>

            <?php minium_paging_nav(); ?>

        <?php else : ?>

            <?php get_template_part( 'templates/content', 'none' ); ?>

        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
