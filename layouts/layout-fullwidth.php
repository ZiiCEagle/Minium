<div id="fullwidth-container" class="fullwidth-container">

    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'templates/content', 'fullwidth' ); ?>

    <?php endwhile; ?>

</div>
