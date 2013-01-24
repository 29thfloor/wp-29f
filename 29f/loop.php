<?php
/**
 * The loop
 *
 * @package 29th Floor
 * @subpackage 29F
 * @since 29F 1.0
 */
?>


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
        <ol>
<?php endif; ?>
<?php /* Loop Start */ ?>
<?php while ( have_posts() ) : the_post(); ?>



<?php /* How to display all other posts. */ ?>
	
		<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        	<article>
            	<div class="article-meta">
                	<a href="<?php comments_link(); ?>" class="comments-link"><?php comments_number('0 Comments','1 Comment','% Comments'); ?></a>
					<?php $tags_list = get_the_tag_list('<ul><li>','</li><li>','</li></ul>');
                        if ( $tags_list ):
                    ?>
                    <div class="tags"><h4>Tags</h4> <?php echo $tags_list; ?></div>
                    <?php endif; ?>
                </div>
            	<div class="article-body">
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    <div class="date"><?php echo get_the_date('M j Y'); ?></div>
                    <div class="article-summary">
                        <?php the_content('Continue reading &raquo;'); ?>
                    </div>
                    <div class="add-comment"><a href="<?php the_permalink(); ?>/#disqus_thread">Add your comment &raquo;</a></div>
                </div>
			</article>
		</li>

		<?php endwhile; // End the loop. Whew. ?>
		</ol>
<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link('<span class="meta-nav">&larr;</span> Older posts'); ?></div>
					<div class="nav-next"><?php previous_posts_link('Newer posts <span class="meta-nav">&rarr;</span>'); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
</section>

<?php get_sidebar(); ?>