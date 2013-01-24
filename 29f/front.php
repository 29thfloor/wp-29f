<?php
/**
 * The loop
 * Template Name: Blog 
 * @package 29th Floor
 * @subpackage 29F
 * @since 29F 1.0
 */
  get_header(); ?>


<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title">Not Found</h1>
		<div class="entry-content">
			<p>I'm sorry but we were unable to locate the documents you requested. Maybe you should try using the search capabilities for once.</p>
			<?php get_search_form(); ?>
		</div>
	</div>
<?php else: ?>
<section id="articles">
    	<h1>Blog</h1> <a href="" class="rss">RSS Feed</a>

<?php /* Loop Start */ ?>
<?php while ( have_posts() ) : the_post(); ?>


		<ol>
<?php /* How to display all other posts. */ ?>
	
		<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        	<div class="article-meta">
            	<span class="date"><?php echo get_the_date('M j Y'); ?></span>
                <span class="time"><?php the_time('g:ia'); ?> </span>

            </div>
        	<?php the_post_thumbnail( 'post-thumbnail', array('class' => 'article-thumb') ); ?> 
        	<article>
            	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                <div class="article-summary">
					<?php the_excerpt(); ?>
				</div>
				<?php $tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
                <div class="tags"><?php echo $tags_list; ?></div>

				<?php endif; ?>
				</article>
		</li>

		<?php endwhile; // End the loop. Whew. ?>
		</ol>
        <?php endif; ?>
<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link('<span class="meta-nav">&larr;</span> Older articles'); ?></div>
					<div class="nav-next"><?php previous_posts_link('Newer articles <span class="meta-nav">&rarr;</span>'); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
</section>
<?php get_footer(); ?>