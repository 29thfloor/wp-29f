<?php
/**
 * Template for the About page
 * Template Name: About 
 * @package 29th Floor
 * @subpackage 29F
 * @since 29F 1.0
 */
 get_header(); ?>

<section id="about">
	<div id="content" role="main">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if ( is_front_page() ) { ?>
                <h2 class="entry-title"><?php the_title(); ?></h2>
            <?php } else { ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php } ?>

            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content -->
        </article><!-- #post-## -->

<?php endwhile; ?>

    </div><!-- #content -->
    <aside id="sidebar" role="complimentary">
    	<div id="photo"><img src="/wp-content/uploads/2012/01/me29f.jpg" alt="Photo of me" /></div>
        <ul class="links">
        <?php wp_list_bookmarks('title_before=<h5>&title_after=</h5>&orderby=id'); ?>
        </ul>
    </aside>
</section><!-- #container -->

<?php get_footer(); ?>