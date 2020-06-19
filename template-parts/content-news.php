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
        <div class="row-3 clear-bottom">
            <section class="col-1">
                <div class="copy">
                <?php  if(has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    } ?>
                    <?php the_content();?>
                </div><!--.copy-->
            </section><!--.col-1-->
            <aside class="col-2">
                <!-- edit -->
                <?php 


                if( get_post_type() == 'post' ) {
                    get_sidebar();
                }
                

                $today = date('Ymd');
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
                    </div><!--.events-->
                    <?php wp_reset_postdata();
                endif;?>
                <div class="widget">
                <h2>Sign Up for Our Newsletter</h2>
                    <a class="button" href="https://visitor.r20.constantcontact.com/manage/optin/ea?v=001qpcI2uFx_R6axja6B7Vb3ED78WMHtERqkhj-5TRXAIzILE4rmi9oPBMVSEBtovPyOkLD3CL4M4Y7eqJZOrMt2g%3D%3D" target="_blank">Sign Up</a>
                </div>
            </aside><!--.col-2-->
        </div><!--.row-3-->
        <?php get_template_part( 'template-parts/upcoming' );?>
    </div><!--.wrapper-->
</article><!-- #post-## -->
