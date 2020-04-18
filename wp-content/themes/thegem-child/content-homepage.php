<?php
    if(have_rows('carousel_slider','option')){
        while(have_rows('carousel_slider','option')){
            the_row();
                echo do_shortcode(''.get_sub_field('slick_shortcode').'');
        }
    }
?>