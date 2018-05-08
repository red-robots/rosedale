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
    <?php $banner = get_field("banner");
    if($banner):?>
        <div class="banner">
            <img src="<?php echo $banner['url'];?>" alt="<?php echo $banner['alt'];?>">
        </div><!--.banner-->
    <?php endif;?>
    <div class="wrapper cap">
        <header class="row-1">
            <h1><?php the_title();?></h1>
        </header>
        <?php $date = get_field("date");
        if($date):?>
            <div class="date row-2">
                <?php echo $date;?>
            </div><!--.date-->
        <?php endif;?>
        <div class="row-3 clear-bottom">
            <section class="col-1">
                <?php $event_image = get_field("event_image");
                $time = get_field("time");
                $schedule = get_field("schedule_text","option");
                if($event_image):?>
                    <img class="event" src="<?php echo $event_image['sizes']['large'];?>" alt="<?php echo $event_image['alt'];?>">
                <?php endif;
                if($schedule):?>
                    <div class="schedule">
                        <?php echo $schedule;?>
                    </div><!--.date-time-->
                <?php endif;
                if($date):?>
                    <div class="date-time">
                        <?php echo $date;
                        if($time):
                            echo " - ".$time;
                        endif;?>
                    </div><!--.date-time-->
                <?php endif;?>
                <div class="copy">
                    <?php the_content();?>
                </div><!--.copy-->
                <?php $tickets_text = get_field("tickets_text");
                $tickets_link = get_field("tickets_link");
                if($tickets_link&&$tickets_text):?>
                    <a class="button" href="<?php echo $tickets_link;?>">
                        <?php echo $tickets_text;?>
                    </a>
                <?php endif;?>
            </section><!--.col-1-->
            <aside class="col-2">
                <?php $args = array(
                    'post_type'=>'event',
                    'posts_per_page'=>5,
                    'post__not_in'=>array(get_the_ID()),
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
                if($query->have_posts()):
                    $other_events_text = get_field("other_events_text","option");
                    if($other_events_text):?>
                        <header>
                            <h2><?php echo $other_events_text;?></h2>
                        </header>
                    <?php endif;?>
                    <div class="events">
                        <?php while($query->have_posts()): $query->the_post();?>
                            <?php $date = get_field("date");
                            $description = get_field("brief_description");
                            if($date||$description):?>
                                <div class="event">
                                    <a href="<?php the_permalink();?>">
                                        <?php if($date):?>
                                            <div class="date">
                                                <?php echo $date;?>
                                            </div><!--.date-->
                                        <?php endif;?>
                                        <?php if($description):?>
                                            <div class="copy">
                                                <?php echo $description;?>
                                            </div><!--.copy-->
                                        <?php endif;?>
                                    </a>
                                </div><!--.event-->
                            <?php endif;?>
                        <?php endwhile;?>
                    </div><!--.events-->
                    <?php wp_reset_postdata();
                endif;?>
            </aside><!--.col-2-->
        </div><!--.row-3-->
        <?php get_template_part( 'template-parts/upcoming' );?>
    </div><!--.wrapper-->
</article><!-- #post-## -->
