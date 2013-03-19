<?php
/**
 * The single post/page template
 */
 get_header();
?>
		<div id="content">
			<?php // This is the start of our loop ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="title"><?php the_title(); ?></a></h2>
				<div class="post-content"><?php the_content(); ?><div class='pagenavi pagenavi-top'> <?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?> </div></div>
				<div class="post-meta"><small>This entry was posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?> and is filed under <?php the_category(', ') ?>. You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed.</small>
				</div>
				<nav class="single-nav">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'themedev' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themedev' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themedev' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->
				<div class="clearfix"></div>
				
			</article>
			<?php endwhile; // End the loop ?>				
		</div>

<?php 
get_footer();
?>