<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found template-boxes">
				<?php $banner = get_field("banner",289);
				if($banner):?>
					<div class="banner">
						<img src="<?php echo $banner['url'];?>" alt="<?php echo $banner['alt'];?>">
					</div><!--.banner-->
				<?php endif;?>
				<div class="wrapper cap internal">
					<section class="row-2">
						<header>
							<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'acstarter' ); ?></h1>
						</header>
						<div class="copy">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below?', 'acstarter' ); ?></p>
							<?php wp_nav_menu( array( 'theme_location' => 'sitemap') ); ?>
						</div><!--.copy-->
					</section><!--.row-2-->
					<?php get_template_part( 'template-parts/upcoming' );?>
				</div><!--.wrapper-->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
