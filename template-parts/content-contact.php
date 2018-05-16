<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-contact"); ?>>
    <?php $banner = get_field("banner");
    if($banner):?>
        <div class="banner">
            <img src="<?php echo $banner['url'];?>" alt="<?php echo $banner['alt'];?>">
        </div><!--.banner-->
    <?php endif;?>
    <?php get_template_part('template-parts/nav-bar');?>
    <div class="wrapper cap-nopad">
        <div class="wrapper cap internal">
            <header class="row-1">
                <h1><?php the_title();?></h1>
            </header>
            <?php $sections = get_field("sections");?>
            <div class="row-2 clear-bottom">
                <div class="col-1">
                    <section class="copy">
                        <?php the_content();?>
                    </section><!--.copy-->
                    <?php $staff = get_field("staff");
                    if($staff):?>
                        <section class="staff">
                            <?php $staff_title = get_field("staff_title");
                            if($staff_title):?>
                                <header>
                                    <h2><?php echo $staff_title;?></h2>
                                </header>
                            <?php endif;?>
                            <?php foreach($staff as $row):?>
                                <?php $title = $row['title'];
                                $name = $row['name'];
                                $email = $row['email'];
                                if($name):?>
                                    <div class="member">
                                        <?php if($title):?>
                                            <div class="title">
                                                <?php echo $title;?>
                                            </div><!--.title-->
                                        <?php endif;?>
                                        <h3><?php echo $name;?></h3>
                                        <?php if($email):?>
                                            <a class="email" href="mailto:<?php echo $email;?>"><?php echo $email;?></a>
                                        <?php endif;?>
                                    </div><!--.member-->
                                <?php endif;?>
                            <?php endforeach;?>
                        </section><!--.staff-->
                    <?php endif;?>
                </div><!--.col-1-->
                <aside class="col-2">
                    <?php $map = get_field("map");
                    $form = get_field("form");
                    if($map):?>
                        <div class="map">
                            <?php echo $map;?>
                        </div><!--.map-->
                    <?php endif;
                    if($form):?>
                        <div class="form">
                            <?php echo $form;?>
                        </div><!--.form-->
                    <?php endif;?>
                </aside><!--.col-2-->
            </div><!--.row-3-->
            <?php get_template_part( 'template-parts/upcoming' );?>
        </div><!--.wrapper-->
    </div><!--.wrapper-->
</article><!-- #post-## -->
