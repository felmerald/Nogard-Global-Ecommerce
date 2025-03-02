<?php
/**
 * The template for displaying the footer
 */

	$id = is_singular() ? get_the_ID() : 0;
	if(is_404() && get_post(thegem_get_option('404_page'))) {
		$id = thegem_get_option('404_page');
	}
	if((is_post_type_archive('product') || is_tax('product_cat') || is_tax('product_tag')) && function_exists('wc_get_page_id')) {
		$id = wc_get_page_id('shop');
	}
	$effects_params = thegem_get_sanitize_page_effects_data($id);
	$header_params = thegem_get_sanitize_page_header_data($id);
	if(is_tax() || is_category() || is_tag()) {
		$thegem_term_id = get_queried_object()->term_id;
		$effects_params = thegem_theme_options_get_page_settings('blog');
		$header_params = thegem_theme_options_get_page_settings('blog');
		if(get_term_meta($thegem_term_id , 'thegem_taxonomy_custom_page_options', true)) {
			$effects_params = thegem_get_sanitize_page_effects_data($thegem_term_id, array(), 'term');
			$header_params = thegem_get_sanitize_page_header_data($thegem_term_id, array(), 'term');
		}
	}
	if($effects_params['effects_parallax_footer']) {
		wp_enqueue_script('thegem-parallax-footer');
	}
?>

		</div><!-- #main -->
		
		<div id="lazy-loading-point"></div>

		<?php if(!$effects_params['effects_page_scroller'] && !$effects_params['effects_hide_footer']) : ?>
			<?php if($effects_params['effects_parallax_footer']) : ?><div class="parallax-footer"><?php endif; ?>
			<?php
				$thegem_custom_footer = get_post(thegem_get_option('custom_footer'));
				$thegem_q = new WP_Query(array('p' => thegem_get_option('custom_footer'), 'post_type' => 'thegem_footer', 'post_status' => 'private'));
				if($header_params['footer_custom']) {
					$thegem_custom_footer = get_post($header_params['footer_custom']);
					$thegem_q = new WP_Query(array('p' => $header_params['footer_custom'], 'post_type' => 'thegem_footer', 'post_status' => 'private'));
				}
				if((thegem_get_option('custom_footer') || $header_params['footer_custom']) && $thegem_custom_footer && $thegem_q->have_posts()) : $thegem_q->the_post(); ?>
				<footer class="custom-footer"><div class="container"><?php the_content(); ?></div></footer>
			<?php wp_reset_postdata(); endif; ?>
			<?php if(is_active_sidebar('footer-widget-area') && !thegem_get_option('footer_widget_area_hide') && !$header_params['footer_hide_widget_area']) : ?>
			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="container">
					<?php get_sidebar('footer'); ?>
				</div>
			</footer><!-- #colophon -->
			<?php endif; ?>
		<!-- ourbrands -->
		<?php
			if(have_rows('our_brand_section','option')):
				while(have_rows('our_brand_section','option')):
					the_row();
						$disable_brand_section = get_sub_field('footer_brand_disable');
							if($disable_brand_section && in_array('yes',$disable_brand_section)):
								// empty
							else:
		?>
								<div class="footer-our-brands">
									<div class="container">
										<div class="row">
													<div class="title-group">
														<h1><?php echo get_sub_field('brand_section_name'); ?></h1>
													</div>
													<?php echo do_shortcode(''.get_sub_field('brand_slick_slider_shortcode').''); ?>
										</div>
									</div>
								</div>
		<?php
							endif;
				endwhile;
			endif;
		?>
		<!-- footer settings using acf -->
		<?php
			if(have_rows('footer_settings','option')):
				while(have_rows('footer_settings','option')):
					the_row();
						
		?>
					<div class="footer-fullwidth-con">
						<div class="container">
							<div class="row">
								<?php
									if(have_rows('logo_content_area')):
										while(have_rows('logo_content_area')):
											the_row();
											$footer_logo = get_sub_field('theme_logo');
								?>
											<div class="col-sm-4" <?php echo $this_animation[1].' '.$this_duration[2]; ?>>
													<?php 
														if(!empty($footer_logo)): 
													?>
														<img src="<?php echo esc_url($footer_logo['url']); ?>" alt="NogardGlobal"/>
													<?php
														endif;
															if(!empty(get_sub_field('telephone_number'))):
													?>
															<p class="first">Got Questions? Call Us 24/7!</p>
															<p class="second"><a href="tel:<?php echo get_sub_field('telephone_number'); ?>"><i class="fas fa-phone-alt"></i> <?php echo get_sub_field('telephone_number'); ?></a></p>
															
													<?php 
														endif;
															if(!empty(get_sub_field('footer_address'))):
													?>
															<p class="third"><i class="fas fa-map-marker-alt"></i> <?php echo get_sub_field('footer_address'); ?></p>
													<?php
														endif;
													?>
											</div>
								<?php 
										endwhile;
									endif;
								?>
									
											<div class="col-sm-4" >
												<p class="title">Find It Fast</p>
												<div class="list">
													<?php
														if(have_rows('social_media_menu')):
															while(have_rows('social_media_menu')):
																the_row();
													?>
																<p><a href="<?php echo esc_url(get_sub_field('social_page_url')); ?>"><?php echo get_sub_field('footer_anchor_name'); ?></a></p>
													<?php
															endwhile;
														endif;
													?>
																
												</div>
												<div class="list">
														<?php
															if(have_rows('website_footer_menu')):
																while(have_rows('website_footer_menu')):
																	the_row();
														?>
																		<p><a href="<?php echo esc_url(get_sub_field('footer_page_url')); ?>"><?php echo get_sub_field('footer_page_anchor_name'); ?></a></p>
														<?php
																endwhile;
															endif;
														?>
												</div>
											
											</div>
											<div class="col-sm-4">
												<p class="title">Customer Care</p>
												<div class="list">
													<?php
														if(have_rows('customer_care_area')):
															while(have_rows('customer_care_area')):
																the_row();
													?>
																	<p><a href="<?php echo esc_url(get_sub_field('aca_url')); ?>"><?php echo get_sub_field('aca_anchor_name') ?></a></p>
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
				endwhile;
			endif;
		?>
		

			<?php if(thegem_get_option('footer_active') && !$header_params['footer_hide_default']) : ?>

			<footer id="footer-nav" class="site-footer">
				<div class="container"><div class="row">

					<div class="col-md-3 col-md-push-9">
						<?php
							$socials_icons = array();
							$thegem_socials_icons = thegem_socials_icons_list();
							foreach(array_keys($thegem_socials_icons) as $icon) {
								$socials_icons[$icon] = thegem_get_option($icon.'_active');
								thegem_additionals_socials_enqueue_style($icon);
							}
							if(in_array(1, $socials_icons)) : ?>
							<div id="footer-socials"><div class="socials inline-inside socials-colored<?php echo (thegem_get_option('socials_colors_footer') ? '-hover' : ''); ?>">
									<?php foreach($socials_icons as $name => $active) : ?>
										<?php if($active) : ?>
											<a href="<?php echo esc_url(thegem_get_option($name . '_link')); ?>" target="_blank" title="<?php echo esc_attr($thegem_socials_icons[$name]); ?>" class="socials-item"><i class="socials-item-icon <?php echo esc_attr($name); ?>"></i></a>
										<?php endif; ?>
									<?php endforeach; ?>
									<?php do_action('thegem_footer_socials'); ?>
							</div></div><!-- #footer-socials -->
						<?php endif; ?>
					</div>

					<div class="col-md-6">
						<?php if(has_nav_menu('footer')) : ?>
						<nav id="footer-navigation" class="site-navigation footer-navigation centered-box" role="navigation">
							<?php wp_nav_menu(array('theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'nav-menu styled clearfix inline-inside', 'container' => false, 'depth' => 1, 'walker' => new thegem_walker_footer_nav_menu)); ?>
						</nav>
						<?php endif; ?>
					</div>

					<div class="col-md-3 col-md-pull-9"><div class="footer-site-info"><?php echo wp_kses_post(do_shortcode(nl2br(stripslashes(thegem_get_option('footer_html'))))); ?></div></div>

				</div></div>
			</footer><!-- #footer-nav -->
			<?php endif; ?>
			<?php if($effects_params['effects_parallax_footer']) : ?></div><!-- .parallax-footer --><?php endif; ?>

		<?php endif; ?>
	</div><!-- #page -->

	<?php if(thegem_get_option('header_layout') == 'perspective') : ?>
		</div><!-- #perspective -->
	<?php endif; ?>
	
	<?php wp_footer(); ?>
	<script src="https://kit.fontawesome.com/22d2c88b47.js" crossorigin="anonymous"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/aos.js"></script>
	<script type="text/javascript">
	AOS.init();
	</script>
	<?php if(is_page(327)): ?>
		<script defer type="text/javascript" charset="utf8" src="<?php echo get_stylesheet_directory_uri(); ?>/js/dataTables.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function( $ ){
				$(document).ready( function () {
					$('#table_id').DataTable();
				} );
			});
		</script>
	<?php endif; ?>
</body>
</html>
