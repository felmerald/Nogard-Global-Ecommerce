<div class="best-selling">
    <div class="container">
        <div class="row">
            <?php
                if(have_rows('new_arrival_builder')):
                    while(have_rows('new_arrival_builder')):
                        the_row();
                    
            ?>
                             <div class="title-group">
                                <h1><?php echo get_sub_field('na_section_name'); ?></h1>
                                <div class="info"><?php echo get_sub_field('na_description'); ?></div>
                            </div>
                            <?php echo do_shortcode(''.get_sub_field('na_woocommerce_shortcode').''); ?>
            <?php
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</div>