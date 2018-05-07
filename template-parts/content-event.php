<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-event"); ?>>
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
        <?php $date = get_field("date");
        if($date):?>
            <div class="date row-2">
                <?php echo $date;?>
            </div><!--.date-->
        <?php endif;?>
        <div class="row-3">
            <section class="col-1">
                <?php $tickets_text = get_field("tickets_text");
                $tickets_link = get_field("tickets_link");
                if($tickets_link&&$tickets_text):?>
                    <a class="button" href="<?php echo $tickets_link;?>">
                        <?php echo $tickets_text;?>
                    </a>
                <?php endif;?>
            </section><!--.col-1-->
            <aside class="col-2">
            </aside><!--.col-2-->
        </div><!--.row-3-->
        <?php get_template_part( 'template-parts/upcoming' );?>
    </div><!--.wrapper-->
</article><!-- #post-## -->
