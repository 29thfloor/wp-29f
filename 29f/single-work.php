<?php
/**
 * The Template for displaying the "work" custom post type.
 *
 * @package 29th Floor
 * @subpackage 29F
 * @since 29F 1.0
 */

get_header(); ?>

<section id="work">
    <div id="content" role="main">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php the_content(); ?>
        <p class="back"><a href="/work" title="Back to Work">&laquo; Back</a></p>
    </article>

    <?php endwhile; // end of the loop. ?>
    </div>
</section>

<?php get_footer(); ?>
