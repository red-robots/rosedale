<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-history"); ?>>
    <?php $banner = get_field("banner");
    if($banner):?>
        <div class="banner">
            <img src="<?php echo $banner['url'];?>" alt="<?php echo $banner['alt'];?>">
        </div><!--.banner-->
    <?php endif;?>
    <div class="wrapper cap-nopad">
        <div class="wrapper cap internal">
            <header class="row-1">
                <h1><?php the_title();?></h1>
            </header>
            <?php $sections = get_field("sections");?>
            <div class="row-2 clear-bottom">
                <aside class="col-2">
                    <?php if($sections):?>
                        <ul>
                            <?php foreach($sections as $section):
                                $title = $section['title'];
                                if($title):?>
                                    <li>
                                        <a href="#<?php echo strtolower(preg_replace('/[^0-9A-Za-z]/','',sanitize_title_with_dashes($title)));?>">
                                            <?php echo $title;?>
                                        </a>
                                    </li>
                                <?php endif;
                            endforeach;?>
                        </ul>
                    <?php endif;?>
                </aside><!--.col-2-->
                <div class="col-1">
                    <?php if($sections):?>
                        <div class="sections">
                            <?php foreach($sections as $section):
                                $title = $section['title'];
                                $copy = $section['copy'];
                                if($title||$copy):?>
                                    <section class="section">
                                        <?php if($title):?>
                                            <a name="<?php echo strtolower(preg_replace('/[^0-9A-Za-z]/','',sanitize_title_with_dashes($title)));?>"></a>
                                            <header>
                                                <h2><?php echo $title;?></h2>
                                            </header>
                                        <?php endif;
                                        if($copy):?>
                                            <div class="copy">
                                                <?php echo $copy;?>
                                            </div><!--.copy-->
                                        <?php endif;?>
                                    </section><!--.section-->
                                <?php endif;
                            endforeach;?>
                        </div><!--.sections-->
                    <?php endif;?>
                </div><!--.col-1-->
            </div><!--.row-3-->
            <?php get_template_part( 'template-parts/upcoming' );?>
        </div><!--.wrapper-->
    </div><!--.wrapper-->
</article><!-- #post-## -->
