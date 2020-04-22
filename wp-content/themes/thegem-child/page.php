<?php

get_header(); ?>

<div id="main-content" class="main-content">

<?php
	
	if(is_page(42)){ //new homepage 
		// locate the content-homepage.php
		get_template_part('content','homepage');
		
	}else if(is_page(167)){
		get_template_part('content','support');
	}else if(is_page(169)){
		get_template_part('content','about');
	}else if(is_page(194)){
		get_template_part('content','bestselling');
	}else if(is_page(191)){
		get_template_part('content','newarrival');
	}else{
		while ( have_posts() ) : the_post();
			get_template_part( 'content', 'page' );
		endwhile;
	}
	
?>

</div><!-- #main-content -->

<?php
get_footer();