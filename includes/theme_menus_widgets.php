<?php
if ( ! function_exists( 'figjam_nav' ) ) :
/**
 *
 * Build the navigation
 * @since 0.1
 *
 */
function figjam_nav()
{
	?>
	<nav itemtype="http://schema.org/SiteNavigationElement" itemscope="itemscope" id="site-navigation" class="main-navigation">
		<div class="inside-navigation cf">
			<a class="menu-toggle" href="#" aria-controls="primary-menu" aria-expanded="false">
				<div class="mobile-menu">
					<span class="line1"></span>
                	<span class="line2"></span>
                	<span class="line3"></span>
                	<p>Open Menu</p>
				</div>
            </a>
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span class="mobile-menu"><?php echo apply_filters('generate_mobile_menu_label', __( 'Menu', 'generatepress' ) ); ?></span>
			</button> -->
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container' => 'div',
					'container_class' => 'main-nav',
					'container_id' => 'primary-menu',
					'menu_class' => '',
					'fallback_cb' => 'generate_menu_fallback',
					'items_wrap' => '<ul id="%1$s" class="%2$s menu sf-menu">%3$s</ul>'
				)
			);
			?>
		</div><!-- .inside-navigation -->
	</nav><!-- #site-navigation -->
	<?php
}
endif;

if ( ! function_exists( 'generate_menu_fallback' ) ) :
/**
 * Menu fallback.
 *
 * @param  array $args
 * @return string
 * @since 1.1.4
 */
function generate_menu_fallback( $args )
{
	$generate_settings = wp_parse_args(
		get_option( 'generate_settings', array() ),
		generate_get_defaults()
	);
	?>
	<div id="primary-menu" class="main-nav">
		<ul>
			<?php
			$args = array(
				'sort_column' => 'menu_order',
				'title_li' => '',
				'walker' => new Generate_Page_Walker()
			);
			wp_list_pages( $args );
			?>
		</ul>
	</div><!-- .main-nav -->
	<?php
}
endif;

if ( ! class_exists( 'Generate_Page_Walker' ) && class_exists( 'Walker_Page' ) ) :
/**
 * Add current-menu-item to the current item if no theme location is set
 * This means we don't have to duplicate CSS properties for current_page_item and current-menu-item
 *
 * @since 1.3.21
 */
class Generate_Page_Walker extends Walker_Page
{
	function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 )
	{
		$css_class = array( 'page_item', 'page-item-' . $page->ID );
		$button = '';

		if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
			$css_class[] = 'menu-item-has-children';
			$button = '<span role="button" class="dropdown-menu-toggle" aria-expanded="false"></span>';
		}

		if ( ! empty( $current_page ) ) {
			$_current_page = get_post( $current_page );
			if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
				$css_class[] = 'current-menu-ancestor';
			}
			if ( $page->ID == $current_page ) {
				$css_class[] = 'current-menu-item';
			} elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
				$css_class[] = 'current-menu-parent';
			}
		} elseif ( $page->ID == get_option('page_for_posts') ) {
			$css_class[] = 'current-menu-parent';
		}

		$css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

		$args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
		$args['link_after'] = empty( $args['link_after'] ) ? '' : $args['link_after'];

		$output .= sprintf(
			'<li class="%s"><a href="%s">%s%s%s%s</a>',
			$css_classes,
			get_permalink( $page->ID ),
			$args['link_before'],
			apply_filters( 'the_title', $page->post_title, $page->ID ),
			$args['link_after'],
			$button
		);
	}
}
endif;

if ( ! function_exists( 'generate_dropdown_icon_to_menu_link' ) ) :
/**
 * Add dropdown icon if menu item has children.
 *
 * @since 1.3.42
 */
add_filter( 'nav_menu_item_title', 'generate_dropdown_icon_to_menu_link', 10, 4 );
function generate_dropdown_icon_to_menu_link( $title, $item, $args, $depth ) {
	// Build an array with our theme location
	$theme_locations = array(
		'primary'
	);

	// Loop through our menu items and add our dropdown icons
	if ( in_array( $args->theme_location, apply_filters( 'generate_menu_arrow_theme_locations', $theme_locations ) ) ) {
		foreach ( $item->classes as $value ) {
			if ( 'menu-item-has-children' === $value  ) {
				$title = $title . '<span role="button" class="dropdown-menu-toggle" aria-expanded="false"></span>';
			}
		}
	}

	// Return our title
	return $title;
}
endif;


/**
 * Register Menu Locations For The Theme
*/

if (!(function_exists('figjam_register_nav_menus'))) {
    function figjam_register_nav_menus()
    {
        register_nav_menus(
            array(
        'primary'  => esc_html__('Standard Navigation', 'figjam'),
        'footer'  => esc_html__('Footer Navigation', 'figjam')
        )
        );
    }
    add_action('init', 'figjam_register_nav_menus');
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
