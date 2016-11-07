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

add_theme_support('infinite-scroll', array(
    'type' => 'scroll',
    'container' => 'grid-container',
    'render' => 'wpc_scroll_render',
    'footer' => false
) );

function wpc_scroll_render() {
    get_template_part('loop');
}

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
