<?php
/**
 * Template for displaying search forms
 *
 * @package Minium
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" class="search-field" placeholder="<?php _e( 'Search', 'minium' ); ?> ..."
           value="<?php echo get_search_query(); ?>" name="s"/>
    <button type="submit" class="submit-field">
        <i class="fa fa-search"></i>
    </button>
</form>
