<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-boxes"); ?>>
    <div class="row-1">    
        <div class="wrapper">
            <?php $args = array(
                'post_parent'=>wp_get_post_parent_id(get_the_ID()),
                'posts_per_page'=>-1,
                'post_type'=>'page',
                'post__not_in'=>array(get_the_ID())
            );
            $query = new WP_Query($args);
            if($query->have_posts()):?>
                <ul>
                    <?php while($query->have_posts()):$query->the_post();?>
                        <li>
                            <a href="<?php the_permalink();?>">
                                <?php the_title();?>
                            </a>
                        </li>
                    <?php endwhile;?>
                </ul>
            <?php endif;?>
        </div><!--.wrapper-->
    </div><!--.row-1-->
    <div class="wrapper">
        <section class="row-2">
            <header>
                <h1><?php the_title();?></h1>
            </header>
            <div class="copy">
                <?php the_content();?>
            </div><!--.copy-->
        </section><!--.row-2-->
        <?php $boxes = get_field("boxes");
        if($boxes):?>
            <div class="row-3 boxes">
                <?php foreach($boxes as $box):
                    $image = $box['image'];
                    $title = $box['title'];
                    $link = $box['link'];?>
                    <?php if($image&&$box&&$link):?>
                        <a href="<?php echo $link;?>">
                            <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                            <h2><?php echo $title;?></h2>
                        </a>
                    <?php endif;?>
                <?php endforeach;?>
            </div><!--.row-3-->
        <?php endif;?>
    </div><!--.wrapper-->
</article><!-- #post-## -->
