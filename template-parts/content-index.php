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
                        <li><img src="<?php echo $slide['image']['url'];?>" alt="<?php echo $slide['image']['alt'];?>"></li>
                    <?php endif;?>
                <?php endforeach;?>
            </ul><!--.slides-->
        </div><!--.flexslider-->
    <?php endif;?>
    <div class="row-2">
        <div class="wrapper cap">
            <?php $row_2_title = get_field("row_2_title");
            $events_title = get_field("events_title");
            $news_title = get_field("news_title");
            $events_read_more = get_field("events_read_more");
            $news_read_more = get_field("news_read_more");
            $events_image = get_field("events_image");
            $news_image = get_field("news_image");
            if($row_2_title):?>
                <header class="row-1">
                    <h2><?php echo $row_2_title;?></h2>
                </header>
            <?php endif;?>
            <div class="row-2 clear-bottom">
                <section class="col-1 js-blocks">
                    <?php $today = Date('Ymd');
                    if($events_title):?>
                        <header>
                            <h3><?php echo $events_title;?></h3>
                        </header>
                    <?php endif;
                    if($events_image):?>
                        <img src="<?php echo $events_image['sizes']['postthumb'];?>" alt="<?php echo $events_image['alt'];?>">
                    <?php endif; ?>
                    <?php $args = array(
                        'post_type'=>'event',
                        'posts_per_page'=>3,
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
                    if($query->have_posts()):?>
                        <div class="events">
                            <?php while($query->have_posts()): $query->the_post();?>
                                <?php 
                                //$date = get_field("date");
                                $startdate = get_field("date");
                                $enddate = get_field("enddate");
                                $sdate = ($startdate) ? (new DateTime($startdate))->format('F j, Y') : '';
                                $edate = ($enddate) ? (new DateTime($enddate))->format('F j, Y') : '';

                                $sdate2 = ($startdate) ? (new DateTime($startdate))->format('M j, Y') : '';
                                $edate2 = ($enddate) ? (new DateTime($enddate))->format('M j, Y') : '';

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

                                ?>
                                <div class="event">
                                    <a href="<?php the_permalink();?>"> 
                                        <header>
                                            <?php if($display_date) { ?>
                                                <div class="date">
                                                    <?php echo $display_date;?>
                                                </div><!--.date-->
                                            <?php } ?>
                                            <h4>| <?php the_title();?></h4>
                                        </header>
                                    </a>
                                </div><!--.event-->
                            <?php endwhile;?>
                        </div><!--.events-->
                        <?php wp_reset_postdata();
                    endif;
                    if($events_read_more):?>
                        <a class="button" href="<?php bloginfo('url'); ?>/calendar">
                            <?php echo $events_read_more;?>
                        </a>
                    <?php endif;?>
                </section><!--.col-1-->
                <section class="col-2 js-blocks">
                    <?php if($news_title):?>
                        <header>
                            <h3><?php echo $news_title;?></h3>
                        </header>
                    <?php endif;
                    if($news_image):?>
                        <img src="<?php echo $news_image['sizes']['postthumb'];?>" alt="<?php echo $news_image['alt'];?>">
                    <?php endif; 
                    $args = array(
                        'post_type'=>'post',
                        'posts_per_page'=>1,
                        'orderby'=>'date',
                        'order'=>'DESC',
                    );
                    $query = new WP_Query($args);
                    if($query->have_posts()):?>
                        <div class="news">
                            <?php while($query->have_posts()): $query->the_post();?>
                                <div class="post"> 
                                    <header>
                                        <h4><?php the_title();?></h4>
                                    </header>
                                    <div class="copy">
                                        <?php the_excerpt();?>
                                    </div><!--.copy-->
                                </div><!--.post-->
                            <?php endwhile;?>
                        </div><!--.news-->
                        <?php if($news_read_more):?>
                            <a class="button" href="<?php echo get_permalink();?>">
                                <?php echo $news_read_more;?>
                            </a>
                        <?php endif;?>
                        <?php $post = get_post(84);
                        if($post):
                            setup_postdata($post);
                        endif;
                    endif;?>
                </section><!--.col-2-->
            </div><!--.row-2-->
        </div><!--.wrapper-->
    </div><!--.row-2-->
    <?php $sections = get_field("sections");
    if($sections):?>
        <div class="row-3">
            <div class="wrapper cap">
                <?php $i=0;
                foreach($sections as $section):?>
                    <section class="group <?php if($i%2==0) echo "left";?>">
                        <?php $image = $section['image'];
                        $title = $section['title'];
                        $picker = $section['picker'];
                        if($title):?>
                            <div class="col-1">
                                <?php if($image):?>
                                    <div class="image" style="background-image: url(<?php echo $image['sizes']['large'];?>);"></div>
                                <?php endif;?>
                                <header>
                                    <h2><?php echo $title;?></h2>
                                </header>
                            </div><!--.col-1-->
                        <?php endif;
                        if($picker):?>
                            <div class="col-2">
                                <?php foreach($picker as $cpt):
                                    $title = $cpt['title'];
                                    $description = $cpt['description'];
                                    $link = $cpt['link'];
                                    if($link&&$title):?>
                                        <div class="row custom-post-type">
                                            <a href="<?php echo $link;?>">
                                                <header>
                                                    <h3><?php echo $title;?></h3>
                                                </header>
                                                <?php if($description):?>
                                                    <div class="copy">
                                                        <?php echo $description;?>
                                                    </div><!--.copy-->
                                                <?php endif;?>
                                            </a>
                                        </div><!--.custom-post-type-->
                                    <?php endif;
                                endforeach;?>
                            </div><!--.col-2-->
                        <?php endif; ?>
                    </section>
                <?php $i++;
                endforeach; ?>
            </div><!--.wrapper-->
        </div><!--.row-3-->
    <?php endif; 
    $title = get_field("about_title");
    $description = get_field("about_description");
    if($title&&$description):?>
        <div class="row-4 floatl fullwidthWrap">
            <div class="wrapper cap">
                <div class="aboutleft">
                    <section class="home-about">
                        <header>
                            <h2><?php echo $title;?></h2>
                        </header>
                        <div class="copy">
                            <?php echo $description;?>
                        </div><!--.copy-->
                        <a href="<?php bloginfo('url'); ?>/about/rosedale-today" class="button spacer">
                            Learn More
                        </a>
                    </section>
                </div>
                <div class="aboutright">
                    <div class="embed-container">
                        <?php the_field('video'); ?>
                    </div>
                </div>
                
            </div><!--.wrapper-->
        </div><!--.row-4-->
    <?php endif;?>
</article><!-- #post-## -->
