<?php
/**
 * The loop for displaying the Work custom post type
 * Template Name: Work 
 * @package 29th Floor
 * @subpackage 29F
 * @since 29F 1.0
 */
 get_header(); ?>

<section id="work">
        <?php include('work-nav.php'); ?>
        
        <ol id="work-list">
<?php /* Loop Start */ ?>
<?php $loop = new WP_Query( array( 'post_type' => 'work', 'posts_per_page' => -1 ) );
	while ( $loop->have_posts() ) : $loop->the_post(); ?>

<?php /* How to display all other posts. */ ?>
	
		<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 	
        	<article>
            	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'View %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><span style="background-image:url(<?php echo get_post_meta($post->ID, 'work-thumb', true); ?>);"></span><strong><?php the_title(); ?></strong></a>
			</article>
		</li>

		<?php endwhile; // End the loop. Whew. ?>
		</ol>
</section>

<?php get_footer(); ?>