<?php
/**
 * Custom functions that act independently of the theme templates
 *
 *
 * @package Activist_Network_Child_Theme
 */

/**
 * Display Featured Image on Pages
 *
 * @since 1.0.1
 * 
 */

add_action( 'anp_entry_content_before', 'nycnowc_add_page_image' );

function nycnowc_add_page_image() {

    if( is_singular( 'page' ) && !is_home() && !is_front_page() ) {
        if( has_post_thumbnail() ) : ?>

        <?php $thumbnail_id = get_post_thumbnail_id( get_the_ID() ); ?>
        <?php $thumbnail_image = get_posts( array( 
            'p' => $thumbnail_id, 
            'post_type' => 'attachment' ) );
        ?>

        <figure class="wp-caption main-image">
            <?php the_post_thumbnail(); ?>
            <figcaption class="wp-caption-text">
                <?php echo $thumbnail_image[0]->post_excerpt; ?>
            </figcaption>
        </figure>
        
        <?php endif;
    }
}

/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Activist_Network_Theme
 */

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function anp_network_main_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="' . get_the_date( "Y-m-d H:i:s" ) . '">' . get_the_date() . '</time>';

    $posted_on = sprintf(
        esc_html_x( 'Posted %s', 'post date', 'nycnowc' ),
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    );

    $byline = sprintf(
        esc_html_x( 'by %s', 'post author', 'nycnowc' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}

/**
 * Prints HTML trucated date.
 *
 * @since 1.0.2
 */
function nycnowc_post_date() {
    echo '<time class="entry-date published updated" datetime="' . get_the_date( "Y-m-d H:i:s" ) . '">' . get_the_date() . '</time>';
}

/**
 * Arrange menus in footer
 *
 * @since 1.0.1
 */
function nycnowc_footer_menus() {

    get_template_part( 'components/social-menu/social-menu' );

    get_template_part( 'components/bottom-navigation/bottom-navigation' );

    echo '<div class="copyright">';

    get_template_part( 'components/site-info/site-info' );

    echo '</div>';

}
add_action( 'anp_footer_bottom', 'nycnowc_footer_menus' );


/**
 * Remove Search and Filters from Archive
 *
 * @since 1.0.1
 */
function anp_archive_post_filter() {
    return '';
}
add_action( 'anp_page_header_bottom', 'anp_archive_post_filter' );

function anp_archive_post_type_search() {
    return '';
}
add_action( 'anp_page_header_bottom', 'anp_archive_post_type_search' );

remove_action( 'anp_page_header_bottom', 'anp_archive_post_type_search' );

remove_action( 'anp_page_header_bottom', 'anp_archive_post_filter' );

