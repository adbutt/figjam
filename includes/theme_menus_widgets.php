<?php

/**
 * Register Menu Locations For The Theme
*/

if (!(function_exists('figjam_register_nav_menus'))) {
    function figjam_register_nav_menus()
    {
        register_nav_menus(
            array(
        'primary'  => esc_html__('Standard Navigation', 'figjam'),
        'offscreen'  => esc_html__('Offscreen & Slide Navigation', 'figjam'),
        'left-vertical'  => esc_html__('Left Vertical Navigation', 'figjam'),
        'footer'  => esc_html__('Footer Navigation', 'figjam')
        )
        );
    }
    add_action('init', 'figjam_register_nav_menus');
}
// Figjam Blank Navigation
if (!(function_exists('figjam_nav'))) {
    function figjam_nav()
    {
        wp_nav_menu(
            array(
        'theme_location'  => 'primary',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul class="menu">%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
        );
    }
}
if (condition) {
    # code...
}
/**
 * Register Widget Areas For The Theme
*/

if (!(function_exists('figjam_register_sidebars'))) {
    function figjam_register_sidebars()
    {
        // Define Sidebar Widget Area 1
        register_sidebar(
            array(
        'name' => esc_html__('Widget Area 1', 'figjam'),
        'description' => esc_html__('Description for this widget-area...', 'figjam'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
        )
        );

    // Define Sidebar Widget Area 2
        register_sidebar(
            array(
        'name' => esc_html__('Widget Area 2', 'figjam'),
        'description' => esc_html__('Description for this widget-area...', 'figjam'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
        )
        );
    }
    add_action('widgets_init', 'figjam_register_sidebars');
}
