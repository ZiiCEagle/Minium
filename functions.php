<?php
/**
 * minium functions and definitions
 *
 * @package Minium
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 992; /* pixels */
}

if ( ! function_exists( 'minium_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function minium_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on minium, use a find and replace
         * to change 'minium' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'minium', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'minium' ),
            'social'  => __( 'Social Links Menu', 'minium' ),
        ) );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
    }
endif; // minium_setup
add_action( 'after_setup_theme', 'minium_setup' );

/**
 * Register a footer and interactive widget area.
 */
function minium_widgets_init() {
    /**
     * Set up our interactive sidebar if a user decided
     * to enable this sidebar via the Customizer.
    */

    // Footer widget area.
    register_sidebar( array(
        'name'          => __( 'Footer', 'minium' ),
        'id'            => 'minium-footer',
        'description'   => __( 'Widget area for the footer. If no widgets are provided, this footer will not appear.', 'minium' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Page not found', 'minium' ),
        'id'            => 'minium-not-found',
        'description'   => __( 'Widget area for the page not found. If no widgets are provided, this widget will not appear.', 'minium' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'minium_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function minium_scripts() {
    wp_enqueue_style( 'minium-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,700,300,300italic,400italic,700italic', false );
    wp_enqueue_style( 'minium-style', get_stylesheet_uri() );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_singular() ) {
        wp_enqueue_style( 'highlight', "//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/styles/railscasts.min.css" );
        wp_enqueue_script( 'highlight', "//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/highlight.min.js" );
    }
}

add_action( 'wp_enqueue_scripts', 'minium_scripts' );

function highlight() {
    if ( is_singular() ) :
        ?>
        <script type="text/javascript">hljs.initHighlightingOnLoad();</script>
        <?php
    endif;
}

add_action( 'wp_footer', 'highlight' );

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/extras.php';

require get_template_directory() . '/inc/customizer.php';
