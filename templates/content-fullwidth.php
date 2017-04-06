<?php
/**
 * @package Minium
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="content-header">
        <h2 class="content-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark">
                <?php if ( is_sticky() ) : ?>
                    <i class="fa fa-bookmark"></i>
                <?php endif; ?>
                <?php the_title(); ?>
            </a>
        </h2>

        <div class="content-meta">
            <span class="content-author">
                <?php the_author_posts_link(); ?>
            </span>
            <span class="content-date">
                <time datetime="<?php the_time( 'c' ); ?>" title="<?php printf( __('%1$s at %2$s'), get_the_date(), get_the_time() ); ?>">
                    <?php printf( __( '%1s ago', 'minium' ), human_time_diff( get_the_time( 'U' ) ) ); ?>
                </time>
            </span>
        </div>
    </header>

    <div class="content-summary">
        <?php the_excerpt(); ?>
    </div>

    <footer>
        <?php if ( has_category() ) : ?>
            <div class="cat-links">
                <?php the_category(); ?>
            </div>
        <?php endif; ?>
    </footer>
</article>
