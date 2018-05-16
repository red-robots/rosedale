<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-two-col"); ?>>
    <?php $banner = get_field("banner");
    if($banner):?>
        <div class="banner">
            <img src="<?php echo $banner['url'];?>" alt="<?php echo $banner['alt'];?>">
        </div><!--.banner-->
    <?php endif;?>
    <?php get_template_part('template-parts/nav-bar');?>
    <div class="wrapper cap-nopad">
        <div class="wrapper cap internal">
            <header class="row-1">
                <h1><?php the_title();?></h1>
            </header>
            <?php $sections = get_field("sections");?>
            <div class="row-2 clear-bottom">
                <div class="col-1">
                    <section class="copy">
                        <?php the_content();?>
                    </section><!--.copy-->
                </div><!--.col-1-->
                <aside class="col-2">
                    <?php $col_2 = get_field("col_2");
                    if($col_2):?>
                        <div class="copy">
                            <?php echo $col_2;?>
                        </div><!--.copy-->
                    <?php endif;?>
                </aside><!--.col-2-->
            </div><!--.row-3-->
            <?php get_template_part( 'template-parts/upcoming' );?>
        </div><!--.wrapper-->
    </div><!--.wrapper-->
</article><!-- #post-## -->
