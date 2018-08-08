<?php $parent = wp_get_post_parent_id(get_the_ID())==0?get_the_ID():wp_get_post_parent_id(get_the_ID());

echo '<pre>';
print_r($parent);
echo '</pre>';

?>
<div class="nav-bar">    
    <div class="wrapper cap scrollspy">
        <?php $args = array(
            'post_parent'=>$parent,
            'posts_per_page'=>-1,
            'post_type'=>'page',
            'order' => 'ASC',
            'orderby' => 'title'
        );
        $query = new WP_Query($args);
        if($query->have_posts()):?>
            <ul id="nav"lass="nav hidden-xs hidden-sm" data-spy="affix">
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