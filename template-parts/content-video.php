<?php
/**
 * Template part for displaying posts.
 *
 * @package Activist_Network_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<?php do_action ( 'anp_entry_header_before' );?>

	<header class="entry-header">

		<?php do_action ( 'anp_entry_header_top' );?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php nycnowc_post_date(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php do_action ( 'anp_entry_header_bottom' );?>

	</header><!-- .entry-header -->

	<?php do_action ( 'anp_entry_content_before' );?>

	<div class="entry-content">

	<?php do_action ( 'anp_entry_content_top' );?>

		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'anp-network-main' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'anp-network-main' ),
				'after'  => '</div>',
			) );
		?>
	<?php do_action ( 'anp_entry_content_bottom' );?>

	</div><!-- .entry-content -->

	<?php do_action ( 'anp_entry_content_after' );?>

	<footer class="entry-footer">

        <?php do_action ( 'anp_entry_footer_top' );?>

		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

        <?php do_action ( 'anp_entry_footer_bottom' );?>

	</footer><!-- .entry-footer -->

	<?php do_action ( 'anp_entry_footer_after' );?>

</article><!-- #post-## -->
