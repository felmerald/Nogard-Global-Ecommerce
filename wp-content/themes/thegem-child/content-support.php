<?php
    $this_animation = array(
        'data-aos="fade-up" data-aos-duration="3000"', //0
        'data-aos="fade-right" data-aos-anchor-placement="bottom-bottom"', //1
        'ata-aos="fade-left" data-aos-anchor-placement="bottom-bottom"'//2
    );

    if(have_rows('product_support_fields')):
        while(have_rows('product_support_fields')):
            the_row();
?>
                <div class="c-section">
                    <div class="container">
                        <div class="row" <?php echo $this_animation[0]; ?>>
                            <div class="contact-header">
                                <h1><?php echo get_sub_field('psf_section_name'); ?></h1>
                                <p><?php echo get_sub_field('psf_short_decription'); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="container-map" <?php echo $this_animation[0]; ?>>
						<div class="row">
							<?php echo get_sub_field('psf_map'); ?>
						</div>
                    </div>

                    <div class="container">
<?php
        	if (have_rows('psf_contact_information_section')) {
        		while(have_rows('psf_contact_information_section')) {
        			the_row();
        			
        			$disable_section = get_sub_field('cis_disable_this_section');
                    if($disable_section && in_array('yes', $disable_section)) {
                    	//disabled
                    } else {
?>
						<div class="row contact-info">
							<h2><?php echo get_sub_field('cis_section_name'); ?></h2>
							<p><?php echo get_sub_field('cis_short_description'); ?></p>
						</div>
						<div class="row contact-details" <?php echo $this_animation[0]; ?>>
<?php
							if (have_rows('cis_contact_section')) {
								while(have_rows('cis_contact_section')) {
									the_row();
?>
							<div class="col-3">
								<p class="icon">
										<?php echo get_sub_field('cis_fontawesome_icon'); ?>
								</p>
								<p class="label">
										<?php echo get_sub_field('cis_label'); ?>
								</p>
								<p class="info">
										<?php echo get_sub_field('cis_info'); ?>
								</p>
							</div>
<?php
								}
							}
?>
						</div>
<?php            	
                    }
?>
<?php
    			}
        	}
?> 

<?php
        	if (have_rows('contact_form_7_section')) {
        		while(have_rows('contact_form_7_section')) {
        			the_row();
        			
        			// $disable_section = get_sub_field('cis_disable_this_section');
                    // if($disable_section && in_array('yes', $disable_section)) {
                    	//disabled
                    // } else {
?>
						<div class="row contact-form">
							<h2><?php echo get_sub_field('cfs_section_name'); ?></h2>
							<p><?php echo get_sub_field('cfs_short_description'); ?></p>
							<div <?php echo $this_animation[0]; ?>>
								<?php echo do_shortcode(get_sub_field('cfs_contact_form_7_shortcode')); ?>
							</div>
						</div>
<?php            	
                    // }
?>
<?php
    			}
        	}
?> 
                    </div>
                </div>
<?php
        endwhile;
    endif;
?>