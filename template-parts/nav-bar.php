<?php $parent = wp_get_post_parent_id(get_the_ID())==0?get_the_ID():wp_get_post_parent_id(get_the_ID());

// echo '<pre>';
// print_r($parent);
// echo '</pre>';

?>
<div class="nav-bar">    
    <div class="wrapper cap scrollspy">
        <?php if( $parent == 8 ) {
				wp_nav_menu( array( 'theme_location' => 'plan-event') );
        	} elseif( $parent == 10 ) {
        		wp_nav_menu( array( 'theme_location' => 'visit') );
        	} elseif( $parent == 5 ) {
        		wp_nav_menu( array( 'theme_location' => 'visit') );
        	} else {

        	}

		?>
    </div><!--.wrapper-->
</div><!--.row-1-->