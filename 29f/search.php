<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package 29th Floor
 * @subpackage 29F
 * @since 29F 1.0
 */

get_header(); ?>

<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = $query_split[1];
} // foreach

global $search;
$search = new WP_Query($search_query);
$total_results = $search->found_posts;

?>

		
<?php if ( have_posts() ) : ?>
                <?php echo '<p>We found ' . $total_results . ' results for <em>' . get_search_query() . '</em>:</p>'; ?>
                <section id="search-results">
				<ol>
      <?php while ( have_posts() ) : the_post(); ?>
                <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                 <div class="article-excerpt"><?php the_excerpt(); ?></div>
				</li>
       <?php endwhile; // End the loop. Whew. ?>
<?php else : ?>
				<section id="articles" class="search-results">
				<ol>
				<li id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found', 'twentyten' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
					</div><!-- .entry-content -->
				</li><!-- #post-0 -->
<?php endif; ?>
			</ol><!-- #content -->
		</section><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
