<?php
    $this_animation = array(
        'data-aos="fade-up" data-aos-duration="3000"', //0
        'data-aos="fade-right" data-aos-anchor-placement="bottom-bottom"', //1
        'ata-aos="fade-left" data-aos-anchor-placement="bottom-bottom"'//2
    );
    $this_duration = array(
        'data-aos-delay="300"', //0
        'data-aos-delay="400"', //1
        'data-aos-delay="500"', //2
        'data-aos-delay="600"', //3
        'data-aos-delay="700"' //4
    );
    if(have_rows('carousel_slider','option')){
        while(have_rows('carousel_slider','option')){
            the_row();
                echo do_shortcode(''.get_sub_field('slick_shortcode').'');
        }
    }
?>

<?php
    if(have_rows('homepage_builder_settings')):
        while(have_rows('homepage_builder_settings')):
            the_row();

                if(have_rows('section_1')):
                    while(have_rows('section_1')):
                        the_row();
                            $disable_section1 = get_sub_field('s1_disable_this_section');
                            if($disable_section1 && in_array('yes',$disable_section1)):
                                // disabled
                            else:
?>
                                <div class="h-section1">
                                    <div class="container">
                                        <div class="row">
                                            <div class="title-group">
                                                <h1><?php echo get_sub_field('s1_title'); ?></h1>
                                                <div class="info"><?php echo get_sub_field('s1_short_description'); ?></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php
                                                if(have_rows('s1_product_category')):
                                                    while(have_rows('s1_product_category')):
                                                        the_row();
                                                            $this_product_img = get_sub_field('s1_product_category_image');
                                                           
                                            ?>
                                                                <div class="col-sm-4" <?php echo $this_animation[0]; ?>>
                                                                    
                                                                        <a href="<?php echo esc_url(get_sub_field('s1_product_category_url')); ?>">
                                                                            <div class="product-container" style="background: url(<?php echo esc_url($this_product_img['url']); ?>) no-repeat center center;">
                                                                                <div class="product-overlay">
                                                                                    <div><?php echo get_sub_field('s1_product_category_name'); ?></div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                       
                                                                </div>
                                            <?php
                                                    endwhile;
                                                endif;
                                            ?>


                                        </div>
                                    </div>
                                </div>

            <?php
                            endif;
                    endwhile;
                endif;
                if(have_rows('section_2')):
                    while(have_rows('section_2')):
                        the_row();
                        $disable_section2 = get_sub_field('s2_disable_section');
                        if($disable_section1 && in_array('yes',$disable_section2)):
                            // disable
                        else:
            ?>
                            <div class="h-section2">
                                    <div class="column">
                                        <div>
                                            <i class="fas fa-leaf fa-3x"></i>
                                            <h2><?php echo get_sub_field('s2_seasontrends'); ?></h2>
                                            <p><?php echo get_sub_field('s2_seasons_trends_description');?></p>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div>
                                            <i class="fas fa-dollar-sign fa-3x"></i>
                                            <h2><?php echo get_sub_field('s2_mega_sales'); ?></h2>
                                            <p><?php echo get_sub_field('s2_mega_sales_desciption');?></p>
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div>
                                            <i class="fas fa-tags fa-3x"></i>
                                            <h2><?php echo get_sub_field('s2_special_offers_title'); ?></h2>
                                            <p><?php echo get_sub_field('s2_special_offers_description');?></p>
                                        </div>
                                    </div>
                            </div>
            <?php
                        endif;
                    endwhile;
                endif;
            ?>

<?php
        endwhile;
    endif;
?>
<!-- sale products -->
<div class="h-sale-product">
        <div class="row">
            <div class="title-group">
                     <h1>SALES</h1>
                     <div class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</div>
            </div>
        </div>
</div>