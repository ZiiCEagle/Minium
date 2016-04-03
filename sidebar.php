<?php
/**
 * The Footer Sidebar
 *
 * @package Minium
 */

if ( ! is_active_sidebar( 'minium-footer' ) ) {
    return;
}
?>

<div id="site-supplementary" class="widget-area">
    <?php dynamic_sidebar( 'minium-footer' ); ?>
</div><!-- #site-supplementary -->
