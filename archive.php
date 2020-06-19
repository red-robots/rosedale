<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper cap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		$i=0;
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="news-articles">
				
			
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); $i++;
				if($i==2){
				 	$class='right';
				 	$i=0;
				 } else {
				 	$class='left';
				 }
					 ?>
			<section class="group <?php echo $class; ?> js-blocks">
		 				<div class="image">
		 					<?php if(has_post_thumbnail()) {
		 						the_post_thumbnail();
		 					} else { ?>
		 					<img src="<?php bloginfo('template_url'); ?>/images/default.jpg">
		 					<?php } ?>
		 				</div>
		 				
		 			
		 			<div class="col-2">
		 				<header>
		 					<h2><?php the_title(); ?></h2>
		 				</header>
		 				<?php the_excerpt(); ?>
		 				<div>
		 					<a class="button" href="<?php the_permalink(); ?>">READ MORE</a>
		 				</div>
		 			</div>		
		 		</section>
			<?php endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
