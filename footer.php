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
$asc_logo = get_field('asc_logo', 'option');
$asc_logo_link = get_field('asc_logo_link', 'option');
$partners_logo = get_field("partners_logo","option");
?>

	</div><!-- #content -->
	<div class="clear-bottom"></div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="flogos">
			<div class="footer-logos">
				
			</div>
		</div>
		<div class="wrapper cap">
			<div class="col-1 col js-blocks">
				<?php $contact_title = get_field("contact_title","option");
				$address_line_1 = get_field("address_line_1","option");
				$address_line_2 = get_field("address_line_2","option");
				$phone = get_field("phone_number","option");
				$tumblr_link = get_field("tumblr_link","option");
				$facebook_link = get_field("facebook_link","option");
				$flickr_link = get_field("flickr_link","option");
				$instagram_link = get_field("instagram_link","option");
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
				if($tumblr_link||$facebook_link||$flickr_link):?>
					<div class="social">
						<?php if($tumblr_link):?>
							<a target="_blank" href="<?php echo $tumblr_link;?>">
								<i class="fa fa-tumblr"></i>
							</a>
						<?php endif;?>
						<?php if($facebook_link):?>
							<a target="_blank" href="<?php echo $facebook_link;?>">
								<i class="fa fa-facebook"></i>
							</a>
						<?php endif;?>
						<?php if($flickr_link):?>
							<a target="_blank" href="<?php echo $flickr_link;?>">
								<i class="fa fa-flickr"></i>
							</a>
						<?php endif;?>
						<?php if($instagram_link):?>
							<a target="_blank" href="<?php echo $instagram_link;?>">
								<i class="fa fa-instagram"></i>
							</a>
						<?php endif;?>
					</div><!--.social-->
				<?php endif;?>
			</div><!--.row-1-->
			<div class="col-2 col js-blocks">
				<?php $map = get_field("map","option");
				if($map):?>
					<?php echo $map;?>
				<?php endif;?>
			</div><!--.row-2-->
			<div class="col-3 col js-blocks">
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

				<?php if( $asc_logo ) { ?>
					<div class="acs">
						<?php if( $asc_logo_link ) { ?>
							<a href="<?php echo $asc_logo_link; ?>">
						<?php } ?>
							<img src="<?php echo $asc_logo['sizes']['medium'];?>" alt="<?php echo $asc_logo['alt'];?>">
						<?php if( $asc_logo_link ) { echo '</a>'; } ?>
					</div>
				<?php } ?>


			</div><!--.row-3-->
			<div class="col-4 col clear-bottom js-blocks">
				
				

				<div class="other-logos">
					<?php 
				if($partners_logo):?>
					<?php foreach($partners_logo as $row):
						$logo = $row['partner_logo'];
						$link = $row['partner_website'];
						if($logo):?>
							<div>
							<?php if($link):?>
								<a href="<?php echo $link;?>">
							<?php endif;?>
									<img src="<?php echo $logo['sizes']['medium'];?>" alt="<?php echo $logo['alt'];?>">
							<?php if($link):?>
								</a>
							<?php endif;?>
							</div>
						<?php endif;
					endforeach;?>
				<?php endif;?>
				</div>


			</div><!--.row-4-->
		</div><!--.wrapper-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
