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
                if(have_rows('section_3')):
                    while(have_rows('section_3')):
                        the_row();
                        $disable_section3 = get_sub_field('s3_disable_this_section');
                        if($disable_section3 && in_array('yes',$disable_section3)):
                            // disabled
                        else:
            ?>
                        <!-- sale products -->
                            <div class="h-sale-product">
                                <div class="container">
                                         <div class="row">
                                            <div class="title-group">
                                                    <h1><?php echo get_sub_field('s3_section_title'); ?></h1>
                                                    <div class="info"><?php echo get_sub_field('s3_section_description'); ?></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?php echo do_shortcode(''.get_sub_field('s3_woocommerce_shortcode').''); ?>
                                        </div>
                                        
                                        <?php
                                            if(have_rows('s3_sales_banner')):
                                                while(have_rows('s3_sales_banner')):
                                                    the_row();
                                                    $disable_section3_banner = get_sub_field('s3_disable_this_banner');
                                                    if($disable_section3_banner && in_array('yes',$disable_section3_banner)):
                                                        // disabled
                                                    else:
                                        ?>
                                                            <div class="row" <?php echo $this_animation[0]; ?>>
                                                                <div class="box-yellow">
                                                                        <div class="border">
                                                                            <div class="column">
                                                                                <h2><?php echo get_sub_field('s3_g_sale_title'); ?></h2>
                                                                            </div>
                                                                            <div class="column">
                                                                                <p><?php echo get_sub_field('s3_g_sale_description'); ?></p>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                          
                                        <?php
                                                    endif;
                                                endwhile;
                                            endif;
                                        ?>
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
    if(have_rows('payment_methods_settings','option')):
        while(have_rows('payment_methods_settings','option')):
            the_row();
                $disable_paymentsection = get_sub_field('footerpaymentshipping_disable');
                if($disable_paymentsection && in_array('yes',$disable_paymentsection)):
                    // disable
                else:
?>
                        <div class="payment-section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="panel-box">
                                            <?php
                                                if(have_rows('footer_payment_acception')):
                                                    while(have_rows('footer_payment_acception')):
                                                        the_row();
                                            ?>
                                                            <h4><?php echo get_sub_field('footer_payment_title'); ?> <i class="fas fa-credit-card"></i></h4>
                                                            <div class="info">
                                                                <?php echo get_sub_field('footer_payment_description'); ?>
                                                            </div>
                                                            <div class="atm">
                                                                <?php
                                                                    if(have_rows('footer_payment_card_logo')):
                                                                        while(have_rows('footer_payment_card_logo')):
                                                                            the_row();
                                                                            $creditcard_img = get_sub_field('footer_payment_atm_card_icon');
                                                                ?>
                                                                                
                                                                                    <div class="column">
                                                                                        <?php if(!empty($creditcard_img)): ?>
                                                                                            <img src="<?php echo esc_url($creditcard_img['url']); ?>" alt="payment method"/>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                            
                                                                <?php
                                                                        endwhile;
                                                                    endif;
                                                                ?>
                                                             </div>
                                            <?php
                                                    endwhile;
                                                endif;    
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="panel-box">
                                            <?php
                                                if(have_rows('footer_ship_shipping__methods')):
                                                    while(have_rows('footer_ship_shipping__methods')):
                                                        the_row();
                                            ?>
                                                            <h4><?php echo get_sub_field('footer_ship_title'); ?> <i class="fas fa-truck"></i></h4>
                                                            <?php
                                                                if(have_rows('footer_ship_list_of_shipping')):
                                                                    while(have_rows('footer_ship_list_of_shipping')):
                                                                        the_row();
                                                            ?>
                                                                         <p class="checklist"><i class="far fa-check-square"></i> <?php echo get_sub_field('footer_ship_shipping_list_description'); ?> </p>
                                                            <?php
                                                                    endwhile;
                                                                endif;
                                                            ?>
                                            <?php
                                                    endwhile;
                                                endif;    
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
                endif;
        endwhile;
    endif;

?>