<?php
/**
 * The main template
 *
 * This is used as the default file if no other alternitive is specified
 *
 */
 get_header();
?>
		<div id="content">
			<?php // This is the start of our loop ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="title"><?php if( !is_singular() ){ ?>
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a><?php
					}else{
					the_title(); }?>
				</h2>
				<div class="post-content"><?php the_content(); ?></div>
			</article>
			<?php endwhile; // End the loop ?>				
		</div>

<?php 
get_footer();
?>