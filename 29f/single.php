<?php
/**
 * The Template for displaying all single posts.
 *
 * @package 29th Floor
 * @subpackage 29F
 * @since 29F 1.0
 */

get_header(); ?>

		<section id="article">
			<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            	<div class="article-sidebar">
                	<div class="next-prev">
                        <span class="previous-article"><?php previous_post_link( '&laquo; %link', 'Previous post'); ?></span>
                        <span class="next-article"><?php next_post_link( '%link &raquo;', 'Next post'); ?></span>
                    </div>
                    <div class="article-meta">
                    <a href="#disqus_thread" class="comments-link"><?php comments_number('0 Comments','1 Comment','% Comments'); ?></a>
					<?php $tags_list = get_the_tag_list('<ul><li>','</li><li>','</li></ul>');
                        if ( $tags_list ):
                    ?>
                    <div class="tags"><h4>Tags</h4> <?php echo $tags_list; ?></div>
                    <?php endif; ?>
                    </div>
				</div>

				<div class="article-body">
                <h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="date"><?php echo get_the_date('M j Y'); ?></div>

					<div class="article-content">
						<?php the_content(); ?>
					</div>
                </div>
                
                <section class="article-footer">
                	<span class="previous-article"><?php previous_post_link( 'Previous post: %link'); ?></span>
                	<span class="next-article"><?php next_post_link( 'Next post: %link'); ?></span>
                </section>
			</article>

				

				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
			</div>
		</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
