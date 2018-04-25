<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper cap">
			<div class="row-1">
				<?php $contact_title = get_field("contact_title","option");
				$address_line_1 = get_field("address_line_1","option");
				$address_line_2 = get_field("address_line_2","option");
				$phone = get_field("phone_number","option");
				$tumblr_link = get_field("tumblr_link","option");
				$facebook_link = get_field("facebook_link","option");
				if($contact_title):?>
					<header>
						<h2><?php echo $contact_title;?></h2>
					</header>
				<?php endif;
				if($address_line_1&&$address_line_2):?>
					<div class="address-line-1">
						<?php echo $address_line_1;?>
					</div><!--.address-line-1-->
					<div class="address-line-2">
						<?php echo $address_line_2;?>
					</div><!--.address-line-2-->
				<?php endif;
				if($phone):?>
					<div class="phone">
						<?php echo $phone;?>
					</div><!--.phone-->
				<?php endif;
				if($tumblr_link||$facebook_link):?>
					<div class="social">
						<?php if($tumblr_link):?>
							<a href="<?php echo $tumblr_link;?>">
								<i class="fa fa-tumblr"></i>
							</a>
						<?php endif;?>
						<?php if($facebook_link):?>
							<a href="<?php echo $facebook_link;?>">
								<i class="fa fa-facebook"></i>
							</a>
						<?php endif;?>
					</div><!--.social-->
				<?php endif;?>
			</div><!--.row-1-->
			<div class="row-2">
				<?php $map = get_field("map","option");
				if($map):?>
					<?php echo $map;?>
				<?php endif;?>
			</div><!--.row-2-->
			<div class="row-3">
				<?php $hours_title = get_field("hours_title","option");
				$hours_copy = get_field("hours_copy","option");
				if($hours_title):?>
					<header>
						<h2><?php echo $hours_title;?></h2>
					</header>
				<?php endif;
				if($hours_copy):?>
					<div class="hours copy">
						<?php echo $hours_copy;?>
					</div><!--.hours copy-->
				<?php endif;?>
			</div><!--.row-3-->
			<div class="row-4">
				<?php $partners_logo = get_field("partners_logo","option");
				if($partners_logo):?>
					<img src="<?php echo $partners_logo['sizes']['medium'];?>" alt="<?php echo $partners_logo['alt'];?>">
				<?php endif;?>
			</div><!--.row-4-->
		</div><!--.wrapper-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
