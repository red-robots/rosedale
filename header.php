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
				if($support_link && $support_text):?>
					<a class="button" href="<?php echo $support_link;?>">
						<?php echo $support_text;?>
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
