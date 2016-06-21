<?php if( has_nav_menu( 'footer-menu' ) ) : ?>
<nav class="bottom-navigation" role="navigation">
    <?php
        wp_nav_menu( array(
            'theme_location'    => 'footer-menu',
            'menu_class'        => 'footer-menu',
            'depth'             => 1,
            'container_class'   => 'footer-menu-container',
            'link_before'       => '<span class="menu-text">',
            'link_after'        => '</span>',
            'fallback_cb'       => false,
         ) );
    ?>
</nav><!-- .bottom-navigation -->
<?php endif; ?>