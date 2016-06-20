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

 remove_action( 'anp_page_header_bottom', 'anp_archive_post_type_search' );

