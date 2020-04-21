<div class="best-selling">
    <div class="container">
        <div class="row">
            <?php
                if(have_rows('best_selling_builder')):
                    while(have_rows('best_selling_builder')):
                        the_row();
                    
            ?>
                             <div class="title-group">
                                <h1><?php echo get_sub_field('best_selling_section_name'); ?></h1>
                                <div class="info"><?php echo get_sub_field('best_selling_short_description'); ?></div>
                            </div>
                            <?php echo do_shortcode(''.get_sub_field('best_selling_woocommerce_shortcode').''); ?>
            <?php
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</div>