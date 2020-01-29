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
    <div class="wrapper cap internal">
        <header class="row-1">
            <h1><?php the_title();?></h1>
        </header>
        <?php 
        $startdate = get_field("date");
        $enddate = get_field("enddate");
        $sdate = ($startdate) ? (new DateTime($startdate))->format('F j, Y') : '';
        $edate = ($enddate) ? (new DateTime($enddate))->format('F j, Y') : '';
        $theDates = array($sdate,$edate);
        $display_date = '';
        if( $theDates && array_filter($theDates)  ) {
            $display_date = implode( " &ndash; ", array_filter($theDates) );
            $month_startdate = date("m",strtotime($sdate));
            $year_startdate = date("Y",strtotime($sdate));

            $month_enddate = date("m",strtotime($enddate));
            $year_enddate = date("Y",strtotime($enddate));
            if( ($month_startdate==$month_enddate) &&  ($year_startdate==$year_enddate) ) {
                $display_date = date("M",strtotime($sdate)) . ' ' . date("d",strtotime($sdate)) . ' &ndash; ' . date("d",strtotime($enddate)) . ', ' . $year_enddate;
            } 
            else if( ($month_startdate!=$month_enddate) &&  ($year_startdate==$year_enddate) ) {
                $display_date = date("M",strtotime($sdate)) . ' ' . date("d",strtotime($sdate)) . ' &ndash; ' . date("M",strtotime($enddate)) . ' ' . date("d",strtotime($enddate)) . ', ' . $year_enddate;
            }
        }

        if($display_date):
            //$display_date = (new DateTime($date))->format('F j, Y'); ?>
            <div class="date row-2">
                <?php echo $display_date;?>
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
                        <?php echo $display_date;
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
            
                <?php $today = date('Ymd');
                $args = array(
                    'post_type'=>'event',
                    'posts_per_page'=>5,
                    'post__not_in'=>array(get_the_ID()),
                    'orderby'=>'meta_value_num',
                    'meta_key'=>'date',
                    'order'=>'ASC',
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
                            <?php $date = get_field("date");?>
                            <div class="event">
                                <a href="<?php the_permalink();?>">
                                    <?php if($date):
                                        $display_date = (new DateTime($date))->format('F j, Y');?>
                                        <div class="date">
                                            <?php echo $display_date;?>
                                        </div><!--.date-->
                                    <?php endif;?>
                                    <div class="copy">
                                        <?php the_title();?>
                                    </div><!--.copy-->
                                </a>
                            </div><!--.event-->
                        <?php endwhile;?>
                        <div class="sideevent">
                <div >
                    <a class="button" href="<?php bloginfo('url'); ?>/calendar">Full Calendar</a>
                </div>
            </div>
                    </div><!--.events-->
                    <?php wp_reset_postdata();
                endif;?>
            </aside><!--.col-2-->
        </div><!--.row-3-->
    </div><!--.wrapper-->
</article><!-- #post-## -->
