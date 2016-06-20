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

if ( ! function_exists( 'nycnowc_network_main_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function nycnowc_network_main_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( 'c' ) ),
        esc_html( get_the_modified_date() )
    );

    $posted_on = sprintf(
        esc_html_x( '%s', 'post date', 'nycnowc' ),
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    );

    $byline = sprintf(
        esc_html_x( '%s', 'post author', '' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

remove_action( 'anp_page_header_bottom', 'anp_archive_post_type_search' );

