<?php
/**
 * The template part for displaying an Author biography
 *
 * @package Minium
 */
?>

<div class="author-info">
    <p class="author-meta"><?php _e( 'Written by', 'minium' ); ?></p>

    <div class="author-content">
        <div class="author-avatar">
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
            </a>
        </div><!-- .author-avatar -->

        <div class="author-description">

            <h2 class="author-title">
                <?php the_author_posts_link(); ?>
            </h2>

            <p class="author-bio">
                <?php the_author_meta( 'description' ); ?>

                <?php author_social_menu(); ?>
            </p>

        </div>
    </div>
</div>
