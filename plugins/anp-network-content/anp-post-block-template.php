<?php
/*
* Template for the output of the Network Posts List as blocks
* Override by placing a file called plugins/anp-network-content/anp-post-block-template.php in your active theme
*/ 

$html .= '<article id="post-' . $post_id . '" class="post entry hentry" role="article">';

$html .= '<header class="entry-header">';
if( $show_thumbnail && !empty( $post_detail['post_image'] ) ) {
	//Show image
	$html .= '<div class="entry-image">';
	$html .= '<a href="' . esc_url( $post_detail['permalink'] ) . '" class="entry-image-link">';
	$html .= '<img class="attachment-post-thumbnail wp-post-image item-image" src="' . $post_detail['post_image'] . '">';
	$html .= '</a>';
	$html .= '</div>';
}
$html .= '<h3 class="entry-title">';
$html .= '<a href="' . esc_url( $post_detail['permalink'] ) . '">';
$html .= $post_detail['post_title'];
$html .= '</a>';
$html .= '</h3>';

if( !empty( $show_meta ) ) {
	$html .= '<div class="entry-meta">';

	$html .= '<span class="post-date posted-on date"><span class="meta-label">' . __( 'Posted On', 'anp-network-content' ) . '</span> <time class="entry-date" datetime="' . $post_detail['post_date'] . '">';
	$html .= date_i18n( get_option( 'date_format' ), strtotime( $post_detail['post_date'] ) );
	$html .= '</time></span>';

	$html .= '</div>';
}
$html .= '</header>';

if( !empty( $show_excerpt ) ) {
	$html .= '<div class="entry-content">';
	$html .= $post_detail['post_excerpt'];
	$html .= '</div>';
}

$html .= '<footer class="entry-footer">';

if( !empty( $show_meta ) ) {
	$html .= '<div class="entry-meta">';
	$html .= '<span class="category cat-links tags">' . $post_categories . '</span>';
	$html .= '</div>';
}

if( !empty( $show_site_name ) ) {
	$html .= '<div class="site-name"><span class="meta-label">' . __( 'Posted In', 'anp-network-content' ) . '</span> <a href="' . esc_url( $post_detail['site_link'] ) . '">';
	$html .= $post_detail['site_name'];
	$html .= '</a></div>';
}

$html .= '</footer>';

$html .= '</article>';

?>