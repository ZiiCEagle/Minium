<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();
            ?>

            <div class="site-meta">
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                </a>

                <div class="site-summary">
                    <?php echo the_author_posts_link(); ?>
                    <span class="entry-date">
                        <time datetime="<?php the_time( 'c' ); ?>" title="<?php printf( __('%1$s at %2$s'), get_the_date(), get_the_time() ); ?>">
                            <?php printf( __( '%1s ago', 'minium' ), human_time_diff( get_the_time( 'U' ) ) ); ?>
                        </time>
                        <i class="fa fa-circle bull"></i>
                        <a class="site-comments" href="#comments">
                            <i class="fa fa-comments"></i><?php comments_number( '0', '1', '%' ); ?>
                        </a>
                    </span>
                </div>
            </div>

            <?php

            // Include the single post content template.
            get_template_part( 'templates/content', 'single' );

            minium_post_nav();

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

        endwhile;
        ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
