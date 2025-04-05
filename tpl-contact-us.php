<?php
/*
* Template Name: Contact Us Page Template 
*/

get_header();

?>

<div id="contact-cta" class="o-panel o-panel--contact-cta u-margin-top-230">
	<div class="c-contact-cta">
		<div class="grid-container">
            <div class="c-contact-cta__header">
    			<h2 class="c-contact-intro__heading wow wow-visible"><?php echo get_field('cta_title'); ?></h2>
                <p class="wow wow-visible"><?php echo get_field('cta_sub_title'); ?></p>
            </div>

            <div class="grid-x grid-padding-x">
                <?php $delay = 0.2; if( have_rows('cta_items') ): $count = 1;
                    while( have_rows('cta_items') ) : the_row(); ?>
                        <div class="cell medium-12 large-6 c-contact-cta__item wow wow-visible" data-delay="<?php echo $delay; ?>">
                            <?php $delay = $delay + 0.1; ?>
                            <?php if( get_sub_field('cta_i_show_email') == 'Yes' ) { ?>
                                <a class="c-contact-cta__box" href="<?php echo get_sub_field('cta_i_link'); ?>" style="color: #000;" target="_blank">
                                    <?php if (get_sub_field('cta_icon')) { ?>
                                        <div class="c-contact-cta__icon">
                                            <img src="<?php echo get_sub_field('cta_icon'); ?>" alt="">
                                        </div>
                                    <?php }else { ?>
                                        <div class="c-contact-cta__icon">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/placeholder-image.png" alt="">
                                        </div>
                                    <?php } ?>

                                    <h3 class="c-contact-cta__title"><?php echo get_sub_field('cta_i_title'); ?></h3>
                                    <?php echo get_sub_field('cta_i_text'); ?>
                                </a>
                            <?php }else { ?>
                                <div class="c-contact-cta__box">
                                    <?php if (get_sub_field('cta_icon')) { ?>
                                        <div class="c-contact-cta__icon">
                                            <img src="<?php echo get_sub_field('cta_icon'); ?>" alt="">
                                        </div>
                                    <?php }else { ?>
                                        <div class="c-contact-cta__icon">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/placeholder-image.png" alt="">
                                        </div>
                                    <?php } ?>

                                    <h3 class="c-contact-cta__title"><?php echo get_sub_field('cta_i_title'); ?></h3>
                                    <?php echo get_sub_field('cta_i_text'); ?>
                                </div>
                            <?php } ?>
                        </div><!--/ CTA Item -->
                    <?php $count++; endwhile; 
                endif; ?>
            </div>

            <div class="c-contact-cta__visit">
                <span>Visit us</span> <a class="u-button js-down-btn" href="#our-locations">View Locations</a>
            </div>
		</div>
	</div>
</div><!-- End CTA Panel -->

<div id="contact-form" class="o-panel o-panel--contact-form">
    <span class="u-eadge-contact-form"></span>
    
    <div class="c-contact-form">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-24 large-10">
                    <div class="c-contact-form__heading">
                        <h1 class="c-contact-form__title u-ls-2 wow wow-visible"><?php echo get_field('form_title'); ?></h1>
                        <p class="wow wow-visible"><?php echo get_field('form_text'); ?></p>
                    </div>
                </div>

                <div class="cell medium-24 large-14 wow wow-visible">
                    <?php echo do_shortcode('[gravityform id="2" title=false description=false ajax=true tabindex="70"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Contact Form Panel -->

<div id="our-locations" class="o-panel o-panel--our-locations">
    <?php $delay = 0.2; if( have_rows('locations') ): ?>
        <div class="c-our-locations">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="cell medium-24 large-12">
                        <div class="c-our-locations__box">
                            <div class="c-our-locations__header">
                                <h2 class="c-our-locations__title wow wow-visible"><?php echo get_field('ol_title'); ?></h2> 
                                <a class="c-our-locations__more wow wow-visible" href="#">Show All</a>
                            </div>

                            <div class="c-our-locations__items">
                                <?php $count = 1; while( have_rows('locations') ) : the_row(); ?>
                                    <div class="c-our-locations__item wow wow-visible" data-map-index="<?php echo $count; ?>" data-delay="<?php echo $delay; ?>">
                                        <?php $delay = $delay + 0.1; ?>
                                        <?php echo get_sub_field('location_address'); ?>
                                        <a href="<?php ?>"></a>
                                    </div><!--/ Location Item -->
                                <?php $count++; endwhile; ?>
                            </div><!--/ All Locations -->
                        </div>
                    </div>

                    <div class="cell medium-24 large-12">
                        <div class="c-our-locations__map hide-for-xlarge">
                            <?php $count = 1; while( have_rows('locations') ) : the_row(); ?>
                                <div class="c-our-locations__map-item map-item-<?php echo $count; ?>">
                                    <?php $delay = $delay + 0.1; ?>
									
									<?php if($count == 1): ?>
	                                    <a href="<?php echo get_sub_field('google_map_link'); ?>" target="_blank" class="u-plain-relative">
	                                        <img class="u-plain-absolute u-tweenmax-image" src="<?php echo get_sub_field('google_map_image'); ?>" alt="" />
											<img class="u-plain-placeholder" src="<?php echo get_sub_field('google_map_image'); ?>" alt="" />
	                                    </a>
									<?php else: ?>
										<a href="<?php echo get_sub_field('google_map_link'); ?>" target="_blank">
											<img src="<?php echo get_sub_field('google_map_image'); ?>" alt="" />
										</a>
									<?php endif; ?>
                                </div>
                            <?php $count++; endwhile; ?>
                            <div class="c-our-locations__map-item map-item-all wow wow-visible">
                                <a href="<?php echo get_field('all_location_map_link'); ?>" target="_blank">
                                    <img src="<?php echo get_field('all_location_map'); ?>" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="c-our-locations__map-embed show-for-xlarge">
                <?php $count = 1; while( have_rows('locations') ) : the_row(); ?>
                    <div class="c-our-locations__map-item map-item-<?php echo $count; ?>">
                        <?php $delay = $delay + 0.1; ?>
                        <a href="<?php echo get_sub_field('google_map_link'); ?>" target="_blank" class="u-plain-relative">
                            <img class="u-plain-absolute u-tweenmax-image" src="<?php echo get_sub_field('google_map_image'); ?>" alt="" />
							<img class="u-plain-placeholder" src="<?php echo get_sub_field('google_map_image'); ?>" alt="" />
                        </a>
                    </div>
                <?php $count++; endwhile; ?>
                <div class="c-our-locations__map-item map-item-all wow wow-visible">
                    <a href="<?php echo get_field('all_location_map_link'); ?>" target="_blank">
                        <img src="<?php echo get_field('all_location_map'); ?>" alt="" />
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div><!-- End Our Locations Panel -->

<?php get_footer(); ?>