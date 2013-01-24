<?php
/**
 * 
 * @package 29th Floor
 * @subpackage 29F
 * @since 29F 1.0
 */
 
 get_header();

 $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  ?>
 
<section id="work">
        <h1>Expertise: <?php echo $term->name ?></h1>
		<?php include('work-nav.php'); ?>
        
        <ol id="work-list">
			<?php if (have_posts()) : ?>
        	<?php while (have_posts()) : the_post(); ?>
				<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                	<article>
                        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><span style="background-image:url(<?php echo get_post_meta($post->ID, 'work-thumb', true); ?>);"></span><strong><?php the_title(); ?></strong></a></h2>
                    </article>
				</li>

			<?php endwhile; ?>
     		<?php endif; ?>
		</ol>
</section>

<?php get_footer(); ?>