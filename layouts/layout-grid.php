<?php $count = 0; ?>

<div id="grid-container" class="grid-container">

    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <?php if ( $count % 3 == 1 ) : ?>
            <div class="row">
        <?php endif; ?>

        <?php get_template_part( 'templates/content', 'grid' ); ?>

        <?php if ( $count % 3 == 2 || $count + 1 == count( $posts ) ) : ?>
            </div>
        <?php endif; ?>

        <?php $count ++; ?>

    <?php endwhile; ?>

</div>
