<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to medium_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package Minium
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <h2 class="comments-title">
        <i class="fa fa-comments"></i>
        <?php comments_number( __( 'No comments', 'minium' ), __( '1 comment', 'minium' ), __( '% comments', 'minium' ) ); ?>
    </h2>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
        <p class="comments-closed">
            <i class="fa fa-info-circle"></i> <?php _e( 'Comments are closed.', 'minium' ); ?>
        </p>
    <?php endif; ?>

    <?php comment_form(); ?>

    <?php if ( have_comments() ) : ?>
        <ul class="comments-list">
            <?php wp_list_comments( array( 'callback' => 'minium_comment' ) ); ?>
        </ul>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
            <nav id="comment-nav" class="nav-links" role="navigation">
                <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'minium' ); ?></h1>

                <div class="nav-previous">
                    <?php previous_comments_link( '<i class="fa fa-angle-left"></i>' . __( 'Older Comments', 'minium' ) ); ?>
                </div>

                <div class="nav-next">
                    <?php next_comments_link( __( 'Newer Comments', 'minium' ) . '<i class="fa fa-angle-right"></i>' ); ?>
                </div>

            </nav><!-- #comment-nav-below -->
        <?php endif; // check for comment navigation ?>

    <?php endif; // have_comments() ?>
</div><!-- #comments -->
