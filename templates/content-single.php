<?php
/**
 * The template part for displaying single posts
 *
 * @package Minium
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail(); ?>
        <?php endif; ?>
        <h1 class="entry-title">
            <?php if ( is_sticky() ) : ?>
                <i class="fa fa-bookmark"></i>
            <?php endif; ?>
            <?php the_title(); ?>
        </h1>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>

        <?php

        wp_link_pages( array(
            'before'           => '<div class="page-links">',
            'next_or_number'   => 'next',
            'nextpagelink'     => __( 'Next page', 'minium' ) . '<i class="fa fa-angle-right"></i>',
            'previouspagelink' => '<i class="fa fa-angle-left"></i>' . __( 'Previous page', 'minium' ),
            'after'            => '</div>',
        ) );

        ?>

        <?php if ( has_category() ) : ?>
            <?php the_category(); ?>
        <?php endif; ?>

        <?php if ( has_tag() ) : ?>
            <div class="tags-links">
                <?php the_tags(); ?>
            </div>
        <?php endif; ?>

        <?php get_template_part( 'biography' ); ?>
    </div>
</article>
