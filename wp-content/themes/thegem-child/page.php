<?php

get_header(); ?>

<div id="main-content" class="main-content">

<?php
	
	if(is_page(42)){ //new homepage 
		// locate the content-homepage.php
		get_template_part('content','homepage');
		
	}else{
		while ( have_posts() ) : the_post();
			get_template_part( 'content', 'page' );
		endwhile;
	}
	
?>

</div><!-- #main-content -->

<?php
get_footer();