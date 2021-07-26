<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'> -->

<link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">

<?php wp_head(); ?>

<script type="de8c27cdd751fb9d1ded4358-text/javascript">var _gaq=[['_setAccount','UA-27981522-1'],['_trackPageview'],['_trackPageLoadTime']];(function(d,t){
var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
g.async=1;g.src='//www.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)
}(document,'script'))</script>


</head>

<body <?php body_class(); ?> ata-spy="scroll" data-target=".scrollspy">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="row-1">
			<div class="wrapper cap-nopad">
				<?php $phone = get_field("phone_number","option");
				$address_line_1 = get_field("address_line_1","option");
				$address_line_2 = get_field("address_line_2","option");
				$support_text = get_field("support_text","option");
				$support_link = get_field("support_link","option");
				$ex_text = get_field("extra_button_text","option");
				$ex_link = get_field("extra_button_link","option");
				if($support_link && $support_text):?>
					<a class="button" href="<?php echo $support_link;?>">
						<?php echo $support_text;?>
					</a>
				<?php endif;
				if($ex_text && $ex_link):?>
					<a class="button" href="<?php echo $ex_link;?>">
						<?php echo $ex_text;?>
					</a>
				<?php endif;
				if($address_line_1 && $address_line_2):?>
					<div class="address">
						<?php echo $address_line_1."&nbsp;|&nbsp;".$address_line_2;?>
					</div><!--.address-->
				<?php endif;
				if($phone):?>
					<div class="phone">
						<?php echo $phone;?>
					</div><!--.phone-->
				<?php endif;?>
			</div><!--.wrapper-->
		</div><!--.row-1-->
		<div class="row-2">
			<div class="wrapper cap-nopad">
				<nav id="site-navigation" class="main-navigation mobile-nav">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"> MENU
					<nav role="navigation">
					  <div id="menuToggle">
					    <!--
					    A fake / hidden checkbox is used as click reciever,
					    so you can use the :checked selector on it.
					    -->
					    <input type="checkbox" />
					    
					    <!--
					    Some spans to act as a hamburger.
					    
					    They are acting like a real hamburger,
					    not that McDonalds stuff.
					    -->
					    <span></span>
					    <span></span>
					    <span></span>
					    
					    <!--
					    Too bad the menu has to be inside of the button
					    but hey, it's pure CSS magic.
					    -->
					    <ul id="menu"></ul>
					  </div>
					</nav>
				</button>
					<?php wp_nav_menu( array( 'theme_location' => 'mobile-nav' ) ); ?>
				</nav>
				<nav class="left-nav" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'left-nav' ) ); ?>
				</nav><!-- .left-nav -->
				<?php if(is_home()): ?>
					<h1 class="logo">
						<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.png";?>" alt="<?php bloginfo('name'); ?>"></a>
					</h1>
				<?php else: ?>
					<div class="logo">
						<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.png";?>" alt="<?php bloginfo('name'); ?>"></a>
					</div>
				<?php endif; ?>
				<nav class="right-nav" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'right-nav') ); ?>
				</nav><!-- .right-nav -->
			</div><!-- wrapper -->
		</div><!--.row-2-->
	</header><!-- #masthead -->

	<div id="content" class="site-content wrapper">
