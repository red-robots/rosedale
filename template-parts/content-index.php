<?php
/**
 * Template part for displaying page content in index.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-index"); ?>>
    <?php $flexslider = get_field("flexslider");
    if($flexslider):?>
        <div class="flexslider row-1">
            <ul class="slides">
                <?php foreach($flexslider as $slide):?>
                    <?php if($slide['image']):?>
                        <img src="<?php echo $slide['image']['url'];?>" alt="<?php echo $slide['image']['alt'];?>">
                    <?php endif;?>
                <?php endforeach;?>
            </ul><!--.slides-->
        </div><!--.flexslider-->
    <?php endif;?>
    <div class="row-2">
        
    </div><!--.row-2-->
</article><!-- #post-## -->
