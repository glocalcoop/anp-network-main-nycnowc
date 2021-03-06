<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Activist_Network_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <?php do_action ( 'anp_home_site_main_top' );?>

            <?php do_action ( 'anp_site_main_top' );?>

			<?php while ( have_posts() ) : the_post(); ?>


				<?php get_template_part( 'template-parts/content', 'front' ); ?>

			<?php endwhile; // End of the loop. ?>

            <?php do_action ( 'anp_site_main_bottom' );?>

            <?php do_action ( 'anp_home_site_main_bottom' );?>

		</main><!-- #main -->
	</div><!-- #primary -->

    <?php do_action ( 'anp_home_widgets_before' );?>

    <?php if ( is_active_sidebar( 'sidebar-home' ) ) : ?>
    <?php $widget_class = anp_network_main_count_widgets( 'sidebar-home' ); ?>
    <div class="home-widgets <?php echo $widget_class; ?>">
        <?php dynamic_sidebar( 'sidebar-home' ); ?>
    </div>
    <?php endif; ?>

    <?php do_action ( 'anp_home_widgets_after' );?>

<?php get_footer(); ?>
