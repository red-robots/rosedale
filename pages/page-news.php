<?php
/**
 * Template Name: News
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : the_post(); 

			$banner = get_field("image");
			$boxes = get_field("boxes");

			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class("template-boxes"); ?>>
			    <?php 
			    if($banner):?>
			        <div class="banner">
			            <img src="<?php echo $banner['url'];?>" alt="<?php echo $banner['alt'];?>">
			        </div><!--.banner-->
			    <?php endif;?>
			    <?php //get_template_part('template-parts/nav-bar');?>
			    <div class="wrapper cap internal">
			        <section class="row-2">
			            <header>
			                <h1><?php the_title();?></h1>
			            </header>
			            <div class="copy">
			                <?php the_content();?>
			            </div><!--.copy-->
			        </section><!--.row-2-->

			    <?php endif; // End of the loop.?>

			       
	        	<?php 
	        	$i=0;
	        	$wp_query = new WP_Query();
					$wp_query->query(array(
					'post_type'=>'post',
					'posts_per_page' => 10,
					'paged' => $paged,
				));
					if ($wp_query->have_posts()) : ?>
					 <section class="news-articles">
					 <?php while ($wp_query->have_posts()) : $wp_query->the_post(); $i++;

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
				 						the_post_thumbnail('postthumb');
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
					 	
					 <?php endwhile; ?>
			        </section>
			    <?php endif; ?>

<div class="clear"></div>

			        <?php 
			        if($boxes):?>
			            <div class="row-3 boxes clear-bottom">
			                <?php $i = 0;
			                foreach($boxes as $box):
			                    $image = $box['image'];
			                    $title = $box['title'];
			                    $link = $box['link'];?>
			                    <?php if($image&&$box&&$link):?>
			                        <a href="<?php echo $link;?>" class="js-blocks <?php if($i%3==0) echo "first";?> <?php if(($i+1)%3==0) echo "last";?>">
			                            <img src="<?php echo $image['sizes']['postthumb'];?>" alt="<?php echo $image['alt'];?>">
			                            <h2><?php echo $title;?></h2>
			                        </a>
			                        <?php $i++;
			                    endif;?>
			                <?php endforeach;?>
			            </div><!--.row-3-->
			            
			        <?php endif;?>
			        <?php get_template_part( 'template-parts/upcoming' );?>

			        <div class="calendar-but">
			                <div >
			                    <a class="button" href="<?php bloginfo('url'); ?>/calendar">Full Calendar</a>
			                </div>
			            </div>

			            
			    </div><!--.wrapper-->
			</article><!-- #post-## -->


			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
