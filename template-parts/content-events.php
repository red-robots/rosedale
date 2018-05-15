<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-events"); ?>>
    <?php $banner = get_field("image");
    if($banner):?>
        <div class="banner">
            <img src="<?php echo $banner['url'];?>" alt="<?php echo $banner['alt'];?>">
        </div><!--.banner-->
    <?php endif;?>
    <?php $parent = wp_get_post_parent_id(get_the_ID())==0?get_the_ID():wp_get_post_parent_id(get_the_ID());?>
    <div class="row-1">    
        <div class="wrapper cap">
            <?php $args = array(
                'post_parent'=>$parent,
                'posts_per_page'=>-1,
                'post_type'=>'page'
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
                <?php wp_reset_postdata();
            endif;?>
        </div><!--.wrapper-->
    </div><!--.row-1-->
    <div class="wrapper cap internal">
        <section class="row-2">
            <header>
                <h1><?php the_title();?></h1>
            </header>
            <div class="copy">
                <?php the_content();?>
            </div><!--.copy-->
        </section><!--.row-2-->
        <?php $args = array(
            'post_type'=>'event',
            'posts_per_page'=>-1,
            'orderby'=>'meta_value_num',
            'meta_key'=>'date',
            'order'=>'DESC',
            'meta_query'=>array(
                'key'=>'date',
                'value'=>$today,
                'compare'=>'>=',
                'type'=>'NUMERIC'
            )
        );
        $query = new WP_Query($args);
        if($query->have_posts()):?>
            <div class="events clear-bottom row-3">
                <?php while($query->have_posts()):$query->the_post();?>
                    <?php $image = get_field("event_image");
                    $date = get_field("date");
                    $view_text = get_field("view_events_text","option");
                    $description = get_field("brief_description");?>
                    <section class="event js-blocks">
                        <header>
                            <h3><?php the_title();?></h3>
                        </header>
                        <?php if($image):?>
                            <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                        <?php endif;
                        if($date):?>
                            <div class="date">
                                <?php echo $date;?>
                            </div><!--.date-->
                        <?php endif;?>
                        <div class="description">
                            <?php if($description):?>
                                    <?php echo $description;?>
                            <?php endif;?>
                        </div><!--.description-->
                        <?php if($view_text):?>
                            <a class="button" href="<?php the_permalink();?>">
                                <?php echo $view_text;?>
                            </a><!--.link-->
                        <?php endif;?>
                    </section><!--.event-->
                <?php endwhile;?>
            </div><!--.events-->
        <?php endif;?>
    </div><!--.wrapper-->
</article><!-- #post-## -->
