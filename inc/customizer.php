<?php
/**
 * Minium Theme Customizer
 *
 * @package Minium
 */

$args = array(
    'default-color' => 'fff',
);

add_theme_support( 'custom-background', $args );
add_theme_support( 'title-tag' );

function minium_register_theme_customizer( $wp_customize ) {

    $wp_customize->add_setting( 'display_cookies_bar', array(
        'default'    => true,
        'transport'  =>  'postMessage'
     ) );

    $wp_customize->add_control(
    'display_cookies_bar',
    array(
        'section'   => 'title_tagline',
        'label'     => __( 'Display Cookies bar', 'minium' ),
        'type'      => 'checkbox'
         )
     );

    $wp_customize->add_setting( 'cookies_bar_learn_more_link' );
    $wp_customize->add_control(
        'cookies_bar_learn_more_link',
        array(
            'label' => __( 'The link for the call to learn more button', 'minium' ),
            'section' => 'title_tagline',
            'type' => 'text',
        )
    );
}

add_action( 'customize_register', 'minium_register_theme_customizer' );

function minium_customizer_css() {
    ?>
    <style type="text/css">

    </style>
    <?php
}

add_action( 'wp_head', 'minium_customizer_css' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fastr_customize_preview_js() {
    wp_enqueue_script( 'fastr_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}

add_action( 'customize_preview_init', 'fastr_customize_preview_js' );
