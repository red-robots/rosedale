<?php $args = array(
    'post_type'=>'event',
    'posts_per_page'=>2,
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
if($query->have_posts()):?>
    <aside class="upcoming">
        <header>
            <h2>Upcoming</h2>
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
                    if($date):?>
                        <div class="date">
                            <?php echo $date;?>
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