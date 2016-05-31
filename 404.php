<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Minium
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'minium' ); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content">
                <p><?php _e( 'It looks like nothing was found at this location. Maybe try to go home or search something ?', 'minium' ); ?></p>
            </div><!-- .page-content -->

            <?php if ( is_active_sidebar( 'minium-not-found' ) ) : ?>
                <div id="site-supplementary" class="widget-area">
                    <?php dynamic_sidebar( 'minium-not-found' ); ?>
                </div><!-- #site-supplementary -->
            <?php endif; ?>

        </section><!-- .error-404 -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
