<?php
/**
 * The template for displaying archive pages
 *
 * @package Minium
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <p class="site-main-meta">
            <?php _e( 'Last posts by', 'minium' ); ?>
            <?php if ( is_month() ) : ?>
                <?php _e( 'month', 'minium' ); ?>
            <?php elseif ( is_year() ) : ?>
                <?php _e( 'year', 'minium' ); ?>
            <?php elseif ( is_category() ) : ?>
                <?php _e( 'category', 'minium' ); ?>
            <?php elseif ( is_author() ) : ?>
                <?php _e( 'author', 'minium' ); ?>
            <?php elseif ( is_tag() ) : ?>
                <?php _e( 'tag', 'minium' ); ?>
            <?php endif; ?>
        </p>

        <?php if ( ! is_author() ) : ?>
            <h2 class="archive-meta">
                <?php
                if ( is_month() ) {
                    echo get_the_date( 'F Y' );
                } elseif ( is_year() ) {
                    echo get_the_date( 'Y' );
                } elseif ( is_category() ) {
                    single_cat_title();
                } elseif ( is_tag() ) {
                    single_tag_title();
                }
                ?>
            </h2>
        <?php endif; ?>

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

