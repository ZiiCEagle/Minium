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

<footer id="colophon" class="site-footer">

    <?php social_menu(); ?>

    <?php get_sidebar(); ?>

    <p class="footer-info">
        <?php _e( 'Made with', 'minium' ); ?> <i class="fa fa-heart"></i> <?php _e( 'by', 'minium' ); ?> <a href="<?php echo esc_url('https://guillaumebriday.fr'); ?>">Guillaume Briday</a>
    </p>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
