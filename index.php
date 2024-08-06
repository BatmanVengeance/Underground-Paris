<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 *
 * @package Astra
 * @since Astra 1.0.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php if ( have_posts() ) : ?>

            <?php
            // Start the Loop.
            while ( have_posts() ) :
                the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content', get_post_format() );

            endwhile;

            // Previous/next page navigation.
            the_posts_pagination(
                array(
                    'prev_text'          => __( 'Previous page', 'astra' ),
                    'next_text'          => __( 'Next page', 'astra' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'astra' ) . ' </span>',
                )
            );

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php
get_footer();
?>
