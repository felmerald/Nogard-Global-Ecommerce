<?php 
    $this_animation = array(
        'data-aos="fade-left" data-aos-duration="3000"',//0
        'data-aos="fade-right" data-aos-duration="3000"'//1
    );
    if(have_rows('about_us_module')):
        while(have_rows('about_us_module')):
            the_row();
                if(have_rows('asmone_section_one')):
                    while(have_rows('asmone_section_one')):
                        the_row();
                            $disable_s1 = get_sub_field('asmone_disable');
                            $feature_image_s1 = get_sub_field('asmone_feature_image');
                            if($disable_s1 && in_array('yes',$disable_s1)):
                                // empty
                            else:
?>
                                <div class="about-s1">
                                    <div class="container">
                                        <div class="row">
                                                    <div class="title-group">
														<h1>About us</h1>
													</div>
                                            <div class="col-sm-4" <?php echo $this_animation[1]; ?>>
                                                <?php if(!empty($feature_image_s1)): ?>
                                                        <img src="<?php echo esc_url($feature_image_s1['url']); ?>" alt="Nogard Global">
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-sm-8">
                                                <h2><?php echo get_sub_field('asmone_title'); ?></h2>
                                                <p><?php echo get_sub_field('asmone_short_info'); ?></p>
                                                <?php
                                                    if(have_rows('asmone_checklist_info')):
                                                        while(have_rows('asmone_checklist_info')):
                                                            the_row();
                                                ?>
                                                                <p><i class="far fa-check-square"></i> <?php echo get_sub_field('asmone_checklist'); ?></p>
                                                <?php
                                                        endwhile;
                                                    endif;
                                                ?>
                                                <p><?php echo get_sub_field('asmone_long_info'); ?></p>
                                            </div>
                                        </div>
                                        <!-- second row -->
                                        <div class="row">
                                                <div class="gem-quote gem-quote-style-1 gem-quote-no-paddings">
                                                    <blockqoute>
                                                        <p></p>
                                                            <div class="title-h5">
                                                                <span class="light"><?php echo get_sub_field('asmone_blockqoute_info'); ?></span>
                                                            </div>
                                                        <p></p>
                                                    </blockqoute>
                                                </div>
                                        </div>
                                    </div>
                                </div>   
<?php
                    endif;
                endwhile;
            endif;
            if(have_rows('asmtwo_section_two')):
               while(have_rows('asmtwo_section_two')):
                    the_row();
                        $feature_image_s2 =  get_sub_field('asmtwo_feature_image');
                        $disable_s2 = get_sub_field('asmtwo_disable');
                        if($disable_s2 && in_array('yes',$disable_s2)):
                            // empty
                        else:
?>   

                                <div class="about-s2">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h2><?php echo get_sub_field('asmtwo_title'); ?></h2>
                                                <?php
                                                    if(have_rows('asmtwo_history')):
                                                        while(have_rows('asmtwo_history')):
                                                            the_row();
                                                ?>
                                                            <div class="history-box">
                                                                <label><?php echo get_sub_field('asmtwo_year'); ?></label>
                                                                <p><?php echo get_sub_field('asmtwo_story'); ?></p>
                                                            </div>
                                                <?php
                                                        endwhile;
                                                    endif;
                                                ?>
                                            </div>
                                            <div class="col-sm-4" <?php echo $this_animation[0]; ?>>
                                                <?php if(!empty($feature_image_s2)): ?>
                                                    <img src="<?php echo esc_url($feature_image_s2['url']); ?>" alt="nogard global"/>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


<?php
                        endif;
                endwhile;
            endif;
            if(have_rows('asmthree_section_three')):
                while(have_rows('asmthree_section_three')):
                    the_row();
                    $disable_s3 = get_sub_field('asmthree_disable');
                    if($disable_s3 && in_array('yes',$disable_s3)):
                        // empty
                    else:
?>
                        <div class="about-s3">
                            <div class="container">
                                <div class="row">
                                    <?php
                                        if(have_rows('asmthree_numbers')):
                                            while(have_rows('asmthree_numbers')):
                                                the_row();
                                    ?>
                                                    <div class="col-sm-3">
                                                        <h2><?php echo get_sub_field('asmthreer_number'); ?></h2>
                                                        <p><?php echo get_sub_field('asmthreer_info'); ?></p>
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
                     
        endwhile;
    endif;
?>
