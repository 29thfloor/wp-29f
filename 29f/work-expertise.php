<?php

 
 get_header(); ?>

<section id="work">
        
        <ul id="work-nav">
        <li>
        <ul id="category-links" class="work-type"><li class="view-all-cat current-cat"><a href="/work">View All Work</a></li><?php wp_list_categories( array('show_option_all' => '', 'title_li' => '', 'taxonomy' => '29f_worktype', 'current_category' => 0)); ?></ul>
		</li>
        <li>
        <form>
        	<label>Expertise</label>
            <select name="tag-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
            <option value='/work'>All</option>
            <?php
            $taxonomies = array('expertise');
            $args = array('orderby'=>'name');
            echo get_terms_dropdown($taxonomies, $args);
            ?>
            </select>
        </form>
        </li>
        </ul>
        <ol id="work-list">
<?php /* Loop Start */ ?>
<?php $loop = new WP_Query( array( 'post_type' => 'work', 'posts_per_page' => -1 ) );
	while ( $loop->have_posts() ) : $loop->the_post(); ?>

<?php /* How to display all other posts. */ ?>
	
		<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 	
        	<article>
            	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_post_thumbnail( 'work-thumbnail', array('class' => 'work-thumb') ); ?> <span><?php the_title(); ?></span></a></h2>
			</article>
		</li>

		<?php endwhile; // End the loop. Whew. ?>
		</ol>
</section>

<?php get_footer(); ?>