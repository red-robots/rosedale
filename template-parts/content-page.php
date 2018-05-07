<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-page"); ?>>
    <?php $banner = get_field("event_image");
    if($banner):?>
        <div class="banner">
            <img src="<?php echo $banner['url'];?>" alt="<?php echo $banner['alt'];?>">
        </div><!--.banner-->
    <?php endif;?>
    <div class="wrapper">
        <header class="row-1">
            <h1><?php the_title();?></h1>
        </header>
        <div class="row-3">
            <section class="col-1">
            </section><!--.col-1-->
            <aside class="col-2">
            </aside><!--.col-2-->
        </div><!--.row-3-->
        <?php get_template_part( 'template-parts/upcoming' );?>
    </div><!--.wrapper-->
</article><!-- #post-## -->
