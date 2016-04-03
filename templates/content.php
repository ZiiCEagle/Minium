<?php
/**
 * @package Minium
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-post'); ?> style="background-image: url('<?php the_post_thumbnail_url(); ?>')">

    <a href="<?php the_permalink(); ?>" class="content-background"></a>

    <?php if ( has_category() ) : ?>
        <span class="cat-links">
            <?php the_category(); ?>
        </span>
    <?php endif; ?>

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
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
            </a>

            <div class="content-summary">
                <?php the_author_posts_link(); ?>
                <span class="content-date"><?php the_date(); ?>
                    <i class="fa fa-circle bull"></i>
                    <a href="<?php the_permalink(); ?>#comments">
                        <i class="fa fa-comments"></i><?php comments_number( '0', '1', '%' ); ?>
                    </a>
                </span>
            </div>
        </div><!-- .content-meta -->
    </header><!-- .content-header -->

</article>
