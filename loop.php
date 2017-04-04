<?php
/**
 * The loop template file.
 *
 * @package Minium
 */
?>

<?php if ( have_posts() ) : ?>

    <?php if (get_theme_mod('minium_layout_type') == 'grid') : ?>
        <?php get_template_part( 'layouts/layout', 'grid' ); ?>
    <?php else : ?>
        <?php get_template_part( 'layouts/layout', 'fullwidth' ); ?>
    <?php endif; ?>

    <?php minium_paging_nav(); ?>

<?php else : ?>

    <?php get_template_part( 'templates/content', 'none' ); ?>

<?php endif; ?>
