<?php if( is_page(179) ) : // things to do at Rosedale ?>
<aside class="upcoming">
    <header>
        <h2>View Our Tours</h2>
    </header>
    <div class="tours-butn-wrap">
        <a class="button" href="<?php bloginfo('url');?>/tours">
            Tours
        </a><!--.link-->
    </div>
</aside>
<?php elseif ( is_page(60) ) : ?>
<aside class="upcoming">
    <header>
        <h2>View Our Hours &amp; Directions</h2>
    </header>
    <div class="tours-butn-wrap">
        <a class="button" href="<?php bloginfo('url');?>/visit/hours-directions/">
            Hours &amp; Directions
        </a><!--.link-->
    </div>
</aside>
<?php elseif ( is_page(56) ) : ?>
<aside class="upcoming">
    <header>
        <h2>Contact Us</h2>
    </header>
    <div class="tours-butn-wrap">
        <a class="button" href="<?php bloginfo('url');?>/contact/">
            Contact
        </a><!--.link-->
    </div>
</aside>
<?php elseif ( is_page('weddings') ) : ?>
<aside class="upcoming">
    <header>
        <h2>Helpful Wedding Links</h2>
    </header>
    <div class="tours-butn-wrap">
        <a class="button" href="<?php bloginfo('url');?>/plan-an-event/rental-rates/#gardensgroundsrates">
            Gardens &amp; Grounds Rates
        </a><!--.link-->
        <a class="button" href="<?php bloginfo('url');?>/plan-an-event/rental-rates/#photofilmshootrates">
            Photo &amp; Film Shoot Rates
        </a><!--.link-->
    </div>
</aside>
<?php else : endif; ?>

<?php $today = date('Ymd');
$args = array(
    'post_type'=>'event',
    'posts_per_page'=>2,
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
if($query->have_posts()):?>
    <aside class="upcoming">
        <header>
            <h2>Upcoming Events &amp; Programs</h2>
        </header>
        <div class="events clear-bottom">
            <?php while($query->have_posts()):$query->the_post();?>
                <?php $image = get_field("event_image");
                $date = get_field("date");
                $view_text = get_field("view_events_text","option");
                $description = get_field("brief_description");?>
                <section class="event">
                    <header class="js-blocks">
                        <h3><?php the_title();?></h3>
                    </header>
                    <?php if($image):?>
                        <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                    <?php endif;
                    if($date):
                        $display_date = (new DateTime($date))->format('F j, Y');?>
                        <div class="date">
                            <?php echo $display_date;?>
                        </div><!--.date-->
                    <?php endif;?>
                    <?php if($description):?>
                        <div class="description">
                            <?php echo $description;?>
                        </div><!--.description-->
                    <?php endif;
                    if($view_text):?>
                        <a class="button" href="<?php the_permalink();?>">
                            <?php echo $view_text;?>
                        </a><!--.link-->
                    <?php endif;?>
                </section><!--.event-->
            <?php endwhile;?>
        </div><!--.events-->
    </aside><!--.upcoming-->
<?php endif;?>