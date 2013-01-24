<?php
/**
 * Functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'twentyten_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package 29th Floor
 * @subpackage 29F
 * @since 29F 1.0
*/

remove_action('wp_head', 'wp_generator');

add_theme_support('post-thumbnails', array( 'post', 'work' ));
set_post_thumbnail_size( 150, 9999);
add_image_size( 'work-thumbnail', 243, 175 );

function sc_customtax($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => get_the_id(),
		"taxonomy" => 'tags',
		"before" => '',
		"sep" => ', ',
		"after" => ''
	), $atts));
	$sc_tags = get_the_term_list( $id, $taxonomy, $before, $sep, $after );
	return $sc_tags;
}
add_shortcode("customtax", "sc_customtax");

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

function remove_parent($var)
{
	// check for current page values, return false if they exist.
	if ($var == 'current_page_parent' || $var == 'current-menu-item' || $var == 'current-page-ancestor') { return false; }

	return true;
}

function tg_add_class_to_menu($classes)
{
	if (is_singular('work') || is_tax('29f_worktype') || is_tax('expertise'))
	{
		// we're viewing a custom post type, so remove the 'current-page' from all menu items.
		$classes = array_filter($classes, "remove_parent");

		// add the current page class to a specific menu item.
		if (in_array('menu-item-95', $classes)) $classes[] = 'current-page-ancestor';
	}

	return $classes;
}

if (!is_admin()) { add_filter('nav_menu_css_class', 'tg_add_class_to_menu'); }

function get_terms_dropdown($taxonomies, $args){
	$myterms = get_terms($taxonomies, $args);
	$output ="";
	$uri = explode("/", $_SERVER['REQUEST_URI']);
	$curtax = get_term_by( 'slug', $uri[2], 'expertise');
	foreach($myterms as $term){
		$root_url = get_bloginfo('url');
		$term_taxonomy=$term->taxonomy;
		$term_slug=$term->slug;
		$term_name =$term->name;
		$link = $root_url.'/'.$term_taxonomy.'/'.$term_slug;
		if($term_slug == $curtax->slug){
			$output .="<option value='".$link."' selected=\"selected\">".$term_name."</option>";
		} else {
			$output .="<option value='".$link."'>".$term_name."</option>";
		}
	}
	$output .="";
return $output;
}

