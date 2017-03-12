<?php get_header(); ?>

<?php if ( get_post_thumbnail_id() ) { ?>
	<div class="about-me" style="background:url(<?php echo the_post_thumbnail_url(); ?>) no-repeat right center / cover;"></div>
<?php } ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>">

					<div class="page-header text-center">
						<h1><?php the_title(); ?></h1>
					</div>

					<?php the_content(); ?>

				</article>

				<?php endwhile; endif; ?>

<?php get_footer(); ?>