<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Minium
 */

if ( ! function_exists( 'minium_paging_nav' ) ) :
    /**
     * Display navigation to next/previous set of posts when applicable.
     *
     * @return void
     */
    function minium_paging_nav() {
        global $page, $wp_query;
        $page = ( $wp_query->query_vars['paged'] == 0 ) ? 1 : $wp_query->query_vars['paged'];

        // Don't print empty markup if there's only one page.
        if ( $wp_query->max_num_pages < 2 ) {
            return;
        }
        ?>
        <nav class="navigation paging-navigation">
            <div class="nav-links">

                <div
                    class="nav-previous"><?php next_posts_link( ' <i class="fa fa-angle-left"></i>' . __( 'Older posts', 'minium' ) ); ?></div>

                <?php if ( $wp_query->max_num_pages > 1 ) : ?>
                    <div class="nav-meta">
                        <?php printf( __( 'Page %1s on %2s', 'minium' ), $page, $wp_query->max_num_pages ); ?>
                    </div>
                <?php endif; ?>

                <div
                    class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'minium' ) . ' <i class="fa fa-angle-right"></i>' ); ?></div>

            </div>
        </nav>
        <?php
    }
endif;

if ( ! function_exists( 'social_menu' ) ) :

    function social_menu() {

        if ( has_nav_menu( 'social' ) ) : ?>

            <nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'minium' ); ?>">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'social',
                    'menu_class'     => 'social-links-menu',
                    'depth'          => 1,
                    'link_before'    => '<span class="screen-reader-text">',
                    'link_after'     => '</span>',
                ) );
                ?>
            </nav><!-- .social-navigation -->

        <?php endif;
    }
endif;

if ( ! function_exists( 'author_social_menu' ) ) :

    function author_social_menu() {

        $twitter    = get_the_author_meta( 'twitter', get_the_author_meta( 'ID' ) );
        $facebook   = get_the_author_meta( 'facebook', get_the_author_meta( 'ID' ) );
        $googleplus = get_the_author_meta( 'googleplus', get_the_author_meta( 'ID' ) );
        $instagram  = get_the_author_meta( 'instagram', get_the_author_meta( 'ID' ) );
        $linkedin   = get_the_author_meta( 'linkedin', get_the_author_meta( 'ID' ) );
        $github     = get_the_author_meta( 'github', get_the_author_meta( 'ID' ) );
        $url        = get_the_author_meta( 'user_url', get_the_author_meta( 'ID' ) );

        ?>

        <ul class="social-links-menu">
            <?php if ( ! empty( $twitter ) ) : ?>
                <li class="menu-item">
                    <a href="https://twitter.com/<?php echo $twitter; ?>" target="_blank"></a>
                </li>
            <?php endif; ?>

            <?php if ( ! empty( $url ) ) : ?>
                <li class="menu-item">
                    <a href="<?php echo $url; ?>" class="fa fa-user" target="_blank"></a>
                </li>
            <?php endif; ?>

            <?php if ( ! empty( $instagram ) ) : ?>
                <li class="menu-item">
                    <a href="https://www.instagram.com/<?php echo $instagram; ?>" target="_blank"></a>
                </li>
            <?php endif; ?>

            <?php if ( ! empty( $github ) ) : ?>
                <li class="menu-item">
                    <a href="https://github.com/<?php echo $github; ?>" target="_blank"></a>
                </li>
            <?php endif; ?>

            <?php if ( strpos( $linkedin, 'linkedin.com' ) !== false ) : ?>
                <li class="menu-item">
                    <a href="<?php echo $linkedin; ?>" target="_blank"></a>
                </li>
            <?php endif; ?>

            <?php if ( strpos( $facebook, 'facebook.com' ) !== false ) : ?>
                <li class="menu-item">
                    <a href="<?php echo $facebook; ?>" target="_blank"></a>
                </li>
            <?php endif; ?>

            <?php if ( strpos( $googleplus, 'plus.google.com' ) !== false ) : ?>
                <li class="menu-item">
                    <a href="<?php echo $googleplus; ?>" target="_blank"></a>
                </li>
            <?php endif; ?>

            <li class="menu-item">
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>feed/" target="_blank"></a>
            </li>
        </ul>

        <?php
    }
endif;

if ( ! function_exists( 'minium_post_nav' ) ) :
    /**
     * Display navigation to next/previous post when applicable.
     *
     * @return void
     */
    function minium_post_nav() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
        $next     = get_adjacent_post( false, '', false );

        if ( ! $next && ! $previous ) {
            return;
        }
        ?>
        <nav class="navigation post-navigation">
            <h1 class="screen-reader-text">
                <?php _e( 'Post navigation', 'minium' ); ?>
            </h1>

            <div class="nav-links">
                <div class="nav-previous">
                    <?php if ( $previous ) : ?>
                        <span class="meta-nav">
                        <?php _e( 'Previous post', 'minium' ); ?>
                    </span>
                        <?php previous_post_link( '%link', '<i class="fa fa-angle-left"></i>  %title' ); ?>
                    <?php endif; ?>
                </div>

                <div class="nav-next">
                    <?php if ( $next ) : ?>
                        <span class="meta-nav">
                        <?php _e( 'Next post', 'minium' ); ?>
                    </span>
                        <?php next_post_link( '%link', '%title <i class="fa fa-angle-right"></i>' ); ?>
                    <?php endif; ?>
                </div>
            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
        <?php
    }
endif;

if ( ! function_exists( 'minium_comment' ) ) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function minium_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;

        if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
                <div class="comment-body">
                    <?php _e( 'Pingback:', 'minium' ); ?><?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'minium' ), '<span class="edit-link">', '</span>' ); ?>
                </div>
            </li>

        <?php else : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
                <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                    <div class="comment-meta">
                        <div class="comment-author vcard">
                            <?php echo get_avatar( $comment ); ?>
                            <div class="comment-meta-info">
                                <?php echo get_comment_author_link(); ?>
                                <div class="comment-metadata">
                                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                                        <time datetime="<?php comment_time( 'c' ); ?>">
                                            <?php printf( __( '%1s ago', 'minium' ), human_time_diff( get_comment_time( 'U' ) ) ); ?>
                                        </time>
                                    </a>
                                </div>
                            </div>
                        </div><!-- .comment-author -->

                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation"><i
                                    class="fa fa-info-circle"></i> <?php _e( 'Your comment is awaiting moderation.', 'minium' ); ?>
                            </p>
                        <?php endif; ?>
                    </div><!-- .comment-meta -->

                    <div class="comment-content">
                        <?php comment_text(); ?>
                    </div><!-- .comment-content -->

                    <?php
                    comment_reply_link( array_merge( $args, array(
                        'add_below'  => 'div-comment',
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth'],
                        'before'     => '<div class="reply">',
                        'after'      => '</div>',
                        'reply_text' => __( 'Reply', 'minium' ) . ' <i class="fa fa-long-arrow-down"></i>'
                    ) ) );
                    ?>
                </article><!-- .comment-body -->
            </li>

            <?php
        endif;
    }
endif; // ends check for minium_comment()
