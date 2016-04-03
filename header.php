<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Minium
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

    <div class="navbar-container">
        <div class="navbar">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><?php bloginfo( 'title' ); ?></a>
            <?php get_search_form(); ?>
        </div>
    </div>

    <header id="masthead" class="site-header">

        <?php if ( is_author() ) : ?>

            <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>

            <h1><?php the_author(); ?></h1>

            <p><?php the_author_meta( 'description' ); ?></p>

            <?php author_social_menu(); ?>

        <?php elseif ( ! is_single() ) : ?>

            <h1> <?php bloginfo( 'title' ); ?> </h1>

            <p> <?php bloginfo( 'description' ); ?> </p>

            <?php social_menu(); ?>

        <?php endif; ?>

    </header><!-- #masthead -->

    <div id="content" class="site-content container">
