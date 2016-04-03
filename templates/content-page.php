<?php
/**
 * The template part for displaying single posts
 *
 * @package Minium
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="page-title"><?php the_title(); ?></h1>

        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail(); ?>
        <?php endif; ?>

    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

</article><!-- #post-## -->
