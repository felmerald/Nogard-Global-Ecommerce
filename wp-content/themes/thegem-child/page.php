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
	}else if(is_page(304)){
		get_template_part('content','faq');
	}else if(is_page(311)){
		get_template_part('content','termsofservices');
	}else if(is_page(314)){
		get_template_part('content','customerservice');
	}else if(is_page(135)){
		get_template_part('content','ordertracking');
	}else if(is_page('327')){
		get_template_part('content','directory');
	}else if(is_page(331)){
		get_template_part('content','delivery');
	}else{
		while ( have_posts() ) : the_post();
			get_template_part( 'content', 'page' );
		endwhile;
	}
	
?>

</div><!-- #main-content -->

<?php
get_footer();