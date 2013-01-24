<?php
// Solution for displaying custom taxonomy terms in a dropdown menu.
function dropdown_tag($taxonomy, $args = '' ) {
	$defaults = array('taxonomy' => 'expertise', // <- write taxonomy name
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
		'format' => 'flat', 'orderby' => 'name', 'order' => 'ASC',
		'exclude' => '', 'include' => ''
	);
	$args = wp_parse_args( $args, $defaults );

	$terms = get_terms($taxonomy, array_merge($args, array('orderby' => 'count', 'order' => 'DESC')) );

	if ( empty($terms) )
		return;

	$return = generate_dropdown_tag( $terms, $taxonomy, $args );
	if ( is_wp_error( $return ) )
		return false;
	else
		echo apply_filters( 'dropdown_tag', $return, $args );
}

function generate_dropdown_tag( $terms, $taxonomy, $args = '' ) {
	global $wp_rewrite;
	$defaults = array(
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
		'format' => 'flat', 'orderby' => 'name', 'order' => 'ASC'
	);
	$args = wp_parse_args( $args, $defaults );
	extract($args);

	if ( !$terms )
		return;
	$counts = $term_links = array();
	foreach ( (array) $terms as $term ) {
		$counts[$term->name] = $term->count;
		$term_links[$term->name] = get_term_link( $term->name, $taxonomy );
		if ( is_wp_error( $term_links[$term->name] ) )
			return $term_links[$term->name];
		$term_ids[$term->name] = $term->term_id;
	}

	$min_count = min($counts);
	$spread = max($counts) - $min_count;
	if ( $spread <= 0 )
		$spread = 1;
	$font_spread = $largest - $smallest;
	if ( $font_spread <= 0 )
		$font_spread = 1;
	$font_step = $font_spread / $spread;

	// SQL cannot save you; this is a second (potentially different) sort on a subset of data.
	if ( 'name' == $orderby )
		uksort($counts, 'strnatcasecmp');
	else
		asort($counts);

	if ( 'DESC' == $order )
		$counts = array_reverse( $counts, true );

	$a = array();

	$rel = ( is_object($wp_rewrite) && $wp_rewrite->using_permalinks() ) ? ' rel="term"' : '';

	foreach ( $counts as $term => $count ) {
		$term_id = $term_ids[$term];
		$term_link = clean_url($term_links[$term]);
		$term = str_replace(' ', '&nbsp;', wp_specialchars( $term ));
		$a[] = "\t<option value='$term_link'>$term ($count)</option>";
	}

	switch ( $format ) :
	case 'array' :
		$return =& $a;
		break;
	case 'list' :
		$return = "<ul class='wp-tag-cloud'>\n\t<li>";
		$return .= join("</li>\n\t<li>", $a);
		$return .= "</li>\n</ul>\n";
		break;
	default :
		$return = join("\n", $a);
		break;
	endswitch;

	return apply_filters( 'generate_dropdown_tag', $return, $term, $args );
}
?>
