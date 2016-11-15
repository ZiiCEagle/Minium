<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Minium
 */

function wrap_iframe( $content ) {
    // Match any iframes or embeds
    $pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
    preg_match_all( $pattern, $content, $matches );
    foreach ( $matches[0] as $match ) {
        $wrappedframe = '<div class="video-embed">' . $match . '</div>';
        $content      = str_replace( $match, $wrappedframe, $content );
    }

    return $content;
}

add_filter( 'the_content', 'wrap_iframe' );

function my_new_contactmethods( $contactmethods ) {
    $contactmethods['facebook']   = 'Facebook';
    $contactmethods['twitter']    = 'Twitter';
    $contactmethods['googleplus'] = 'Google+';
    $contactmethods['linkedin']   = 'LinkedIn';
    $contactmethods['instagram']  = 'Instagram';
    $contactmethods['github']     = 'Github';

    return $contactmethods;
}

add_filter( 'user_contactmethods', 'my_new_contactmethods', 10, 1 );
add_filter( 'get_image_tag_class', '__return_empty_string' );
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 *
 * @return string The filtered title.
 */
function minium_wp_title( $title, $sep ) {
    global $page, $paged;

    if ( is_feed() ) {
        return $title;
    }

    // Add the blog name
    $title .= get_bloginfo( 'name' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep $site_description";
    }

    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 ) {
        $title .= " $sep " . sprintf( __( 'Page %s', 'minium' ), max( $paged, $page ) );
    }

    return $title;
}

add_filter( 'wp_title', 'minium_wp_title', 10, 2 );

/**
 * Generate summary for posts
 */
if ( ! function_exists( 'add_anchor_to_title' ) ) {
    function replace_ca( $matches ) {
        array_shift($matches);
        $lvl = $matches[0];
        $title = $matches[1];
        $sanitize_title = sanitize_title($title);

        return "<h{$lvl} id='{$sanitize_title}'>{$title}</h{$lvl}>";
    }
}

if ( ! function_exists( 'add_anchor_to_title' ) ) {
    function add_anchor_to_title( $content ) {
        if ( is_singular( 'post' ) ) {
            global $post;
            $pattern = "/<h([2-4]).*?>(.*?)<\/h[2-4]>/i";

            return preg_replace_callback( $pattern, 'replace_ca', $content );
        }
        return $content;
    }
}
add_filter('the_content', 'add_anchor_to_title', 12);

if ( ! function_exists( 'summary' ) ) {
    function summary( $atts = [] ) {
        global $post;
        $atts = array_change_key_case( (array)$atts, CASE_LOWER );
        $atts = shortcode_atts( [ 'deep' => 1 ], $atts );
        $deep = $atts['deep'];
        $titles = [];

        $summary = '<nav class="article-summary"><ol>';

        $pattern = "/<h([2-4]).*?>(.*?)<\/h[2-4]>/i";
        preg_match_all( $pattern, $post->post_content, $matches );
        array_shift($matches);

        foreach ( $matches[0] as $key => $value ) {
            if ( $deep > 1 && $value > $deep ) {
                continue;
            }
            $titles[] = [ $value => $matches[ 1 ][ $key ] ];
        }

        foreach ($titles as $title) {
            $lvl = key($title);
            $next_lvl = key( next( $titles ) );
            $title_content = $title[ $lvl ];
            $sanitize_title = sanitize_title( $title_content );
            $link = "<a href='#{$sanitize_title}'>{$title_content}</a>";

            if ( $lvl == $next_lvl || $lvl > $next_lvl ) {
                $summary .= "<li>{$link}</li>";
            }

            if ( $lvl < $next_lvl ) {
                $summary .= "<li>{$link}";

                for ( $i = 0; $i < $next_lvl - $lvl; $i++ ) {
                    $summary .= '<ol>';
                }
            }
            else {
                for ( $i = 0; $i < $lvl - $next_lvl; $i++ ) {
                    $summary .= '</ol></li>';
                }
            }
        }

        $summary .= '</ol></nav>';
        return $summary;
    }
}

add_shortcode( 'summary', 'summary' );
