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
    <?php get_template_part('template-parts/nav-bar');?>
    <div class="wrapper cap internal">
        <section class="row-2">
            <header>
                <h1><?php the_title();?></h1>
            </header>
            <div class="copy">
                <?php the_content();?>
            </div><!--.copy-->
        </section><!--.row-2-->
        <?php $today = date('Ymd');
        $args = array(
            'post_type'=>'event',
            'posts_per_page'=>-1,
            'orderby'=>'meta_value_num',
            'meta_key'=>'date',
            'order'=>'ASC',
            // 'meta_query'=>array(
            //     'key'=>'date',
            //     'value'=>$today,
            //     'compare'=>'>=',
            //     'type'=>'NUMERIC'
            // )
        );
        $query = new WP_Query($args);
        if($query->have_posts()):?>
            <div class="events clear-bottom row-3">
                <?php while($query->have_posts()):$query->the_post();?>
                    <?php $image = get_field("event_image");
                    $startdate = get_field("date");
                    $enddate = get_field("enddate");
                    $sdate = ($startdate) ? (new DateTime($startdate))->format('F j, Y') : '';
                    $edate = ($enddate) ? (new DateTime($enddate))->format('F j, Y') : '';
                    $theDates = array($sdate,$edate);
                    $display_date = '';
                    if( $theDates && array_filter($theDates)  ) {
                        $display_date = implode(" &ndash; ",array_filter($theDates));
                        $day_startdate = date("d",strtotime($sdate));
                        $month_startdate = date("m",strtotime($sdate));
                        $year_startdate = date("Y",strtotime($sdate));

                        $day_enddate = date("d",strtotime($edate));
                        $month_enddate = date("m",strtotime($edate));
                        $year_enddate = date("Y",strtotime($edate));
                        if( ( ($month_startdate==$month_enddate) &&  ($year_startdate==$year_enddate) ) &&  $day_startdate!=$day_enddate ) {
                            $display_date = date("F",strtotime($sdate)) . ' ' . date("d",strtotime($sdate)) . ' &ndash; ' . date("d",strtotime($edate)) . ', ' . $year_enddate;
                        }
                        else if( ($month_startdate==$month_enddate) &&  ($day_startdate==$day_enddate) && ($year_startdate==$year_enddate) ) {
                            $display_date = date("F",strtotime($sdate)) . ' ' . date("d",strtotime($sdate)) . ', ' . $year_startdate;
                        } 
                        else if( ($month_startdate!=$month_enddate) &&  ($year_startdate==$year_enddate) ) {
                            $display_date = date("F",strtotime($sdate)) . ' ' . date("d",strtotime($sdate)) . ' &ndash; ' . date("F",strtotime($edate)) . ' ' . date("d",strtotime($edate)) . ', ' . $year_enddate;
                        }
                        // else if( ( ($month_startdate==$month_enddate) &&  ($day_startdate==$day_enddate) ) && $year_startdate!=$year_enddate ) {
                        //     $display_date = date("M",strtotime($sdate)) . ' ' . date("d",strtotime($sdate)) . ', ' . date("Y",strtotime($sdate)) . ' &ndash; ' . date("M",strtotime($edate)) . ' ' . date("d",strtotime($edate)) . ', ' . $year_enddate;
                        // }
                        
                    }
                    $view_text = get_field("view_events_text","option");
                    $description = get_field("brief_description");?>
                    <section class="event js-blocks-nouse">
                        <header>
                            <h3>
                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                            </h3>
                        </header>
                        <?php if($image):?>
                            <a href="<?php the_permalink();?>">
                                <img src="<?php echo $image['sizes']['postthumb'];?>" alt="<?php echo $image['alt'];?>">
                            </a>
                        <?php endif;
                        if($display_date): ?>
                            <div class="date">
                                <?php echo $display_date;?>
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


    <div class="sideevent">
                <div style="text-align: center;">
                    <a class="button" href="<?php bloginfo('url'); ?>/calendar">Full Calendar</a>
                </div>
            </div>
    
</article><!-- #post-## -->
