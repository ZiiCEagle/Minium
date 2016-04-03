<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Minium
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">

    <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'minium' ); ?>">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'primary-menu',
            ) );
            ?>
        </nav><!-- .main-navigation -->
    <?php endif; ?>

    <?php get_sidebar(); ?>

    <p class="footer-info">
        <?php _e( 'Made with', 'minium' ); ?> <i class="fa fa-heart"></i> <?php _e( 'by', 'minium' ); ?> <a href="<?php echo esc_url('https://guillaumebriday.fr'); ?>">Guillaume Briday</a>
    </p>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
